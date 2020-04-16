
#Reads Line one by one and prints
f = open('file.txt', 'r')
linenum=1
for line in f:
	print("linenum ",linenum," ",line, end='')
	linenum=linenum+1

