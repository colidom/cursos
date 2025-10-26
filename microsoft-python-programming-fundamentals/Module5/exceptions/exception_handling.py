"""Functional code challenge: Safe file reading
Task:
Write a Python function named read_file_contents that takes file_path as an argument.

Inside the function, use a try-except block to attempt to open the file, read its contents,
and print them to the console.

Handle the FileNotFoundError specifically by printing an appropriate error message if the file doesn't exist.

Tips:
Name your file variable file.

Use the  with open() statement, which ensures that the file is closed automatically, so calling file.close() in the finally block won’t be necessary.

Example Input:
read_file_contents("/Users/Example/Documents/my_file.txt")

Expected output:
Error: File not found - /Users/Example/Documents/my_file.txt"""


def read_file_contents(file_path):
    try:
        with open(file_path, "r") as file:
            contents = file.read()
            print(contents)
    except FileNotFoundError:
        print(f"Error: File not found - {file_path}")
