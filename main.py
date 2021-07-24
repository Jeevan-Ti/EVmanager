import functions
import RPi.GPIO as GPIO
import config
import time
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(config.enginepin,GPIO.OUT)
GPIO.setup(config.doorpin,GPIO.OUT)
GPIO.setup(config.headpin,GPIO.OUT)
GPIO.setup(config.windowpin,GPIO.OUT)
GPIO.setup(config.alarmpin,GPIO.OUT)

while True:
    functions.sendvdata()
    functions.getdata()
    time.sleep(3)
