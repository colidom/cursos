import matplotlib.pyplot as plt

categories = ["Product A", "Product B", "Product C", "Product D"]
values = [1500, 2300, 1200, 3000]

plt.bar(categories, values)
plt.xlabel("Products")
plt.ylabel("Sales")
plt.title("Product Sales Comparison")
plt.show()
