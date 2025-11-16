import matplotlib.pyplot as plt
import numpy as np

x = np.linspace(0, 10, 100)
y = np.sin(x)

plt.plot(x, y)

# Set tick locations and labels for the x-axis
plt.xticks(np.arange(0, 11, 2), ["0", "2", "4", "6", "8", "10"])

# Rotate x-axis labels for better readability
plt.xticks(rotation=45)

plt.show()
