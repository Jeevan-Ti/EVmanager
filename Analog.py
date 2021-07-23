import busio
import digitalio
import board
import adafruit_mcp3xxx.mcp3008 as MCP
from adafruit_mcp3xxx.analog_in import AnalogIn
import config

# create the spi bus
spi = busio.SPI(clock=board.SCK, MISO=board.MISO, MOSI=board.MOSI)

# create the cs (chip select)
cs = digitalio.DigitalInOut(board.D5)

# create the mcp object
mcp = MCP.MCP3008(spi, cs)

"""
* create an analog input channel on 
* pin 0 for motor current
* pin 1 for battery current
* pin 2 for battery voltage
"""
"""
* conversion factor for WCS1700 (Current Sensor) refer datasheet
* Sensitivity of sensor is 30.3 Ampere / Volt
* 80V/5V Voltage divider for battery
* Sensor output 16 volts / Volt
* Sensor conversion factor for battery percentage is 0.04
"""
def UpdateVehicleParameters():
    motorcurrent = AnalogIn(mcp, MCP.P0)
    batterycurrent = AnalogIn(mcp, MCP.P1)
    batteryvoltage = AnalogIn(mcp, MCP.P2)
    motorcurrent = motorcurrent * 30.3
    batterycurrent = batterycurrent * 30.3
    batteryvoltage = 16 * batteryvoltage
    config.BatteryPercent = batteryvoltage * 0.04
    config.BatteryPower = batteryvoltage * batterycurrent
    config.MotorPower = (motorcurrent/1.414) * batteryvoltage




