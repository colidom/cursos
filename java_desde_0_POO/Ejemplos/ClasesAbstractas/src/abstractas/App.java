package abstractas;

public class App {

	public static void main(String[] args) {

		// Genera error porque la clase es abstracta
		// Vehiculo v = new Vehiculo("Marca", "Modelo");

		Coche c = new Coche("Hyundai", "Coupe", 180);
		c.mostrarInformacion();
		c.mostrarVelocidadMaxima();
		c.conducir();

		VehiculoAereo h = new Helicoptero("Boeing", "CH-47 Chinook", 7315);
		h.mostrarInformacion();
		h.despegar();
		h.conducir();
		h.aterrizar();
	}

}
