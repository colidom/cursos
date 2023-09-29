package entradasalida;

import java.util.Locale;
import java.util.Scanner;

public class EjemploEntradaSalidaDatos {

	public static void main(String[] args) {

		Scanner sc = new Scanner(System.in).useLocale(Locale.US); // useLocale (para poder usar punto (.) ne lugar de
																	// coma (,))

		System.out.print("Introduce un número: ");
		int numero = sc.nextInt();

		System.out.println("El número es: ");
		System.out.println(numero);

		// Cálculo area rectángulo
		System.out.println("Introduce la base del rectángulo:");
		double base = sc.nextDouble();
		System.out.println("Introduce la altura del rectángulo:");
		double altura = sc.nextDouble();

		System.out.println("El area del rectángulo es: " + (base * altura));

		sc.close();

	}

}
