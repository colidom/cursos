import matplotlib.pyplot as plt
import numpy as np

x = np.linspace(0, 10, 100)  # Generate 100 evenly spaced points from 0 to 10
y = np.sin(x)  # Compute the sine of each x value

plt.plot(x, y)
plt.xlabel("Time (days)")  # Label the x-axis
plt.ylabel("Stock Price ($)")  # Label the y-axis
plt.title("Stock Price Trend")  # Add a title
plt.show()  # Display the plot
