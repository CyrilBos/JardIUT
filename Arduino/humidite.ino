    const int PUMP_PIN = 48;
    const int SEUIL_BAS = 280;
    const int SEUIL_HAUT = 490;
    
    
    void setup() {
     Serial.begin(9600);
     pinMode(PUMP_PIN, OUTPUT);
    }
    
    void active_pompe(){
    digitalWrite(PUMP_PIN, HIGH);
    }
    
    void desactive_pompe(){
    digitalWrite(PUMP_PIN, LOW);
    }
    
    
    void loop() {
     Serial.println(analogRead(A1));
     delay(1000);
    
     if (analogRead(A1) < SEUIL_BAS){
     active_pompe();
     }
     
     else if (analogRead(A1) > SEUIL_HAUT){
     desactive_pompe();
     }
     
     
    }
