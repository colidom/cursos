import pandas as pd

customers = pd.read_csv("customer_data_50.csv")

""" print(customers.shape)
print(customers.head())
print(customers.info()) """
print(customers.describe())
""" print(customers.columns)
print(customers.dtypes)
print(customers.isnull().sum())
print(customers.nunique())
print(customers["age"].value_counts())
print(customers["gender"].value_counts())
print(customers["total_spend"].value_counts())
 """
