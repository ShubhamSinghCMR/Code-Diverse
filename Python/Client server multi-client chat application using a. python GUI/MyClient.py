from Tkinter import *
import tkMessageBox
import socket
import sys
import threading
class MyThread (threading.Thread):
        def run(self):
                recve(s)
def sendmsg(s,n):
    message= n+": "+msg.get()
    chat.insert(INSERT,"Self: "+msg.get()+"\n")
    s.send(message)
    
def recve(s):
      while True:
           data=s.recv(1024)
           if data:
                 chat.insert(INSERT,data)
           else:
                 sys.exit()                        
def connect(n):
    try:
        tkMessageBox.showinfo("Welcome", n+ " You are now connected!")
        b1['text']="CONNECTED"
       # name['state']=DISABLED

    except:
        tkMessageBox.showinfo("Sorry", "Server's Problem!")
                
s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.connect(("localhost",9998)) 
top = Tk()
top.title("Welcome To Chat Server")
L1 = Label(top, text="User_Name")
L3=Label(top,text="By Abir Reus Sen(T15CS011)",fg = "black",bg = "yellow",font = "Verdana")
L1.pack( side = LEFT)
name = Entry(top, bd =5,fg="blue")
L1.grid(row=0,column=0)
name.grid(row=0,column=1)
b1=Button(top,text="CONNECT",fg="black",bg="brown",height=1,width=12,command=lambda:connect(name.get()))
b1.pack(side = RIGHT)
b1.grid(row=0,column=2)
chat = Text(top, height=12,width=40)
chat.grid(row=1,columnspan=3)
msg = Entry(top, bd =5,width=30,fg="blue")
msg.grid(row=2,column=0,columnspan=2)
send=Button(top,text="SEND Message", fg="black",bg="brown",height=1,width=12,command=lambda:sendmsg(s,name.get()))
send.grid(row=2,column=2)
L3.grid(row=3,column=0,columnspan=2)
exit=Button(top,text="EXIT",height=1,width=12,fg="black",bg="brown",command=top.quit)
exit.grid(row=3,column=2,columnspan=2)
thrd = MyThread()
thrd.start()
top.mainloop()
