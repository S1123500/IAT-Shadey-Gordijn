from cmath import log
# import serial
import os
import mysql.connector
import time
import math



mydb = mysql.connector.connect(
    host = "localhost",
    user = "ipmedt5_user",
    passwd = "12345",
    database = "ipmedt5"
)

mycursor = mydb.cursor(buffered = True)
# port = serial.Serial("COM5", baudrate=9600, timeout=3.0)

rcv = ""
toSend= ""
current_state = ""    

full_move = 12 # MUST BE DIVISIBLE BY 2 FOR BEST EFFECT
half_move = int(math.floor(full_move / 2))

# def read_serial():
#     rcv = str(port.readline().decode().strip())
#     print(rcv)

# def send_serial(x):
#     toSend = x
#     port.write(toSend.encode())
#     toSend = ""

def curtain_open(x):
    print("it will open with " + str(x) + " rotations")
#     send_serial("a1")
#     time.sleep(5)
#     send_serial(x) # half_move || full_move
#     time.sleep(5)
#     send_serial("l1")

def curtain_close(x):
    print("it will close with " + str(x) + " rotations")
#     send_serial("a1")
#     time.sleep(5)
#     send_serial(x)
#     time.sleep(5)
#     send_serial("l2")

def curtain_btn():
    update('Betty', 1)

def update(name, value):
    global current_state
    current_state = mycursor.execute("SELECT percentage FROM curtain WHERE name = '%s'" % (name))
    for index in mycursor:
        current_state = index[0]
    mycursor.execute("UPDATE curtain SET percentage = %s WHERE name = '%s'" % (value, name))
    print("curtain updated")
    if value  != current_state:
        if current_state == 1:
            if value < current_state:
                curtain_open(half_move)
            elif value > current_state:
                curtain_close(half_move)
        elif value == 1:
            if value < current_state:
                curtain_open(half_move)
            elif value > current_state:
                curtain_close(half_move)
        elif value < current_state:
            curtain_open(full_move)
        elif value > current_state:
            curtain_close(full_move)
     

    ####
    # VALUE is CURTAIN STATE:
    # 0 = open
    # 1 = half open
    # 2 = shut
    ####

    #implement python serial call to push distance and direction

while True:
    t = time.localtime()
    current_time = time.strftime("%H:%M", t)
    current_day = time.strftime("%A", t)[0:3]
    
    # What day and time is it now
    print(current_day)
    print(current_time)

    # Check if Curtain needs to Open
    mycursor.execute("SELECT curtainName FROM schedule WHERE whichDay = '%s' AND timeOpen = '%s' " % ('Wed', '16:33'))
    list=[]
    for index in mycursor:
        curtain = index[0]
        list.append(curtain)
        percentage = 0

    for x in list:
        update(x, percentage)

    # Check if Curtain needs to close
    mycursor.execute("SELECT curtainName FROM schedule WHERE whichDay = '%s' AND timeClose = '%s' " % ('Wed', '16:34'))
    list=[]
    for index in mycursor:
        curtain = index[0]
        list.append(curtain)
        percentage = 2

    for x in list:
        update(x, percentage)

    # Update databsae and wait a minute to check agains
    mydb.commit()
    time.sleep(60)

