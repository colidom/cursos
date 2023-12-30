package interfaces;

public class App {

	public static void main(String[] args) {

		Documento d1 = new DocumentoPDF(12345l);
		Documento d2 = new DocumentoPDF(12l);

		Imagen img = new ImagenJPG(2500, 1900);

		Video vid = new VideoMP4(123);

		Validable[] arr = { d1, d2, img, vid };

		ServicioValidacion servicioValidacion = new ServicioValidacion(arr);

		if (servicioValidacion.validarTodos()) {
			System.out.println("Todos los ficheros son válidos");
		} else {
			System.out.println("Hay algún fichero que no es válido");
		}

	}

}
