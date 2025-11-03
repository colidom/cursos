import pandas as pd

data = [["Alice", 25], ["Bob", 30], ["Charlie", 28]]

df = pd.DataFrame(data, columns=["Name", "Age"])

print(df)
