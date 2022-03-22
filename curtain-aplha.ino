#include <SoftwareSerial.h>

#define RxD 0 //receive data on digital 0
#define TxD 1 //transmit on digital 1

/*
#####################################
THIS IS A SUPERQUICK HACKY WORKAROUND
It's recommended to check input via tags and or methods
#####################################
*/

//int light_sensor = A0; // light sensor needs analogue input
int led_pin = 8;

SoftwareSerial blueToothSerial(RxD, TxD);
int counter = 0;
int incoming;

void setup(void){
  pinMode(RxD, INPUT);
  pinMode(TxD, OUTPUT);
  pinMode(led_pin, OUTPUT);
  Serial.begin(9600);
  delay(100);
  digitalWrite(led_pin, HIGH);
  delay(1000);
  digitalWrite(led_pin, LOW);
  delay(1000);     
  digitalWrite(led_pin, HIGH);
  delay(1000);
  digitalWrite(led_pin, LOW); 
  Serial.println("Started.");
  setupBlueToothConnection();
  delay(100);
}

/*void setup() {
    //open serial port for the module
    HC06.begin(9600);
    //setup the LDR pin
    pinMode(light_sensor, INPUT);
}

void loop(){
    if (HC06.available() > 0){
        char py_input = HC06.read(); //read serial input from HC06
        int ls_input = analogRead(0); // read analog value of sensor
        if (py_input == 'placeholder_1') {
            HC06.println("LDR is reading: ", ls_input); //check serial input, return sensor value via serial 
        }
    }
}*/

void loop() 
{ 
  char recvChar;
  while(1){
    if(blueToothSerial.available()){//check if there's any data sent from the remote bluetooth shield
      recvChar = blueToothSerial.read();
      Serial.print(recvChar);
    }
    if(Serial.available()){//check if there's any data sent from the local serial terminal, you can add the other applications here
      recvChar  = Serial.read();
      blueToothSerial.print(recvChar);
    }
  }
} 

void setupBlueToothConnection(){
  blueToothSerial.begin(38400); //Set BluetoothBee BaudRate to default baud rate 38400
  blueToothSerial.print("\r\n+STWMOD=0\r\n"); //set the bluetooth work in slave mode
  blueToothSerial.print("\r\n+STPIN=0000\r\n");//Set SLAVE pincode"0000"
  blueToothSerial.print("\r\n+STNA=CurtainControllerSlave\r\n"); //set the bluetooth name as "SeeedBTSlave"
  blueToothSerial.print("\r\n+STOAUT=1\r\n"); // Permit Paired device to connect me
  blueToothSerial.print("\r\n+STAUTO=0\r\n"); // Auto-connection should be forbidden here
  delay(2000); // This delay is required.
  blueToothSerial.print("\r\n+INQ=1\r\n"); //make the slave bluetooth inquirable 
  Serial.println("The slave bluetooth is inquirable!");
  delay(2000); // This delay is required.
  blueToothSerial.flush();
} 