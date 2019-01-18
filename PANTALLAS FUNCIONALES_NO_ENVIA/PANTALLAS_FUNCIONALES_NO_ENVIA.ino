#include <SoftwareSerial.h>
#include <LiquidCrystal_I2C.h>
#include  <LiquidCrystal.h>
#include <DHT.h>
#define DHTTYPE DHT11
#include <math.h>
SoftwareSerial SerialESP8266(3,2);
String server = "lq12001-pdm115-2018.000webhostapp.com";
String cadena="";
String apiKey = "*************";     
String ssid="TURBONETT_191698";    
String password ="probandoesp01"; 
const int Rc = 10000; //valor de la resistencia
const int Vcc = 5;
const int SensorPIN = A3;
float A = 1.11492089e-3;
float B = 2.372075385e-4;
float C = 6.954079529e-8;
float K = 2.5;
const int DHTPin = 7; 
const int DHTPin2 = 6;
const int sensorPin1 = A0;
const int sensorPin2 = A1;
const int sensorPin3 = A2;
DHT dht(DHTPin, DHTTYPE);
DHT dht2(DHTPin2, DHTTYPE);
LiquidCrystal_I2C lcd2(0x27,A5,A4);
LiquidCrystal lcd(13, 12, 11, 10, 9, 8);
void setup() {
  SerialESP8266.begin(9600);
  Serial.begin(9600);
  lcd2.init();
  lcd2.init();
  dht2.begin();
  lcd.begin(16, 2);
  lcd2.begin(16, 2);
  lcd.home();
  lcd2.home();
  SerialESP8266.setTimeout(2000);
  SerialESP8266.println("AT");
  boolean comandAT=false;
  while(comandAT==false){
      if(SerialESP8266.find("OK")){
    Serial.println("Respuesta AT correcto");
    SerialESP8266.println("AT+CWMODE=1");
    if(SerialESP8266.find("OK"))
      Serial.println("ESP8266 en modo Estacion");
    SerialESP8266.println("AT+CWJAP=\"TURBONETT_191698\",\"probandoesp01\"");
    Serial.println("Conectandose a la red ...");
    SerialESP8266.setTimeout(10000);
    if(SerialESP8266.find("OK"))
      Serial.println("WIFI conectado");
    else
      Serial.println("Error al conectarse en la red");
    SerialESP8266.setTimeout(2000);
    //Desabilitamos las conexiones multiples
    SerialESP8266.println("AT+CIPMUX=0");
    if(SerialESP8266.find("OK"))
      Serial.println("Multiconexiones deshabilitadas");
  //delay(1000); 
  comandAT =true;
  }
  else{
  Serial.println("Error en ESP8266");
  comandAT=false;
  }
 }
}
void(*resetFunc)(void)=0;
void loop() {
float raw = analogRead(SensorPIN);
  float V =  raw / 1024 * Vcc;
  float R = (Rc * V ) / (Vcc - V);
  float logR  = log(R);
  float R_th = 1.0 / (A + B * logR + C * logR * logR * logR );
  float kelvin = R_th - V*V/(K * R)*1000;
  float celsius = kelvin - 273.15;
   int hr1 = dht.readHumidity();
   int t1 = dht.readTemperature();
   int hr2 = dht2.readHumidity();
   int t2 = dht2.readTemperature();
   if (isnan(hr1) || isnan(t1)) {
      Serial.println("Failed to read from DHT sensor!");
   }
    int h1 = analogRead(sensorPin1);
    int h2 = analogRead(sensorPin2);
    int h3 = analogRead(sensorPin3);
      SerialESP8266.println("AT+CIPSTART=\"TCP\",\"" + server + "\",80");
      if( SerialESP8266.find("OK"))
      {  
          Serial.println();
          Serial.println();
          Serial.println();
          Serial.println("ESP8266 conectado con el servidor...");             
          String peticionHTTP= "GET /ARC_insert.php?t1=";
          peticionHTTP=peticionHTTP+String(t1)+"&t2="+String(t2)+"&t3="+String(celsius)+"&h1="+String(h1)+"&h2="+String(h2)+"&h3="+String(h3)+"&hr1="+String(hr1)+"&hr2="+String(hr2)+" HTTP/1.1\r\n";
          peticionHTTP=peticionHTTP+"Host: lq12001-pdm115-2018.000webhostapp.com\r\n\r\n";
          SerialESP8266.print("AT+CIPSEND=");
          SerialESP8266.println(peticionHTTP.length());
          if(SerialESP8266.find(">"))
          {
            Serial.println("Enviando HTTP . . .");
            SerialESP8266.println(peticionHTTP);
            if( SerialESP8266.find("SEND OK"))
            {  
              Serial.println("Peticion HTTP enviada:");
              Serial.println();
              Serial.println(peticionHTTP);
              Serial.println("Esperando respuesta...");            
              boolean fin_respuesta=false; 
              long tiempo_inicio=millis(); 
              cadena="";             
                  while(SerialESP8266.available()>0) 
                  {
                      char c=SerialESP8266.read();
                      Serial.write(c);
                      cadena.concat(c);
                  }

            }
            else
            {
              Serial.println("No se ha podido enviar HTTP.....");
           }            
          }
      }
      else
      {
        Serial.println("No se ha podido conectarse con el servidor");
      }
  //delay(20000);
  lcd.setCursor(0,0);
  lcd.print("H1: ");
  lcd.setCursor ( 3, 0 );
    if(h1<1000)
  {
  lcd.print(h1);
  lcd.setCursor ( 6,0 );
  lcd.print(" ");
  }
  if(h1>999)
  {
  lcd.print(h1);
  }
  lcd.setCursor(9,0);
  lcd.print("H2: ");
  lcd.setCursor ( 12,0 );
  if(h2<1000)
  {
  lcd.print(h2);
  lcd.setCursor ( 15,0 );
  lcd.print(" ");
  }
  if(h2>999)
  {
  lcd.print(h2);
  }
  lcd.setCursor ( 0,1 );
  lcd.print("H3: ");
  lcd.setCursor ( 3,1 );
  if(h3<1000)
  {
  lcd.print(h3);
  lcd.setCursor ( 6,1 );
  lcd.print(" ");
  }
  if(h3>999)
  {
    lcd.print(h3);
  }
  
  lcd.setCursor ( 9,1 );
  lcd.print("HR1:");
  lcd.setCursor ( 13,1 );
  lcd.print(h1);
  lcd.setCursor ( 15,1 );
  lcd.print("%");
  lcd2.backlight();
  lcd2.setCursor(0,0);
  lcd2.print("HR2:");
  lcd2.setCursor ( 4,0 );
  lcd2.print(h2);
  lcd2.setCursor ( 6,0 );
  lcd2.print("%");
  lcd2.setCursor(10,0);
  lcd2.print("T1:");
  lcd2.setCursor ( 13,0 );
  lcd2.print(t1);
  lcd2.setCursor ( 15,0 );
  lcd2.print("C");
  lcd2.setCursor ( 0,1 );
  lcd2.print("T2:");
  lcd2.setCursor ( 3,1 );
  lcd2.print(t2);
  lcd2.setCursor ( 5,1 );
  lcd2.print("C");
  lcd2.setCursor ( 7,1 );
  lcd2.print("T3:");
  lcd2.setCursor ( 10,1 );
  lcd2.print(celsius);
  lcd2.setCursor ( 15,1 );
  lcd2.print("C");
  delay(10000);
    resetFunc();
}
