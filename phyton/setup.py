import os, sys
import time

def requirements():
	os.system("""
		pip3 install telethon requests configparser
		python3 -m pip install telethon requests configparser
		touch config.data
		""")
	
	print("[+] requierments Installed.\n")


def config_setup(xid,xhash,xphone):
	import configparser
	cpass = configparser.RawConfigParser()
	cpass.add_section('cred')
	cpass.set('cred', 'id', sys.argv[2])
	cpass.set('cred', 'hash', sys.argv[3])
	cpass.set('cred', 'phone', sys.argv[1])
	setup = open('config.data', 'w')
	cpass.write(setup)
	setup.close()
	print("[+] setup complete !")

def merge_csv():
	import pandas as pd
	import sys
	
	file1 = pd.read_csv(sys.argv[2])
	file2 = pd.read_csv(sys.argv[3])
	print(' merging '+sys.argv[2]+' & '+sys.argv[3]+' ...')
	print(' big files can take some time ... ')
	merge = file1.merge(file2, on='username')
	merge.to_csv("output.csv", index=False)
	print(' saved file as "output.csv"\n')

def update_tool():
	import requests as r
	
	source = r.get("https://raw.githubusercontent.com/th3unkn0n/TeleGram-Scraper/master/.image/.version")
	if source.text == '3':
		print(' alredy latest version')
	else:
		print(' removing old files ...')
		os.system('rm *.py');time.sleep(3)
		print(' getting latest files ...')
		os.system("""
			curl -s -O https://raw.githubusercontent.com/th3unkn0n/TeleGram-Scraper/master/add2group.py
			curl -s -O https://raw.githubusercontent.com/faizan6623/telegram/master/scraper.py
			curl -s -O https://raw.githubusercontent.com/faizan6623/telegram/master/setup.py
			curl -s -O https://raw.githubusercontent.com/faizan6623/telegram/master/smsbot.py
			chmod 777 *.py
			""");time.sleep(3)
		print(' update compled.\n')

try:
	if any ([sys.argv[1] == '--config', sys.argv[1] == '-c']):
		print(' selected module : '+sys.argv[1])
		config_setup(sys.argv[2],sys.argv[3],sys.argv[4])
	elif any ([sys.argv[1] == '--merge', sys.argv[1] == '-m']):
		print(' selected module : '+sys.argv[1])
		merge_csv()
	elif any ([sys.argv[1] == '--update', sys.argv[1] == '-u']):
		print(' selected module : '+sys.argv[1])
		update_tool()
	elif any ([sys.argv[1] == '--install', sys.argv[1] == '-i']):
		requirements()
	elif any ([sys.argv[1] == '--help', sys.argv[1] == '-h']):
		
		print("""$ python3 setup.py -m file1.csv file2.csv
			
	( --config  / -c ) setup api configration
	( --merge   / -m ) merge 2 .csv files in one 
	( --update  / -u ) update tool to latest version
	( --install / -i ) install requirements
	( --help    / -h ) show this msg 
			""")
	else:
		print('\n unknown argument : '+ sys.argv[1])
		print(' for help use : ')
		print('$ python3 setup.py -h'+'\n')
except IndexError:
	print('\n no argument given : '+ sys.argv[1])
	print(' for help use : ')
	print(' https://github.com/th3unkn0n/TeleGram-Scraper#-how-to-install-and-use')
	print('$ python3 setup.py -h'+'\n')
