class Sensor {
  public:
    int output_port; //port to send the data to
    int low_threshold; 
    int high_threshold;
};

const int PUMP_PIN = 48;

Sensor humidity;

String input;

int mode;

void setup() {
    Serial.begin(9600);
    pinMode(PUMP_PIN, OUTPUT);
    humidity.output_port = 0;
    humidity.low_threshold = 280;
    humidity.high_threshold = 490;
}

void active_pompe() {
    digitalWrite(PUMP_PIN, HIGH);
}

void desactive_pompe() {
    digitalWrite(PUMP_PIN, LOW);
}


void loop() {
  //String input = Serial.readString();
  input = "1";
  if (input == "0") {
    mode = 0;
  }
  else if (input == "1") {
    mode = 1;
  }
  
  switch(mode) {
    case 0:
      break;
    case 1:
        Serial.println(analogRead(humidity.output_port));
    
        if (analogRead(humidity.output_port) < humidity.low_threshold) {
            active_pompe();
        }
    
        else if (analogRead(humidity.output_port) > humidity.high_threshold) {
            desactive_pompe();
        }
        break;
  }
  delay(1000);
}
