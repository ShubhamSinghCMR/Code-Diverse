#Input: A->B,C	B->A,D,E	C->A,F 	D->B	E->B,F 	F->C,E 
graph={}
n=int(input("Enter no. of vertices= "))
for i in range (0,n):
	print("Enter ",i+1," vertex: ")
	nd=input()
	sn=int(input("Enter no. of subnode: "))
	hset=set()	
	for j in range (0,sn):
		print("Enter ",j+1," subnode: ")
		snd=input()
		hset.add(snd)
	graph[nd]=hset	
	print()
print ("Graph ",graph,"\n")
def dfs(graph,start):
	visited=set()
	stack=[start]
	i=1
	while stack:
		vertex=stack.pop()
		if vertex not in visited:
			visited.add(vertex)
			stack.extend(graph[vertex]-visited)
	return visited
rn=input("Enter root node: ")	
val=dfs(graph,rn)
print ("\nDFS: ",val)
def bfs(graph,start):
	visited=set()
	queue=[start]
	i=1
	while queue:
		vertex=queue.pop(0)
		if vertex not in visited:
			visited.add(vertex)
			queue.extend(graph[vertex]-visited)
	return visited
rn=input("Enter root node: ")	
val=bfs(graph,rn)
print ("BFS: ",val)