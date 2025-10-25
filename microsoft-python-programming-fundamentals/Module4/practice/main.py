"""Instructions
Download the attached archive and save it on your machine’s desktop. Extract it to a folder where it is easily accessible.
    - Open the folder, which contains the following files:
        - a Jupyter Notebook file named "PYTC1M4P01.ipynb"
        - a Comma-separated value (CSV) dataset named "inventory.csv"
Step 1: Load and Explore the Data
    - You’ll start by using the pandas library to load your product data from a CSV file (inventory.csv) . This file serves as the backbone of our inventory system, storing vital information about each product. Then, you’ll extract the product names and store them in a list for easy manipulation and exploration.
    - The code that imports pandas has already been provided for you.
    - Load the inventory data from the inventory.csv file using pd.read_csv('inventory.csv').
    - Run the cell, which will extract the product names from the DataFrame and store them in a list called inventory and print its output.
Step 2: Remove an Item
    - Products come and go and you’ll need to keep the inventory list up-to-date. In this step, you’ll remove a specific item, "Cheesy Chompers", from the inventory list, ensuring your records accurately reflect the available products.
    - Use the remove() method to remove the first occurrence of "Cheesy Chompers" from the inventory list.
    - Run the cell to print the updated inventory list and see the changes."""

# Import a powerful tool called "pandas" that you'll use to work with and organize data easily
import pandas as pd

# Load the inventory from the CSV file (Step 1)
inventory_df = pd.read_csv("inventory.csv")

# Extract the product names from the DataFrame and store them in a list (Step 1)
inventory = inventory_df["product_name"].tolist()

# Print the initial inventory list and inspect the output (Step 1)
print("Initial Inventory (Step 1 Output):", inventory)

# --- Step 2: Remove an Item ---

# Use the remove() method to remove the first occurrence of "Cheesy Chompers" from the inventory list.
inventory.remove("Cheesy Chompers")

# Run the cell to print the updated inventory list and see the changes.
print("\nUpdated Inventory (Step 2 Output):", inventory)
