data_available=True
data_to_write=[]

while data_available:
    input_data = input("Enter data which you want to write to file: ")
    data_to_write.append(input_data)
    choice=input("Press 'Y' if you want to enter another line: ")
    if choice.lower() != 'y':
        data_available=False

# Write to a file
with open("sample_file.txt","a") as file:
    for line in data_to_write:
        file.write(line + "\n")
    print("Data written to file...")

# Read from this file
with open("sample_file.txt","r") as file:
    print("All data at once: ")
    file_data=file.read()
    print(file_data)

    print("Read first line: ")
    file.seek(0)
    first_line=file.readline()
    print(first_line)
    
    print("Read line by line: ")
    file.seek(0)
    file_data=file.readlines()
    
    for line in file_data:
        print(line)

    