# Function arguments
def f_arguments(*args):
    print(args)
    print(type(args))

# Keyword arguments
def k_arguments(**kwargs):
    print(kwargs)
    print(type(kwargs))

f_arguments(1,2,3,4)
f_arguments('A',6)

k_arguments(name="Akira", age=21)