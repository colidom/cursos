package variables.operadores;

import java.util.Scanner;

public class Ejercicio07 {

	public static void main(String[] args) {

		System.out.println("Introduzca dos números");
		Scanner sc = new Scanner(System.in);
		System.out.print("Número 1: ");
		int num1 = sc.nextInt();
		System.out.print("Número 2: ");
		int num2 = sc.nextInt();

		int suma = num1 + num2;
		int resta = num1 - num2;
		int multipl = num1 * num2;
		int div = num1 / num2;
		int resto = num1 % num2;

		System.out.println("El resultado de " + num1 + " + " + num2 + " es " + suma);
		System.out.println("El resultado de " + num1 + " - " + num2 + " es " + resta);
		System.out.println("El resultado de " + num1 + " * " + num2 + " es " + multipl);
		System.out.println("El resultado de " + num1 + " / " + num2 + " es " + div);
		System.out.println("El resultado de " + num1 + " %  " + num2 + " es " + resto);

		sc.close();
	}

}
