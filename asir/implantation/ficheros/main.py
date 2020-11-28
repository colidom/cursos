numbers = []
with open("numbers.txt") as f:
    for line in f:
        my_numbers = line.strip().split()
        for number in my_numbers:
            numbers.append(int(number))
print (numbers)
