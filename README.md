# EVmanager
Checkout [ghpage](https://jeevan-ti.github.io/EVmanager/) project site for more details and goal of this project.

## Current Version Brief
The current version of the project is being hosted at [EVmanager](https://evmana.000webhostapp.com/)
<br>login with `Username : jeevan` and `password : 123456`
### Server End
![image](https://user-images.githubusercontent.com/49190581/127091387-2984252e-1e5e-453f-b1b7-7f62c65e9927.png)

#### EV-Server Communication
Unfortunately in the current implementation only EV can communicate with the server and not vice versa -client to server only, since only HTTP based communication system is used here.
<br>Post metho d to post vehicles data is implemented in `functions.py` module as:
```python
def sendvdata():
    data = {'updatealldata': "updatedata", "cid": "123456", "engine": config.engine, "doors": config.doors,
            "hls": config.headlights, "windows": config.windows, "alarm": config.alarm,
            "battery": config.BatteryPercent, "batteryp": config.BatteryPower, "motorp": config.MotorPower}
    r = requests.post(url=config.url, data=data)
```
&emsp; Index page of the website implements an authentication system using which user can gain access to their vehicle.



