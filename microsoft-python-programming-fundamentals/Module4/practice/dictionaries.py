# Add the SKU data provided to the product catalog dictionary
product_catalog = {
    "SKU123": {"name": "Widget A", "price": 19.99, "quantity": 50},
    "SKU456": {"name": "Gadget B", "price": 34.95, "quantity": 25},
    "SKU789": {"name": "Gizmo C", "price": 9.99, "quantity": 100},
}

# Look up this SKU in your code.
sku_to_find = "SKU123"

if sku_to_find in product_catalog:
    product_info = product_catalog[sku_to_find]
    name = product_info["name"]
    price = product_info["price"]

    print(f"The price of {name} is ${price}")
else:
    print(f"Error: The SKU '{sku_to_find}' was not found in the cataloge.")
