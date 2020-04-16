from tkinter import *


class Buttons:
	
	def __init__(self, master):
		self.master = master
		self.frame = Frame(self.master)
		self.Button(self.master, text='Quit', command=self.display).grid(row=5, column=1, sticky=W, pady=4)
		self.Button(self.master, text='Execute', command=self.display).grid(row=5, column=0, sticky=W, pady=4)
		
	def display(self):
		print ('Hello Button1')

	def new_window(self):
		self.master.withdraw()
		self.newWindow = Toplevel(self.master)
		bb = Buttons1(self.newWindow)



class Buttons1():
	
	def __init__(self, master):
		self.master = master
		self.frame = Frame(self.master)
		self.b3 = Button(self.master, text="Button3", command=self.display3)
		self.b3.pack()
		self.frame.pack()
		

	def display3(self):
		print ('hello button3')

	
if __name__ == '__main__':
	root = Tk()
	root.mainloop()