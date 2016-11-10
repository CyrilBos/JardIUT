#!/usr/bin/python
import serial

ser = serial.Serial('/dev/ttyACM1')
while True:
	ser.write("abi")

	print ser.readline()
