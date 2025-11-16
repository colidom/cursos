import matplotlib.pyplot as plt

labels = ["Windows", "macOS", "Linux", "Other"]
sizes = [70, 20, 5, 5]

plt.pie(sizes, labels=labels, autopct="%1.1f%%")  # Display percentages on each slice
plt.title("Market Share of Operating Systems")
plt.show()
