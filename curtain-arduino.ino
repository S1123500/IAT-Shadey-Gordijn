byte input;
int data = 0;
char object = ' ';
int oldAmount = 1;
int amount = 1; //amount of total revolutions
char thisInt = ' ';

#define dirPin 2
#define stepPin 3
#define stepsPerRevolution 200 //NEMA17 defauts to 200 step/rev at full resolution
#define buttonPin 4


void setup()
{
  // Declare pins as output:
  pinMode(stepPin, OUTPUT);
  pinMode(dirPin, OUTPUT);
  pinMode(buttonPin, INPUT);

  Serial.begin(9600);
  //Serial.println("Betty");
}

void loop()
{
  while (Serial.available() > 0)
  {
    data = Serial.read();
    btn_interrupt();
  }
  switch (data)
  {
  case 'l':
    object = 'l';
    break;
  case 'a':
    object = 'a';
    //thisInt = data.remove(0);
    //amount = thisInt.toInt();
    break;
  case '1':
    if (object == 'a')
    {
     oldAmount = amount;
     while(oldAmount == amount){
        Serial.println("Waiting for input");
        amount = Serial.parseInt();
        //Serial.println(data);
        //Serial.println(amount);
        if(amount != 0){
          data = 0;
          break;
        }
      }
      break;
    }
    if (object == 'l')
    {
      for (int i = 0; i < amount; i++)
      {
        // Set the direction pin to HIGH:
        digitalWrite(dirPin, LOW);
      }
      delay(500);
      digitalWrite(dirPin, LOW);
      spin();
      delay(500);
      data = 0;
    }
    break;
  case '2':
    if (object == 'a')
    {
      Serial.print("Current amount: ");
      Serial.println(amount);
    }
    if (object == 'l')
    {
      for (int i = 0; i < amount; i++)
      {
        // Set the direction pin to HIGH:
        digitalWrite(dirPin, HIGH);
      }
      delay(500);
      digitalWrite(dirPin, HIGH);
      spin();
      delay(500);
    }
    data = 0;
    break;
  case '600':
    Serial.println(amount);
    Serial.println("BING");
    break;
  
  }
}

// Define stepper motor connections and steps per revolution:
void spin()
{
  for (int i = 0; i < amount * stepsPerRevolution; i++)
  {
    // These four lines result in 1 step:
    digitalWrite(stepPin, HIGH);
    delayMicroseconds(700);
    digitalWrite(stepPin, LOW);
    delayMicroseconds(700);
  }
}


// system interrupt on button press (buttonPin)
void btn_interrupt()
{
  if (digitalRead(buttonPin) == HIGH)
  {
    Serial.println("mc"); // sends button control input to host
    while (digitalRead(buttonPin) == HIGH)
    {
      // wait for button to be released
    }
  }
}