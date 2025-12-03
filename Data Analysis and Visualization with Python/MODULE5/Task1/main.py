# Provided for you - no changes necessary.
import pandas as pd
from sklearn.model_selection import train_test_split

df = pd.read_csv("house_prices.csv")

# Display the first 5 rows of the DataFrame
df.head()
# Display column names and data types
df.info()
# Summary statistics of numerical columns
df.describe()
# Observe data types of df
df.dtypes

# Show where and how many missing values are in data set
# Code provided
df.isnull().sum()

# Calculate the median of the 'condition' field and fill missing values in “condition” with it
df["condition"] = df["condition"].fillna(df["condition"].median())

# Display the DataFrame head (after filling in code in the above line)
df.head()

# Select relevant features and target variable

X = df[["sqft_living", "bedrooms", "bathrooms", "floors"]]

y = df["price"]

# Check shape of features and target (provided)
print(f"Shape of X: {X.shape}")
print("Expected X should be displayed as (4140, 4).")

print(f"Shape of y: {y.shape}")
print("Expected y should be displayed as (4140,).")


# Split the data
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

# Check shape of splits
print(f"Shape of X_train: {X_train.shape}")
print("Expected X_train should be displayed as (3312, 4)")

print(f"Shape of X_test: {X_test.shape}")
print("Expected X_test should be displayed as (828, 4)")

# No changes required to this cell
from sklearn.linear_model import LinearRegression

# Create an instance of the LinearRegression model
model = LinearRegression()

# Fit the model
model.fit(X_train, y_train)

from sklearn.metrics import mean_squared_error, r2_score, mean_absolute_error

y_pred = model.predict(X_test)

# Calculate the Mean Squared Error (MSE)
mse = mean_squared_error(y_test, y_pred)

# Calculate the R-squared value
r_squared = r2_score(y_test, y_pred)

# Calculate the Mean Absolute Error (MAE)
mae = mean_absolute_error(y_test, y_pred)

# Test values (provided for you)
print(f"Your Mean Squared Error (MSE): {mse}")
print("Expected MSE should be around 74224655277.46896")

print(f"Your R-squared: {r_squared}")
print("Expected R-squared should be around 0.2919889333519581")

print(f"Your Mean Absolute Error (MAE): {mae}")
print("Expected MAE should be around 181509.94407826668")

# Check residual stats -- y test values minus y predicted values
residuals = y_test - y_pred

print(f"Residual mean: {residuals.mean()}")
print("Expected residual mean should be around -10095.795891582062.")

print(f"Residual std deviation: {residuals.std()}")
print("Expected residual standard deviation should be around 272419.4534816532.")

# Ungraded; available for your exploration
from sklearn.tree import DecisionTreeRegressor

tree = DecisionTreeRegressor(random_state=42)
tree.fit(X_train, y_train)
tree_pred = tree.predict(X_test)

tree_mse = mean_squared_error(y_test, tree_pred)
tree_r2 = r2_score(y_test, tree_pred)
tree_mae = mean_absolute_error(y_test, tree_pred)

print(f"DecisionTreeRegressor MSE: {tree_mse}")
print(f"DecisionTreeRegressor R-squared: {tree_r2}")
print(f"DecisionTreeRegressor MAE: {tree_mae}")

# Ungraded; available for your exploration
from sklearn.ensemble import RandomForestRegressor

forest = RandomForestRegressor(random_state=42)
forest.fit(X_train, y_train)
forest_pred = forest.predict(X_test)

forest_mse = mean_squared_error(y_test, forest_pred)
forest_r2 = r2_score(y_test, forest_pred)
forest_mae = mean_absolute_error(y_test, forest_pred)

print(f"RandomForestRegressor MSE: {forest_mse}")
print(f"RandomForestRegressor R-squared: {forest_r2}")
print(f"RandomForestRegressor MAE: {forest_mae}")
