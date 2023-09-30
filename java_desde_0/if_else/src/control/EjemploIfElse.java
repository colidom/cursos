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
	}

}
