package patternmatching;

public class App {

	public static void main(String[] args) {

		VehiculoAereo h = new Helicoptero("Boeing", "CH-47 Chinook", 7315);
		VehiculoAereo a = new Avion("Boeing", "787 Dreamliner", 12496);

		// llevarGente(h);
		// llevarGente(a);
		llevarGentePatternMatching(h);
		llevarGentePatternMatching(a);
	}

	public static void llevarGente(VehiculoAereo v) {
		v.mostrarInformacion();

		if (v instanceof Helicoptero) {
			Helicoptero h = (Helicoptero) v;
			h.realizarRescate();
			// ((Helicoptero) v).realizarRescate(); Otra forma de hacerlo más corta
		} else if (v instanceof Avion) {
			Avion a = (Avion) v;
			a.transportarPasajeros();
			// ((Avion) v).transportarPasajeros(); Otra forma de hacerlo más corta
		}
		System.out.println();
	}

	public static void llevarGentePatternMatching(VehiculoAereo v) {
		v.mostrarInformacion();

		if (v instanceof Helicoptero h) { // Evita tener que hacer el casteo
			h.realizarRescate();
		} else if (v instanceof Avion a) { // Evita tener que hacer el casteo
			a.transportarPasajeros();
		}
		System.out.println();
	}

}
