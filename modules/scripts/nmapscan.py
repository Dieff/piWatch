import nmap
import mysql.connector
import sys

#IP range needed as arguments. Port range and flags have defaults
iprange = sys.argv[1]
portrange = ''
flags = '-sV'
#Get optional arguments, if they exist
if(len(sys.argv)>2):
	portrange = sys.argv[2]
	if(len(sys.argv)>3):
		flags = ''
		for arg in sys.argv[3:]:
			flags += ' ' + arg
#print 'Arguments Passed:'
#print iprange portrange flags
print 'Performing Scan...'
#Perform nmap scan with given arguments
nm = nmap.PortScanner()
nm.scan(iprange, portrange, flags)
print(nm.scanstats())
print 'Scan Done'
#Connect to MySQL database using mysql.connector package
dbc = mysql.connector.connect(user='piWatch',password='Cybersec$314',database='nscan')
cursor = dbc.cursor()
query = ("INSERT INTO scans (date, time, host, prot, port, serv, soft, vers, vend) VALUES (%(date)s,%(time)s,%(host)s,%(prot)s,%(port)s,%(serv)s,%(soft)s,%(vers)s,%(vend)s)")

#Split information from scans
splitup = nm.scanstats()['timestr'].split()
date = splitup[2]+" "+splitup[1]+" "+splitup[4]
time = splitup[3]
for host in nm.all_hosts():
	pring('in loop')
	vendor = ""
	if(nm[host]['vendor'].values()):
		vendor = (nm[host]['vendor'].values()[0])
	if('tcp' in nm[host]):
		protocol = 'tcp'
		for port in nm[host]['tcp']:
			service = nm[host][protocol][port]['name']
			software = nm[host][protocol][port]['product']
			version = nm[host][protocol][port]['version']
			values = { 'date' : date,
			'time' : time,
			'host' : host,
			'prot' : protocol,
			'port' : port,
			'serv' : service,
			'soft' : software,
			'vers' : version,
			'vend' : vendor}
			print(values)
			cursor.execute(query, values)
#Commit changes made to database
dbc.commit()
cursor.close()
dbc.close()
