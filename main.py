import serial
import os
import mysql.connector
import time



mydb = mysql.connector.connect(
    host = "localhost",
    user = "ipmedt5_user",
    passwd = "12345",
    database = "ipmedt5"
)

mycursor = mydb.cursor(buffered = True)
# port = serial.Serial("COM5", baudrate=9600, timeout=3.0)

def update(name, value):
    mycursor.execute("UPDATE curtain SET percentage = %s WHERE name = '%s'" % (value, name))
    print("curtain updated")   

while True:
    t = time.localtime()
    current_time = time.strftime("%H:%M", t)
    current_day = time.strftime("%A", t)
    
    # match current_day: 
    #      case "Monday": current_day = "Mon";
    #      case "Tuseday": current_day = "Tue";
    #      case "Wednesday": current_day = "Wed";
    #      case "Thusday": current_day = "Thu";
    #      case "Friday": current_day = "Fri";
    #      case "Saturday": current_day = "Sat";
    #      case "Sunday": current_day = "Sun";
    if current_day == "Monday":
        current_day = "Mon"
    if current_day == "Tuesday":
        current_day = "Tue"
    if current_day == "Wednesday":
        current_day = "Wed"
    if current_day == "Thursday":
        current_day = "Thu"
    if current_day == "Friday":
        current_day = "Fri"
    if current_day == "Saturday":
        current_day = "Sat"
    if current_day == "Sunday":
        current_day = "Sun"
    
    # What day and time is it now
    print(current_day)
    print(current_time)

    # Check if Curtain needs to Open
    mycursor.execute("SELECT curtainName FROM schedule WHERE whichDay = '%s' AND timeOpen = '%s' " % (current_day, current_time))
    list=[]
    for index in mycursor:
        curtain = index[0]
        list.append(curtain)
        if list:
            percentage = 0

    for x in list:
        update(x, percentage)

    # Check if Curtain needs to close
    mycursor.execute("SELECT curtainName FROM schedule WHERE whichDay = '%s' AND timeClose = '%s' " % (current_day, current_time))
    list=[]
    for index in mycursor:
        curtain = index[0]
        list.append(curtain)
        if list:
            percentage = 2

    for x in list:
        update(x, percentage)

    # Update databsae and wait a minute to check agains
    mydb.commit()
    time.sleep(60)

