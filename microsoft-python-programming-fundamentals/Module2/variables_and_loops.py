"""Instrucciones:
Necesita dos listas para almacenar los datos de temperatura.

La primera lista, celsius_temperatures, ya ha sido creada.

Añada a ella las siguientes temperaturas Celsius de muestra: 0, 10, 25, 32, 100 a
celsius_temperatures.

Cree la segunda lista, fahrenheit_temperatures, como una lista vacía para almacenar las
temperaturas Fahrenheit convertidas más tarde. En este momento debería ser una lista vacía.

Imprime ambas listas para observar su estado inicial."""

# Create a list and add sample Celsius temperatures to it
celsius_temperatures = []  # Start with an empty list (do not modify)

# Add the Celsius temperatures to the list
#### Insert code here
# Lists from Step 1 (do not modify)
celsius_temperatures = [0, 10, 25, 32, 100]
fahrenheit_temperatures = []

# Convert each Celsius temperature to Fahrenheit
for celsius in celsius_temperatures:  # Start the loop (do not modify this line)
    fahrenheit = (celsius * 9 / 5) + 32  # Convert to Fahrenheit

    fahrenheit_temperatures.append(
        fahrenheit
    )  # Append to the list (do not modify this line)

# Print the results (including the output from Step 1 - do not modify)
print("Celsius Temperatures:", celsius_temperatures)
print("Fahrenheit Temperatures:", fahrenheit_temperatures)
