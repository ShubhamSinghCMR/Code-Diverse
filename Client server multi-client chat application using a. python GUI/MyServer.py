import socket, select
def broadcast_data (sock, message):
    for socket in inputlist:
        if socket != server_socket and socket != sock :
            try :
                socket.send(message)
            except :
                socket.close()
                inputlist.remove(socket)
 
if __name__ == "__main__":
     
    inputlist = []
    RECV_BUFFER = 4096 
    PORT = 9998
     
    server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server_socket.bind(("localhost", PORT))
    server_socket.listen(10)
    inputlist.append(server_socket)
 
    print "Chat server started on port " + str(PORT)
 
    while 1:
        read_sockets,write_sockets,error_sockets = select.select(inputlist,[],[])
 
        for sock in read_sockets:
            if sock == server_socket:
                sockfd, addr = server_socket.accept()
                inputlist.append(sockfd)      
            else:
                try:
                    data = sock.recv(RECV_BUFFER)
                    if data:
                        broadcast_data(sock,data+'\n')               
                 
                except:
                    sock.close()
                    inputlist.remove(sock)
                    continue
     
    server_socket.close()
