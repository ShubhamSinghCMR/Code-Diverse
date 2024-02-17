def squares(limit):
    n = 1
    while n <= limit:
        yield n * n
        n += 1

# Using the generator
square_gen = squares(5)
for square in square_gen:
    print(square)

print("Generator object type: ",type(square_gen))

list_square_gen=list(squares(5))
print(f"List form: {list_square_gen}")