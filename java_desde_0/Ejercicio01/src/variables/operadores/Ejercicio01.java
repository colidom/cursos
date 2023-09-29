package variables.operadores;

import java.util.Scanner;

public class Ejercicio01 {

	public static void main(String[] args) {
		var sc = new Scanner(System.in);

		System.out.print("Introduce el costo de fabricación del portátil: ");
		double costoFabricacion = sc.nextDouble();
		double margenGanancia = 0.3;
		double impuestos = 0.21;

		/*
		 * double costeConGanancia = costoFabricacion + (costoFabricacion *
		 * margenGanancia);
		 * double impuestosAplicados = costeConGanancia * impuestos;
		 * double precioFinal = costeConGanancia + impuestosAplicados;
		 */
		double precioFinal = costoFabricacion * (1 + margenGanancia) * (1 + impuestos);
		System.out.println("El precio final del portatil es: " + precioFinal);
		String tipoPrecio = (precioFinal <= 600) ? "NORMAL" : "DE LUJO";
		System.out.println("El portatil tiene un precio " + tipoPrecio);

		sc.close();

	}

}
