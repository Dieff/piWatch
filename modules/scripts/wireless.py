#!/usr/bin/env python
from wifi import Cell, Scheme
import mysql.connector
import time
from src.main import *

dbc = getDatabaseConnection()
cursor = dbc.cursor()
cursor.execute("TRUNCATE wifi")
query = ("INSERT INTO wifi (date, time, ssid, enc, bssid, freq, mode, sign) VALUES (%(date)s,%(time)s,%(ssid)s,%(enc)s,%(bssid)s,%(freq)s,%(mode)s,%(sign)s)")

cell = Cell.all('wlan0')

time.ctime()
Time = time.strftime('%X')
Date = time.strftime('%d %b %Y')

for i in range(0,len(cell)):
	SSID = cell[i].ssid
	Signal = cell[i].signal
	Encryption = cell[i].encryption_type
	BSSID = cell[i].address
	Frequency = cell[i].frequency
	Mode = cell[i].mode
	values ={'date':Date,
	'time':Time,
	'ssid':SSID,
	'enc':str(Encryption),
	'bssid':BSSID,
	'freq':Frequency,
	'mode':Mode,
	'sign':str(Signal)}
	cursor.execute(query,values)

dbc.commit()
cursor.close()
dbc.close()
