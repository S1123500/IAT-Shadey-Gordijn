from cmath import log
from json.tool import main
import serial
import os
import mysql.connector
import time
import math


mydb = mysql.connector.connect(
    host="localhost",
    user="ipmedt5_user",
    passwd="12345",
    database="ipmedt5"
)

mycursor = mydb.cursor(buffered=True)
port = serial.Serial("/dev/ttyUSB0", baudrate=9600, timeout=3.0)




rcv = ""
toSend = ""
current_state = None
updated_state = None
current_direction = "opening"



paring_name = "default"

full_move = 8  # MUST BE DIVISIBLE BY 2 FOR BEST EFFECT
half_move = int(math.floor(full_move / 2))


def read_serial():
    #global rcv
    rcv = str(port.readline().decode().strip())
    print(rcv)
    port.reset_input_buffer()
    return rcv


def send_serial(x):
    toSend = x
    port.write(str(toSend).encode())
    toSend = ""
    port.reset_output_buffer()


def curtain_open(x):
    print("it will open with " + str(x) + " rotations")
    send_serial("a1")
    time.sleep(2)
    print(read_serial)
    send_serial(x) # half_move || full_move
    time.sleep(2)
    send_serial("l1")


def curtain_close(x):
    print("it will close with " + str(x) + " rotations")
    send_serial("a1")
    time.sleep(2)
    print(read_serial)
    send_serial(x)
    time.sleep(2)
    send_serial("l2")


def curtain_btn(name):
    global current_direction
    print("curtain button pressed")
    mycursor.execute(
        "SELECT percentage FROM curtain WHERE name = '%s'" % (name))
    for index in mycursor:
        current_state = index[0]

    print("state is: "+str(current_state))
    if current_state == 0:
        update(name, 1)
        current_direction = "closing"
    elif current_state == 1:
        print(current_direction + 'exists')
        if current_direction == "closing":
            update(name, 2)
            current_direction = "opening"
        elif current_direction == "opening":
            update(name, 0)
            current_direction = "closing"
    elif current_state == 2:
        update(name, 1)
        current_direction = "opening"

def reference(name):
    global current_state
    mycursor.execute(
        "SELECT percentage FROM curtain WHERE name = '%s'" % (name))
    for index in mycursor:
        x = index[0]
        if not x is current_state:
            updated_state = x
            move(updated_state)
            print("this is reference()")
            current_state = updated_state
    print(current_state)

def update(name, value):
    global current_state
    current_state = mycursor.execute(
        "SELECT percentage FROM curtain WHERE name = '%s'" % (name))
    for index in mycursor:
        current_state = index[0]
    mycursor.execute(
        "UPDATE curtain SET percentage = %s WHERE name = '%s'" % (value, name))
    print("curtain updated")
    reference(name)
    current_state = value

    
def move(value):
        if current_state == 1:
            if value < current_state:
                curtain_open(half_move)
                return
            elif value > current_state:
                curtain_close(half_move)
                return
        elif value == 1:
            if value < current_state:
                curtain_open(half_move)
                return
            elif value > current_state:
                curtain_close(half_move)
                return
        elif value < current_state:
            curtain_open(full_move)
            return
        elif value > current_state:
            curtain_close(full_move)
            return

    ####
    # VALUE is CURTAIN STATE:
    # 0 = open
    # 1 = half open
    # 2 = shut
    ####


def main():
    global rcv
    global current_state
    global current_direction
    global paring_name

    time.sleep(3)
    paring_name = read_serial()
    time.sleep(3)

    current_state = mycursor.execute("SELECT percentage FROM curtain WHERE name = '%s'" % (paring_name))
    for x in mycursor:
        current_state = x[0]
    updated_state = current_state

    print("Current state: " + str(current_state))
    print("Updated state: " + str(updated_state))
    

    reference(paring_name)
    while True:
        t = time.localtime()
        current_time = time.strftime("%H:%M", t)
        current_day = time.strftime("%A", t)[0:3]

        # What day and time is it now
        print(current_day)
        print(current_time)

        # Check if Curtain needs to Open
        mycursor.execute(
            "SELECT curtainName FROM schedule WHERE whichDay = '%s' AND timeOpen = '%s' " % (current_day, current_time))
        list = []
        for index in mycursor:
            curtain = index[0]
            list.append(curtain)
            percentage = 0

        for x in list:
            update(x, percentage)

        # Check if Curtain needs to close
        mycursor.execute(
            "SELECT curtainName FROM schedule WHERE whichDay = '%s' AND timeClose = '%s' " % (current_day, current_time))
        list = []
        for index in mycursor:
            curtain = index[0]
            list.append(curtain)
            percentage = 2

        for x in list:
            update(x, percentage)

        # Update databsae and wait a minute to check again
        mydb.commit()

        # time.sleep(60) depricated timer, not accurate enough
        reference(paring_name)
        # new for loop that reads serial for button input and waits less than a minute
        if 'mc' in read_serial():
                curtain_btn(paring_name)
                #rcv = ""
            
            # port.reset_input_buffer()


if __name__ == "__main__":
    main()
