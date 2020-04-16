import csv
username = []
password=  []
with open('names.txt','r') as csvfile:
	plot=csv.reader(csvfile,delimiter=',')
	for row in plot:
		username.append(row[0]) 
		password.append(row[1])
print (username[0])
print (username[1])
print (password[0])
print (password[1])