def squares(limit):
    n = 1
    while n <= limit:
        yield n * n
        n += 1

# Using the generator
square_gen = squares(5)
for square in square_gen:
    print(square)
