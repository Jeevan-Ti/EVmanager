import config as config
import requests
from threading import Timer
import RPi.GPIO as GPIO

def getdata():
    data = {'getalldata': "getalldata", "cid": "123456"}
    r = requests.post(url=config.url, data=data)
    # print(str(r.content))
    allstatus = str(r.content).split("'")[1].split("*#")

    if str(config.engine) != allstatus[0]:
        config.engine = allstatus[0]
        if config.engine == '0':
            GPIO.output(config.enginepin,GPIO.LOW)
            print("Engine is switched off")
        else:
            GPIO.output(config.enginepin,GPIO.HIGH)
            print("Engine is switched on")

    if str(config.doors) != allstatus[1]:
        config.doors = allstatus[1]
        if config.doors == '0':
            GPIO.output(config.doorpin,GPIO.LOW)
            print("Doors locked")
        else:
            GPIO.output(config.doorpin,GPIO.HIGH)
            print("Doors unlocked")
            
    if str(config.headlights) != allstatus[2]:
        config.headlights = allstatus[2]
        if config.headlights == '0':
            GPIO.output(config.headpin,GPIO.LOW)
            print("Headlights off")
        else:
            GPIO.output(config.headpin,GPIO.HIGH)
            print("Headlights off")
            
    if str(config.windows) != allstatus[3]:
        config.windows = allstatus[3]
        if config.windows == '0':
            GPIO.output(config.windowpin,GPIO.LOW)
            print("Windows close")
        else:
            GPIO.output(config.windowpin,GPIO.HIGH)
            print("Windows open")
            
    if str(config.alarm) != allstatus[4]:
        config.alarm = allstatus[4]
        if config.alarm == '0':
            GPIO.output(config.alarmpin,GPIO.LOW)
            print("Alarm off")
        else:
            GPIO.output(config.alarmpin,GPIO.HIGH)
            print("Alarm on")

    Timer(5, getdata).start()


def sendvdata():
    data = {'updatealldata': "updatedata", "cid": "123456", "engine": config.engine, "doors": config.doors,
            "hls": config.headlights, "windows": config.windows, "alarm": config.alarm,
            "battery": config.BatteryPercent, "batteryp": config.BatteryPower, "motorp": config.MotorPower}
    r = requests.post(url=config.url, data=data)