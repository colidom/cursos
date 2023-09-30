package variables.operadores;

import java.util.Scanner;

public class Ejercicio08 {

	public static void main(String[] args) {

		// Calcular media de 3 números introducidos por teclado
		Scanner sc = new Scanner(System.in);

		System.out.println("Inserte 3 números para calcular la media");
		System.out.print("Número 1: ");
		int num1 = sc.nextInt();
		System.out.print("Número 2: ");
		int num2 = sc.nextInt();
		System.out.print("Número 3: ");
		int num3 = sc.nextInt();

		int resultado = (num1 + num2 + num3) / 3;
		System.out.println("La media entre " + num1 + ", " + num2 + " y " + num3 + " es: " + resultado);

		sc.close();
	}

}
