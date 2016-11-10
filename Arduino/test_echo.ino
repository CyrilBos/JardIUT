void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  
}

String input;

void loop() {
  if (Serial.available() > 0) {
     input = Serial.readString();

  }
  // put your main code here, to run repeatedly:
  Serial.println(input);
  delay(1000);
}

