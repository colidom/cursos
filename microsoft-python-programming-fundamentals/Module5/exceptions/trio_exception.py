file_name = "sample.txt"


def read_file(file_name):
    try:
        with open(file_name, "r") as file:
            contents = file.read()
            print(contents)
    except FileNotFoundError:
        print("Error: File not found -", file_name)
    finally:
        print("Finished attempting to read the file.")


def divide_numbers(a, b):
    try:
        result = a / b
        print("Result:", result)
    except ZeroDivisionError:
        print("Error: Division by zero")
    except TypeError:
        print("Error: Invalid data types")
    finally:
        print("Finished attempting to divide numbers.")
