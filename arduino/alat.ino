#ifdef ESP32
#include <WiFi.h>
#include <HTTPClient.h>
#else
#include <PZEM004Tv30.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);


#endif

// const char *ssid = "a";
// const char *password = "12345678";
const char* ssid     = "Dye";
const char* password = "12345678";

// const char* serverName = "http://192.168.238.190/SIMBILI/api/sensor/save";
const char *serverName = "http://kos.e-desa.org/api/sensor/save";

PZEM004Tv30 pzem(D5, D6); // (RX,TX)connect to TX,RX of PZEM
PZEM004Tv30 pzem2(D7, D8);  // (RX,TX) connect to TX,RX of PZEM
// PZEM004Tv30 pzem3(D7, D8);  // (RX,TX) connect to TX,RX of PZEM


void setup()
{
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");

    while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        Serial.print(".");
    }
    Serial.println("");
    Serial.print("Connected to WiFi network with IP Address: ");
    Serial.println(WiFi.localIP());


    lcd.init();
    lcd.backlight();
    lcd.print("Connecting to: ");
    lcd.print(ssid);


   
}

void loop(){

        if (WiFi.status() == WL_CONNECTED){
        WiFiClient client;
        HTTPClient http;

        String 
        r1, r2, r3, r4, r5, r6, s1, s2, s3, s4, s5, s6;


        float voltage1 = pzem.voltage();
        float current1 = pzem.current();
        float power1 = pzem.power();
        float energy1 = pzem.energy();
        float frequency1 = pzem.frequency();
        float pf1 = pzem.pf(); 

        Serial.print("Voltage 1: ");      Serial.print(voltage1);      Serial.println("V");
        Serial.print("Current 1: ");      Serial.print(current1);      Serial.println("A");
        Serial.print("Power 1: ");        Serial.print(power1);        Serial.println("W");
        Serial.print("Energy 1: ");       Serial.print(energy1,3);     Serial.println("kWh");
        Serial.print("Frequency 1: ");    Serial.print(frequency1, 1); Serial.println("Hz");
        Serial.print("PF 1: ");           Serial.println(pf1);
        Serial.println();
        Serial.println();

        float voltage2 = pzem2.voltage();
        float current2 = pzem2.current();
        float power2 = pzem2.power();
        float energy2 = pzem2.energy();
        float frequency2 = pzem2.frequency();
        float pf2 = pzem2.pf();

        Serial.print("Voltage 2: ");      Serial.print(voltage2);      Serial.println("V");
        Serial.print("Current 2: ");      Serial.print(current2);      Serial.println("A");
        Serial.print("Power 2: ");        Serial.print(power2);        Serial.println("W");
        Serial.print("Energy 2: ");       Serial.print(energy2,3);     Serial.println("kWh");
        Serial.print("Frequency 2: ");    Serial.print(frequency2, 1); Serial.println("Hz");
        Serial.print("PF 2: ");           Serial.println(pf2);
        Serial.println();
        Serial.println();

        lcd.init();
        lcd.backlight();
        lcd.print("K1: ");
        lcd.print(power1);
        lcd.print(" W");
        lcd.setCursor(0, 1);
        lcd.print("K2: ");
        lcd.print(power2);
        lcd.print(" W");

        // PROSES UPLOAD
        r1 = String(voltage1);
  r2 = String(current1);
  r3 = String(power1);
  r4 = String(energy1,3);
  r5 = String(frequency1, 1);
  r6 = String(pf1);

  s1 = String(voltage2);
  s2 = String(current2);
  s3 = String(power2);
  s4 = String(energy2,3);
  s5 = String(frequency2, 1);
  s6 = String(pf2);

        http.begin(client, serverName);

        http.addHeader("Content-Type", "application/x-www-form-urlencoded");


        String httpRequestData = "voltage1="+r1 
                              +"&current1="+r2 
                              +"&power1="+r3 
                              +"&energy1="+r4 
                              +"&frequency1="+r5 
                              +"&pf1="+r6
                              +"&voltage2="+s1 
                              +"&current2="+s2 
                              +"&power2="+s3 
                              +"&energy2="+s4 
                              +"&frequency2="+s5 
                              +"&pf2="+s6;

        Serial.print("httpRequestData: ");
        Serial.println(httpRequestData);

        int httpResponseCode = http.POST(httpRequestData);

        if (httpResponseCode > 0)
        {
            Serial.print("HTTP Response code: ");
            Serial.println(httpResponseCode);
        }
        else
        {
            Serial.print("Error code: ");
            Serial.println(httpResponseCode);
        }
        http.end();

// pzem.resetEnergy();
// pzem2.resetEnergy();
  delay(2000);
    } else {
        Serial.println("WiFi Disconnected");
        lcd.init();
        lcd.backlight();
        lcd.print("Wifi Disconect");
        delay(2000);
        while (WiFi.status() != WL_CONNECTED)
    {
        delay(500);
        Serial.print(".");
    }

    delay(3000);
    }
}