from ast import If
from calendar import TUESDAY
from nis import match
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

mycursor = mydb.cursor()
# port = serial.Serial("COM5", baudrate=9600, timeout=3.0)


while True:
    t = time.localtime()
    current_time = time.strftime("%H:%M", t)
    current_day = time.strftime("%A", t)
    print(current_day)
    
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
    if current_day == "Tueseday":
        current_day = "Tue"
    if current_day == "Wednesday":
        current_day = "Wed"
    if current_day == "Thusday":
        current_day = "Thu"
    if current_day == "Friday":
        current_day = "Fri"
    if current_day == "Saturday":
        current_day = "Sat"
    if current_day == "Sunday":
        current_day = "Sun"


    print(current_time)
    timers = mycursor.excecute("SELECT * FROM schedule WHERE whichDay = current_day;")
    for index in timers:
        print(index)
    time.sleep(60)