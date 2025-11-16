import matplotlib.pyplot as plt

# Create a figure with 2 rows and 2 columns of subplots
fig, ax = plt.subplots(2, 2)

# Access individual subplots using indexing
ax[0, 0].plot([1, 2, 3], [4, 5, 6])  # Top-left subplot
ax[0, 1].bar(["A", "B", "C"], [7, 8, 9])  # Top-right subplot
ax[1, 0].scatter([10, 20, 30], [11, 12, 13])  # Bottom-left subplot
ax[1, 1].hist([1, 1, 2, 3, 3, 3])  # Bottom-right subplot

plt.show()
