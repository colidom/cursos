import pandas as pd

# Sample data
data = {'age': [25, 30, 35, 40], 
        'gender': ['male', 'female', 'male', 'female'], 
        'income': [50000, 60000, 75000, 55000]}

# Create a DataFrame
df = pd.DataFrame(data)

# Convert 'gender' to a categorical variable
df['gender'] = df['gender'].astype('category')

# Calculate average income
average_income = df['income'].mean()

# Count the number of males and females
gender_counts = df['gender'].value_counts()

print(average_income)
print(gender_counts)
