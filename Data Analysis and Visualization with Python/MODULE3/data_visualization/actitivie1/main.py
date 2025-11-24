import pandas as pd
import matplotlib.pyplot as plt
import plotly.express as px
import plotly.express as px


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

# Extract the duration_seconds column
duration_seconds = music_data["duration_seconds"]

# Create a histogram to display the distribution of `duration_seconds`
plt.figure(figsize=(10, 6))
plt.hist(duration_seconds, bins=20, color="skyblue", edgecolor="black")

# Add title and labels
plt.title("Distribution of Song Durations")
plt.xlabel("Duration (seconds)")
plt.ylabel("Frequency")

# Display the plot using plt.show()
plt.show()

# Extract the popularity column
popularity = music_data["popularity"]

# Create a histogram to display the distribution of popularity
plt.figure(figsize=(8, 5))  # Set the figure size for better readability

# Plot the histogram with customized bins and colors
plt.hist(popularity, bins=15, color="lightgreen", edgecolor="black")

# Add title and labels
plt.title("Distribution of Song Popularity")
plt.xlabel("Popularity")
plt.ylabel("Frequency")

# Display the plot using plt.show()
plt.show()


# Create a new dataframe `numeric_features` containing only the
# numeric columns we want to analyze
numeric_features = music_data[
    ["tempo", "energy", "danceability", "valence", "acousticness", "popularity"]
]

# Compute the correlation matrix
correlation_matrix = numeric_features.corr()

# Create and display a heatmap using Plotly
plt = px.imshow(
    correlation_matrix,
    x=correlation_matrix.columns,
    y=correlation_matrix.columns,
    color_continuous_scale="RdBu",  # Use a built-in Plotly colorscale
    zmin=-1,  # Set the minimum value for the color scale
    zmax=1,  # Set the maximum value for the color scale
    title="Correlation Matrix of Music Features",
)

plt.show()

plt = px.violin(
    music_data,
    x="genre",
    y="popularity",
    color="genre",
    title="Popularity Distribution Across Genres",
)

plt.show()
