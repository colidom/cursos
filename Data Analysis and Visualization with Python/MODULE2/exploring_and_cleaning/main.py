import pandas as pd
import matplotlib.pyplot as plt

# Lee el archivo, tratando las celdas vacías como NaN
df = pd.read_csv("sales_data_new.csv", na_values="")

# Display the first few rows of the DataFrame
print(df.head())

# Show basic information about the DataFrame
print(df.info())

# Show summary statistics and check for missing values
print(df.describe())

# Check for missing values in each column
print(df.isnull().sum())

# Drop irrelevant columns (solo se borra la columna si la operación de drop es reasignada o usada con inplace=True.
# En el código original, el drop no es persistente; si se desea borrar la columna:
df = df.drop("irrelevant_column_1", axis=1)
# O si se quiere mantener el flujo del código original, solo se imprime:
print(
    df.drop("irrelevant_column_2", axis=1)
)  # Simulo el print del drop original, aunque el usuario solo puso una columna

# Update de date
df["date"] = pd.to_datetime(df["date"])

# Agregate de DataFrame
sales_by_product = df.groupby("product")["sales"].sum()
print(sales_by_product)

# Debug and eradicate any strings or excesive floats
# 1. Convertir 'price' y 'cost' a numérico, forzando strings/datos sucios a NaN
df["price"] = pd.to_numeric(df["price"], errors="coerce")
df["cost"] = pd.to_numeric(df["cost"], errors="coerce")

# 2. Aplicar la limpieza (dropna) y REASIGNAR el DataFrame para eliminar las filas con NaN
df = df.dropna(subset=["price", "cost"]).copy()

# 3. Convertir a entero (int) de forma vectorizada y segura
df["price"] = df["price"].astype(int)
df["cost"] = df["cost"].astype(int)

# Create a profit column
df["profit"] = df["price"] - df["cost"]

# Get intelligence on the data
print(df["profit"].mean())
print(df["profit"].median())
print(df.describe())

X = df["price"]
Y = df["cost"]

# Line chart
plt.plot(X, Y, "o")
plt.title("Line chart of Price vs Cost")
plt.xlabel("Price")
plt.ylabel("Cost")
plt.show()

# Bar chart
plt.bar(X, Y)
plt.title("Bar chart of Price vs Cost")
plt.xlabel("Price")
plt.ylabel("Cost")
plt.show()
