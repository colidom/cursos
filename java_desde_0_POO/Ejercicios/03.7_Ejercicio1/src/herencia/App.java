package herencia;

public class App {

	public static void main(String[] args) {

		Local l1 = new Local(1, "Calle Las Damas", 198000, 250, true);
		System.out.println(l1);
		
		Casa c1 = new Casa();
		c1.setIdentificadorInmobiliario(2);
		c1.setDireccion("Calle Rosario n� 1");
		c1.setPrecioVenta(156000);
		c1.setMetrosCuadrados(92);
		c1.setNumBanios(1);
		c1.addHabitacion(new Habitacion("Dormitorio", 13, 1));
		c1.addHabitacion(new Habitacion("Dormitorio", 16, 1));
		c1.addHabitacion(new Habitacion("Salon", 18, 2));
		c1.setNumPisos(1);
		
		System.out.println(c1);
		
	}

}
