package variables.operadores;

import java.util.Scanner;

public class Ejercicio02 {

	public static void main(String[] args) {
		var sc = new Scanner(System.in);
		System.out.print("Introduce la nota del primer trimestre: ");
		double nota1 = sc.nextDouble();
		System.out.print("Introduce la nota del segundo trimestre: ");
		double nota2 = sc.nextDouble();
		System.out.print("Introduce la nota del tercer trimestre: ");
		double nota3 = sc.nextDouble();

		double notaMedia = (nota1 + nota2 + nota3) / 3;
		double notaRedondeada = Math.round(notaMedia);
		System.out.println("La nota media sin redondear es: " + notaMedia);
		System.out.println("La nota media es: " + notaRedondeada);
		String estado = (notaRedondeada >= 5) ? "APROBADO" : "SUSPENSO";
		System.out.println("El alumno está " + estado);
	}

}
