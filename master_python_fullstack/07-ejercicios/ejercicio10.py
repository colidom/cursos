"""
Ejercicio 10. El programa tiene que pedir la nota de quince alumnos
y sacar por pantalla cuandos han aprobado y cuantos han suspendido
"""
contador = 1
aprobados = 0
suspendidos = 0

numero_alumnos = int(input("¿Cuántos alumnos tienes?: "))

while contador <= numero_alumnos:
    nota = int(input(f"¿Que nota quieres ponerle al 'alumno{contador}'?: "))
    
    if nota >= 5:
        aprobados += 1
    else:
        suspendidos += 1 
    contador += 1

print(f"Alumnos aprobados: {aprobados}")
print(f"Alumnos suspendidos: {suspendidos}")
