import threading
from platform import system as system_name
from uuid import getnode as get_mac
import random
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

HOST_NAME = 'google.com'  # link to page where data should be posted
interval = 30.0  # time between sending data to server in seconds

# getting device MAC address
mac = get_mac()
v = mac
s = ':'.join(("%012X" % mac)[i:i+2] for i in range(0, 12, 2))


# pinging the link to know if server is up
def ping(host):
    global server_up

    # checking operating system of device to ping with correct parameters
    if system_name().lower() == 'windows':
        proc = subprocess.Popen(
            ['ping', '-n', '1', host],
            stdout=subprocess.DEVNULL)
        stdout, stderr = proc.communicate()
        if proc.returncode == 0:
            server_up = True
            #print('True')
        else:
            server_up = False
            #print('False')

    else:
        proc = subprocess.Popen(
            ['ping', '-c', '1', host],
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
        threading.Timer(interval, sendData).start()
        ping(HOST_NAME)
        now = datetime.datetime.now()
        now.strftime('%Y-%m-%d %H:%M:%S')
        if server_up:
            
            to_post = {'mac_address': s, 'kw_usage': round(random.uniform(0, 1), 2), 'Status': 'Alive', 'start_time': str(now)
                , 'end_time': str(now + timedelta(seconds=interval))}

            headers = {'Content-type': 'application/json'}
            
            r = requests.post('http://127.0.0.1:8000/api/submit', data=json.dumps(to_post), headers=headers)
            # print('posted data to server: ' + str(to_post))
    else:
        print('Network error')


sendData()
