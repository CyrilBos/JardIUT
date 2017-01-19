from flask import Flask
#import serial

app = Flask(__name__)
#ser = serial.Serial('/dev/ttyACM0')

@app.route('/getHumidity')
def get_humidity():
    return '50.32'
