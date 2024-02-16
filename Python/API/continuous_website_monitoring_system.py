"""
Continuous website monitoring system
"""
import requests
import time
while True:
    req=requests.get("https://google.com")

    if req.status_code==200:
        print("Website is up")
    else:
        print("Website is down")

    time.sleep(3)