package control;

public class EjemploIfElse {

	public static void main(String[] args) {
		int nota = 10;

		if (nota > 5) {
			System.out.println("Aprobado");
		} else {
			System.out.println("Suspendido");
		}

		// Bloque else no obligatorio
		float precio = 12.34f;
		float iva = 0.21f;

		if (iva > 0) {
			precio += precio * iva;
		}

		System.out.println("El precio del producto es " + precio);

		// Las condiciones pueden ser más complejas
		int edad = 27;
		final int EDAD_MINIMA_TRABAJO = 16;
		final int EDAD_JUBILACION = 67;

		if (edad >= EDAD_MINIMA_TRABAJO && edad <= EDAD_JUBILACION) {
			System.out.println("Puede trabajar!");
		} else {
			System.out.println("No puede trabajar!");
		}

		// Sin llaves
		if (nota >= 9)
			System.out.println("Enhorabuena, tienes un sobresaliente!");

		// Estructura if-else-if
		int num = 7;

		if (num < 0) {
			System.out.println("El número es negativo");
		} else if (num == 0) {
			System.out.println("El número es 0");
		} else if (num > 0 && num < 10) {
			System.out.println("El número es positivo");
		} else {
			System.out.println("El número es mayor o igual a 10");

		}
	}

}
