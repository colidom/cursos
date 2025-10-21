import geometry_calculations

radius = 5
area = geometry_calculations.calculate_area_circle(radius)
circumference = geometry_calculations.calculate_circumference_circle(radius)

print(f"Area of circle: {area}")
print(f"Circumference of circle: {circumference}")

rect = geometry_calculations.Rectangle(4, 6)
rect_area = rect.calculate_area()
rect_perimeter = rect.calculate_perimeter()

print(f"Area of rectangle: {rect_area}")
print(f"Perimeter of rectangle: {rect_perimeter}")
