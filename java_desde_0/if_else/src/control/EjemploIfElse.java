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
	}

}
