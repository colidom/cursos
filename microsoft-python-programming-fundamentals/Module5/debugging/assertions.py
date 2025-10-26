def calculate_area(length, width):
    assert length > 0, "Length must be positive"
    assert width > 0, "Width must be positive"
    return length * width


area = calculate_area(5, 10)  # Valid input
print("Area:", area)
area = calculate_area(-5, 10)  # This will raise an AssertionError
print("Area:", area)
