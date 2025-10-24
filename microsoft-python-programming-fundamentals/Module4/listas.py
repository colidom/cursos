shopping_list = ["apples", "bananas", "milk"]  # List for items
item_quantities = {"apples": 3, "bananas": 1}  # Dictionary for quantities

# User adds an item
shopping_list.append("eggs")
item_quantities["eggs"] = 12 

# User increases the quantity of bananas
item_quantities["bananas"] += 2

# User removes apples
shopping_list.remove("apples")
del item_quantities["apples"]

# Print updated list and dictionary
print(shopping_list)
print(item_quantities)