#include <SoftwareSerial.h>
//#include <LiquidCrystal_I2C.h>
//#include  <LiquidCrystal.h>
#include <DHT.h>
#define DHTTYPE DHT11
#include <math.h>
SoftwareSerial SerialESP8266(3,2);
String server = "lq12001-pdm115-2018.000webhostapp.com";
int variable1=364;
float variable2=3.14;
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
float K = 2.5; //factor de disipacion en mW/C
const int DHTPin = 7; 
const int DHTPin2 = 6;// what digital pin we're connected to
const int sensorPin1 = A0;
const int sensorPin2 = A1;
const int sensorPin3 = A2;
DHT dht(DHTPin, DHTTYPE);
DHT dht2(DHTPin2, DHTTYPE);
//LiquidCrystal_I2C lcd2(0x27,A5,A4);
//LiquidCrystal lcd(13, 12, 11, 10, 9, 8);
void setup() {
  SerialESP8266.begin(9600);
  Serial.begin(9600);
  SerialESP8266.setTimeout(2000);
  SerialESP8266.println("AT");
  if(SerialESP8266.find("OK"))
    Serial.println("Respuesta AT correcto");
  else
    Serial.println("Error en ESP8266");
    SerialESP8266.println("AT+CWMODE=1");
    if(SerialESP8266.find("OK"))
      Serial.println("ESP8266 en modo Estacion");
    SerialESP8266.println("AT+CWJAP=\"TURBONETT_191698\",\"probandoesp01\"");
    Serial.println("Conectandose a la red ...");
    SerialESP8266.setTimeout(10000); //Aumentar si demora la conexion
    if(SerialESP8266.find("OK"))
      Serial.println("WIFI conectado");
    else
      Serial.println("Error al conectarse en la red");
    SerialESP8266.setTimeout(2000);
    //Desabilitamos las conexiones multiples
    SerialESP8266.println("AT+CIPMUX=0");
    if(SerialESP8266.find("OK"))
      Serial.println("Multiconexiones deshabilitadas");
  delay(1000); 
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
              while(fin_respuesta==false)
              {
                  while(SerialESP8266.available()>0) 
                  {
                      char c=SerialESP8266.read();
                      Serial.write(c);
                      cadena.concat(c);
                  }
                  if(cadena.length()>500)
                  {
                    Serial.println("La respuesta a excedido el tamaño maximo");                  
                    SerialESP8266.println("AT+CIPCLOSE");
                    if( SerialESP8266.find("OK"))
                      Serial.println("Conexion finalizada");
                    fin_respuesta=true;
                  }
                  if((millis()-tiempo_inicio)>10000)
                  {
                    Serial.println("Tiempo de espera agotado");
                    SerialESP8266.println("AT+CIPCLOSE");
                    if( SerialESP8266.find("OK"))
                      Serial.println("Conexion finalizada");
                    fin_respuesta=true;
                  }
                  if(cadena.indexOf("CLOSED")>0)
                  {
                    Serial.println();
                    Serial.println("Cadena recibida correctamente, conexion finalizada");         
                    fin_respuesta=true;
                  }
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
  delay(10000); //pausa de 10seg antes de conectarse nuevamente al servidor (opcional)
    resetFunc();
}
