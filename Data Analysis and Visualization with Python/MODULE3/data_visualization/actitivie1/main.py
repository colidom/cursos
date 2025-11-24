import pandas as pd
import matplotlib.pyplot as plt

# Load the dataset
music_data = pd.read_csv("music_data.csv")

# Display the first 5 rows
print("First 5 rows of the dataset:")
print(music_data.head())

# Get information about the columns (data types and non-null values)
print("\nColumn information:")
print(music_data.info())

# Count the occurrences of each unique value in the `genre` column
genre_counts = music_data["genre"].value_counts()

# Sort the genres by frequency in descending order and select the top 10 genres
top_10_genres = genre_counts.head(10)

# Create a bar chart to display the top 10 genres by frequency
plt.figure(figsize=(10, 6))
top_10_genres.plot(kind="bar")

# Add title and labels
plt.title("Top 10 Music Genres by Frequency")
plt.xlabel("Genre")
plt.ylabel("Frequency")

# Display the plot using plt.show()
plt.show()
