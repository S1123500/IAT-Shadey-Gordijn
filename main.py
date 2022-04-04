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
port = serial.Serial("COM5", baudrate=9600, timeout=3.0)


while True:
    t = time.localtime()
    current_time = time.strftime("%H:%M", t)
    print(current_time) 
    print('hi')
    time.sleep(60)