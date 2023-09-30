package variables.operadores;

public class Ejercicio10 {

	public static void main(String[] args) {
		// Datos del problema
		double velocidad = 17.0; // Velocidad en km por segundo
		double espacioInicial = 150000.0; // Espacio inicial en km

		// Calculamos el tiempo
		double tiempo = espacioInicial / velocidad;

		// Mostramos los resultados
		System.out.println("Velocidad del objeto: " + velocidad + " km/s");
		System.out.println("Espacio inicial: " + espacioInicial + " km");
		System.out.println("Tiempo transcurrido: " + tiempo + " segundos");
	}

}
