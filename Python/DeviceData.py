import threading
from platform import system as system_name
from uuid import getnode as get_mac
import random
import os
import requests
import datetime
from datetime import timedelta
import subprocess
import json

server_up = None
device_up = True
start_time = None
end_time = None
data = None

HOST_NAME = '127.0.0.1:8000'  # link to page where data should be posted
interval = 5.0  # time between sending data to server in seconds

DEVICE_NAME = 'Computer'


def read_file():
    f = open("api.dat", "r+")
    token = f.read()
    return token


if os.path.exists('api.dat'):
    api_token = read_file()
else:
    api_token = None

# getting device MAC address
mac = get_mac()
v = mac
#s = ':'.join(("%012X" % mac)[i:i+2] for i in range(0, 12, 2))

#For testing new devices
s = 'AA:AA:AA:AA:AA:CC'


# pinging the link to know if server is up
def ping(host):
    global server_up

    # checking operating system of device to ping with correct parameters
    if system_name().lower() == 'windows':
        proc = subprocess.Popen(
            ['ping', '-n', '1', 'google.com'],
            stdout=subprocess.DEVNULL)
        stdout, stderr = proc.communicate()
        if proc.returncode == 0:
            server_up = True
        else:
            server_up = False

    else:
        proc = subprocess.Popen(
            ['ping', '-c', '1', 'google.com'],
            stdout=subprocess.DEVNULL)
        stdout, stderr = proc.communicate()
        if proc.returncode == 0:
            server_up = True
        else:
            server_up = False


def startDevice():
    global device_up
    device_up = True


def stopDevice():
    global device_up
    device_up = False


startDevice()


# sending data as JSON to server if server is up
def sendData():
    global start_time
    global end_time
    global data

    if device_up:
        timer = threading.Timer(interval, sendData)
        timer.start()
        ping(HOST_NAME)
        now = datetime.datetime.now()
        if server_up:

            to_post = {'mac_address': s, 'kw_usage': round(random.uniform(0, 1), 2), 'start_time': str(now)
                , 'end_time': str(now + timedelta(seconds=interval)), 'api_token': api_token}

            headers = {'Content-type': 'application/json'}

            r = requests.post('http://' + HOST_NAME + '/api/submit', data=json.dumps(to_post), headers=headers, verify=False)
            print('posted data to server: ' + str(json.dumps(to_post)) + '\n\nStatus: ' + str(r.status_code))

            if(r.status_code == 404):
                timer.cancel()
                scanMode()

            if(r.status_code == 401):
                timer.cancel()
                print(r.text)



    else:
        print('Network error')


def write_to_file(token):
    f = open("api.dat", "w+")
    f.write(token)
    f.close()


# switch to scan mode.
def scanMode():
    global api_token

    if device_up:
        scanTimer = threading.Timer( 5, scanMode)
        scanTimer.start()
        ping(HOST_NAME)
        if server_up:

            to_post = {'mac_address': s, 'name': DEVICE_NAME}

            headers = {'Content-type': 'application/json'}

            r = requests.post('http://' + HOST_NAME + '/api/scan', data=json.dumps(to_post), headers=headers, verify=False)
            print('posted data to server: ' + str(json.dumps(to_post)) + 'Status: ' + str(r.status_code))

            if(r.status_code == 201):
                scanTimer.cancel()
                js = r.json()
                api_token = js['api_token']
                write_to_file(api_token)
                sendData()

sendData()
