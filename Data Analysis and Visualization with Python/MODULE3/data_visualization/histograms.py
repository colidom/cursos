import matplotlib.pyplot as plt
import numpy as np

data = np.random.randn(
    1000
)  # Generate 1000 random numbers from a standard normal distribution

plt.hist(data, bins=30)  # Create a histogram with 30 bins
plt.xlabel("Exam Score")
plt.ylabel("Number of Students")
plt.title("Distribution of Exam Scores")
plt.show()
