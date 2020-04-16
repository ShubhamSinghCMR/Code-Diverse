list=[]
dictionary={}
tuple=()
hl=[]
print("Record entry in list")
for i in range(0,5):
	roll=input("Enter roll number ")
	name=input("Enter name ")
	list.append([])
	list[i].append(roll)
	list[i].append(name)
print("Records in list: ")
print(list)
print("Record entry in tuple")
print("Record entry in tuple. Enter as: Student Roll Number,Student Name")
dta=input("For student 1: ")
hl.append(dta)
dta=input("For student 2: ")
hl.append(dta)
dta=input("For student 3: ")
hl.append(dta)
dta=input("For student 4: ")
hl.append(dta)
dta=input("For student 5: ")
hl.append(dta)
tuple=(hl[0],hl[1],hl[2],hl[3],hl[4])
print("Records in tuple:")
print(tuple)
print("Record entry in dictionary")
for i in range(0,5):
	roll=int(input("Enter roll number: "))
	name=input("Enter name: ")
	dictionary[roll]=name
print("Records in dictionary:")
print(dictionary)
print("Add more record in list")
i=5
for i in range(5,8):
	roll=input("Enter roll number ")
	name=input("Enter name ")
	list.append([])
	list[i].append(roll)
	list[i].append(name)
print("New records in list: ")
print(list)
print("Add more record in dictionary")
i=5
for i in range(5,8):
	roll=int(input("Enter roll number: "))
	name=input("Enter name: ")
	dictionary[roll]=name
print("New records in dictionary:")
print(dictionary)

