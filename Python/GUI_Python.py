import csv
from tkinter import *
from tkinter import messagebox
from selenium import webdriver
import time
master = Tk()
var1 = IntVar()
var2 = IntVar()
var3 = IntVar()
def but_work():
	print ("hello")		
	inputValue=T.get("1.0","end-1c")
	print (inputValue)
mystring = StringVar()
        
def main():
			
	Label(master, text="Enter Name").grid(row=0,column=0, sticky=W)
	T = Text(master, height=2, width=30).grid(row=0,column=1, sticky=W)
	Entry(master, textvariable = mystring).grid(row=0, column=2, sticky=E)
	
	print (mystring)
	Checkbutton(master, text="Enable upvote", variable=var2).grid(row=1, sticky=W)
	Checkbutton(master, text="Recommend", variable=var3).grid(row=3, sticky=W)
	Button(master, text='Quit', command=master.quit).grid(row=5, column=1, sticky=W, pady=4)
	Button(master, text='Execute', command=but_work).grid(row=5, column=0, sticky=W, pady=4)
	mainloop()
if __name__== "__main__":
	main()