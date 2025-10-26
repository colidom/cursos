"""Functional code challenge: Handling a KeyError
Task:
    - Write a Python function named get_city_population that takes two parameters.
    - populations - a dictionary representing city populations.
    - city - a string representing the name of the city.

The function should:
    - Return the population of the specified city if it's found in the dictionary.
    - Raise a KeyError with a clear error message if the city is not found.
    - Use a try-except block inside the function to handle the KeyError with a custom error message.

Tips:
    - Use raise KeyError() to explicitly raise the exception with your custom error message.
    - Do not use any type hints when declaring the function.

Example 1:
    - city_populations = {"New York": 8336817, "Los Angeles": 3979576, "Chicago": 2679044}
    - city_name = "Tampa"
T   - his should yield a KeyError stating 'City "Tampa" not found in population data.'

Example 2:
    - city_populations = {"New York": 8336817, "Los Angeles": 3979576, "Chicago": 2679044}
    - city_name = "New York"
    - This should yield the population of New York, which is 8336817 in this dictionary.
"""


def get_city_population(populations, city):
    try:
        return populations[city]
    except KeyError:
        raise KeyError(f'City "{city}" not found in population data.')


# Example dictionary for testing
city_populations = {"New York": 8336817, "Los Angeles": 3979576, "Chicago": 2679044}
# Example usage
print(get_city_population(city_populations, "Tampa"))  # This will raise a
# KeyError: City "Tampa" not found in population data.
# print(get_city_population(city_populations, "New York"))  # This will print 8336817
