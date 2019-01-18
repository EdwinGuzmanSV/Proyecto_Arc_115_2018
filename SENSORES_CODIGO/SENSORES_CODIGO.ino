#include <LiquidCrystal_I2C.h>
#include <Wire.h> 
#include "DHT.h"
#define DHTTYPE DHT11   // DHT 11
#include  <LiquidCrystal.h>
#include <Wire.h> 
#include <math.h>
 
const int Rc = 10000; //valor de la resistencia
const int Vcc = 5;
const int SensorPIN = A3;
float A = 1.11492089e-3;
float B = 2.372075385e-4;
float C = 6.954079529e-8;
float K = 2.5; //factor de disipacion en mW/C
// Connect pin 1 (on the left) of the sensor to +5V
// NOTE: If using a board with 3.3V logic like an Arduino Due connect pin 1
// to 3.3V instead of 5V!
// Connect pin 2 of the sensor to whatever your DHTPIN is
// Connect pin 4 (on the right) of the sensor to GROUND
// Connect a 10K resistor from pin 2 (data) to pin 1 (power) of the sensor
 
const int DHTPin = 7; 
const int DHTPin2 = 6;// what digital pin we're connected to
const int sensorPin1 = A0;
const int sensorPin2 = A1;
const int sensorPin3 = A2;
DHT dht(DHTPin, DHTTYPE);
DHT dht2(DHTPin2, DHTTYPE);
LiquidCrystal_I2C lcd2(0x27,A5,A4);
LiquidCrystal lcd(13, 12, 11, 10, 9, 8);
 
void setup() {
   Serial.begin(9600);
   dht.begin();
   lcd2.init();                      // initialize the lcd 
  lcd2.init();
   dht2.begin();
   // INDICAMOS QUE TENEMOS CONECTADA UNA PANTALLA DE 16X2
  lcd.begin(16, 2);
  lcd2.begin(16, 2);
  // MOVER EL CURSOR A LA PRIMERA POSICION DE LA PANTALLA (0, 0)
  lcd.home();
  lcd2.home();

 //lcd.print("BIENVENIDO!");


  // MOVER EL CURSOR A LA SEGUNDA LINEA (1) PRIMERA COLUMNA (0)
 // lcd.setCursor ( 0, 1 );
  // IMPRIMIR OTRA CADENA EN ESTA POSICION
//  lcd.print("GEEKFACTORY");
  // ESPERAR UN SEGUNDO
  delay(1000);
}
 
void loop() {
   // Wait a few seconds between measurements.
   delay(2000);


 float raw = analogRead(SensorPIN);
  float V =  raw / 1024 * Vcc;
 
  float R = (Rc * V ) / (Vcc - V);
  
 
  float logR  = log(R);
  float R_th = 1.0 / (A + B * logR + C * logR * logR * logR );
 
  float kelvin = R_th - V*V/(K * R)*1000;
  float celsius = kelvin - 273.15;
  
   // Reading temperature or humidity takes about 250 milliseconds!
   int h1 = dht.readHumidity();
   int t1 = dht.readTemperature();
   int h2 = dht2.readHumidity();
   int t2 = dht2.readTemperature();
 
   if (isnan(h1) || isnan(t1)) {
      Serial.println("Failed to read from DHT sensor!");
      //return;
   }

    int humedad1 = analogRead(sensorPin1);
    int humedad2 = analogRead(sensorPin2);
    int humedad3 = analogRead(sensorPin3);
  
   if(humedad1 < 500)
   {
      Serial.println("Encendido");  
      //hacer las acciones necesarias
   }
   delay(1000);
   Serial.print("HS1: ");
   Serial.print(humedad1);
   Serial.print(" \t");
   Serial.print("HS2: ");
   Serial.print(humedad2);
   Serial.print(" \t");
   Serial.print("HS3: ");
   Serial.print(humedad3);
   Serial.print(" \t");
   Serial.print("HR: ");
   Serial.print(h1);
   Serial.print(" %\t");
   Serial.print("T: ");
   Serial.print(t1);
   Serial.print(" *C ");
   Serial.print(" %\t");
   Serial.print("HR2: ");
   Serial.print(h2);
   Serial.print(" %\t");
   Serial.print("T2: ");
   Serial.print(t2);
   Serial.print(" *C ");
   Serial.print(" \t");
   Serial.print("T3 = ");
  Serial.print(celsius);
  Serial.print("C\n");
  Serial.print(" \n");

//respaldo para impresion de 4 magnitudes
  lcd.setCursor(0,0);
  lcd.print("H1: ");
  lcd.setCursor ( 3, 0 );
    if(humedad1<1000)
  {
  lcd.print(humedad1);
  lcd.setCursor ( 6,0 );
  lcd.print(" ");
  }
  if(humedad1>999)
  {
  lcd.print(humedad1);
  }
  lcd.setCursor(9,0);
  lcd.print("H2: ");
  lcd.setCursor ( 12,0 );
  if(humedad2<1000)
  {
  lcd.print(humedad2);
  lcd.setCursor ( 15,0 );
  lcd.print(" ");
  }
  if(humedad2>999)
  {
  lcd.print(humedad2);
  }
  lcd.setCursor ( 0,1 );
  lcd.print("H3: ");
  lcd.setCursor ( 3,1 );
  if(humedad3<1000)
  {
  lcd.print(humedad3);
  lcd.setCursor ( 6,1 );
  lcd.print(" ");
  }
  if(humedad3>999)
  {
    lcd.print(humedad3);
  }
  
  lcd.setCursor ( 9,1 );
  lcd.print("HR1:");
  lcd.setCursor ( 13,1 );
  lcd.print(h1);
  lcd.setCursor ( 15,1 );
  lcd.print("%");
//segunda pantalla
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
 



  
}

