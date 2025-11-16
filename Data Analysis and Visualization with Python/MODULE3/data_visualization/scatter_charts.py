import matplotlib.pyplot as plt
import numpy as np

ages = np.linspace(20, 60, 100)  # Ages ranging from 20 to 60
income = ages * 500 + np.random.normal(
    0, 10000, 100
)  # Simulating a positive correlation with some noise

plt.scatter(ages, income)
plt.xlabel("Age")
plt.ylabel("Income")
plt.title("Age vs. Income")
plt.show()
