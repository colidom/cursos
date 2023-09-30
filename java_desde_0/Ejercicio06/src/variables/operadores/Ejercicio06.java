package variables.operadores;

import java.util.Scanner;

public class Ejercicio06 {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);

		System.out.print("Introduzca un número: ");
		double numero = sc.nextDouble();

		/*
		 * if (numero % 2 == 0) {
		 * System.out.println("El número es par");
		 * } else {
		 * System.out.println("El número es impar");
		 * }
		 */

		String resultado = (numero % 2 == 0) ? "par" : "impar";
		System.out.println("El número " + numero + " es " + resultado);

	}

}
