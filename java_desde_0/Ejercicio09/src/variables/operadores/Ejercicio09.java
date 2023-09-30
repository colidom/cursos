package variables.operadores;

public class Ejercicio09 {

	public static void main(String[] args) {
		// Declaración e inicialización de dos variables
		int a = 5;
		int b = 10;

		System.out.println("Antes del intercambio:");
		System.out.println("a = " + a);
		System.out.println("b = " + b);

		// Intercambio de variables usando una variable temporal
		int temp = a;
		a = b;
		b = temp;

		System.out.println("\nDespués del intercambio:");
		System.out.println("a = " + a);
		System.out.println("b = " + b);
	}

}
