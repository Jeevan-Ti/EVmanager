## Electric Vehicle Manager

Remote monitoring, controlling and analysis of an EV involves some important core components of Electric and Hybrid-Electric Vehicle, whose design must involve prudent decisions regarding vehicle's safety. 

This project has been taken up by me and my friend in college for developing an IoT based 3rd party three pronged sollution -motoring, controlling, analytics, that shall be easily integrated into any Electric Vehicle.

Though the project is still under development, the functional aspects we are considering to design are:
```markdown
1. _EV analytics sollution viz. driving style classifier, power analyzer, service analyzer, maintainace tips etc._
2. _Power & battery health monitor, service monitor, EV location tracker, EV status monitor etc_
3. _Speed or power lock, vehicle authentication, EV hardware control etc_
```

### Hardware Schematic
![Embedded_web](https://user-images.githubusercontent.com/49190581/127036931-7ce5ec56-51b7-45cc-b3d6-3ab7574a3990.jpg)

### Design
&emsp; In current design prototype, HTTP requests are used to post and fetch data. In built WiFi of RPi has been used to connect to the internet. Since the lack of a global Ip, the RPi hooked to an EV now requests our web API for any raised tokens and also posts its data to server at a frequency of 1s (configurable)
<br> &emsp; However in the next revision we are trying to implement a multi-intance MQTT broker based systen, which has its own advantages.


### Current Version
&emsp; The current version os this project is being hosted @ [EVmanager](https://evmana.000webhostapp.com/).


### `Content loading!!`
