import csv
from tkinter import *
from tkinter import messagebox
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time
urlc=  []
usernamec = []
passwordc=  []
commentc=  []
post_id=  []
master = Tk()
var1 = IntVar()
var2 = IntVar()
var3 = IntVar()
	
def but_work():
	if var1.get():
		
		for url in urlc:
			i=0
			for unm in usernamec:
				browser = webdriver.Firefox()
				browser.get('https://disqus.com/profile/login/') 
				username = browser.find_element_by_id("username-input")
				password = browser.find_element_by_id("password-input")
				username.send_keys(unm)
				password.send_keys(passwordc[i])
				login_attempt = browser.find_element_by_class_name("button-container")
				login_attempt.submit()
				time.sleep(5)
				browser.get(url)
				time.sleep(20)
				comment = browser.find_element_by_css_selector(".textarea")
				comment.send_keys(commentc[i])
				print (commentc[i])
				comment_submit = browser.find_element_by_class_name("temp-post")
				comment_submit.submit()
				time.sleep(10)
				i=i+1
				browser.quit()
			
	if var2.get():
		
		for url in urlc:
			i=0
			for unm in usernamec:
				browser = webdriver.Firefox()
				browser.get('https://disqus.com/profile/login/') 
				username = browser.find_element_by_id("username-input")
				password = browser.find_element_by_id("password-input")
				username.send_keys(unm)
				password.send_keys(passwordc[i])
				login_attempt = browser.find_element_by_class_name("button-container")
				login_attempt.submit()
				time.sleep(5)
				browser.get(url)
				time.sleep(20)
				for p_id in post_id:
					try:		
						upvote = browser.find_element_by_id(p_id)
						upvote.find_element_by_css_selector(".vote-up").click()
						time.sleep(10)
					except:
						varstr="Pstid "+p_id+" doesn't sxist"
						messagebox.showinfo('Warning', varstr)
						print("Pstid ",p_id," doesn't sxist")
				i=i+1
				browser.quit()
				
			
	if var3.get():
		
		for url in urlc:
			i=0
			for unm in usernamec:
				browser = webdriver.Firefox()
				browser.get('https://disqus.com/profile/login/') 
				username = browser.find_element_by_id("username-input")
				password = browser.find_element_by_id("password-input")
				username.send_keys(unm)
				password.send_keys(passwordc[i])
				login_attempt = browser.find_element_by_class_name("button-container")
				login_attempt.submit()
				time.sleep(5)
				browser.get(url)
				time.sleep(20)
				recommend = browser.find_element_by_id("recommend-button")
				recommend.click()
				time.sleep(10)
				i=i+1
				browser.quit()
			
def main():
	with open('url.txt','r') as csvfile:
		plot=csv.reader(csvfile,delimiter='\n')
		for row in plot:
			urlc.append(row[0]) 
	with open('credentials.txt','r') as csvfile:
		plot=csv.reader(csvfile,delimiter=',')
		for row in plot:
			usernamec.append(row[0]) 
			passwordc.append(row[1])
	with open('comment.txt','r') as csvfile:
		plot=csv.reader(csvfile,delimiter='\n')
		for row in plot:
			commentc.append(row[0]) 
	with open('post_idc.txt','r') as csvfile:
		plot=csv.reader(csvfile,delimiter='\n')
		for row in plot:
			post_id.append(row[0]) 
			
	Checkbutton(master, text="Enable comment", variable=var1).grid(row=0, sticky=W)
	Checkbutton(master, text="Enable upvote", variable=var2).grid(row=1, sticky=W)
	Checkbutton(master, text="Recommend", variable=var3).grid(row=3, sticky=W)
	Button(master, text='Quit', command=master.quit).grid(row=5, column=1, sticky=W, pady=4)
	Button(master, text='Execute', command=but_work).grid(row=5, column=0, sticky=W, pady=4)
	mainloop()
if __name__== "__main__":
	main()