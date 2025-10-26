def calculate_average(numbers):
    print("Input numbers:", numbers)
    total = sum(numbers)
    print("Total:", total)
    count = len(numbers)
    print("Count:", count)
    average = total / count
    print("Average:", average)
    return average
