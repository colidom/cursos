package herencia;

public class App {

	public static void main(String[] args) {

		Local l1 = new Local(1, "Calle Las Damas", 198000, 250, true, 0.07);
		
		Casa c1 = new Casa();
		c1.setIdentificadorInmobiliario(2);
		c1.setDireccion("Calle Rosario nº 1");
		c1.setPrecioBase(156000);
		c1.setMetrosCuadrados(92);
		c1.setNumBanios(1);
		c1.addHabitacion(new Habitacion("Dormitorio", 13, 1));
		c1.addHabitacion(new Habitacion("Dormitorio", 16, 1));
		c1.addHabitacion(new Habitacion("Salon", 18, 2));
		c1.setNumPisos(1);
		
		Apartamento a1 = new Apartamento();
		a1.setIdentificadorInmobiliario(2);
		a1.setDireccion("Calle Rosario nº 2");
		a1.setPrecioBase(156000);
		a1.setMetrosCuadrados(92);
		a1.setNumBanios(1);
		a1.addHabitacion(new Habitacion("Dormitorio", 13, 1));
		a1.addHabitacion(new Habitacion("Salon", 18, 2));
		
		imprimirInformacion(l1);
		imprimirInformacion(c1);
		imprimirInformacion(a1);
		
	}
	
	public static void imprimirInformacion(Inmueble i) {
		if (i instanceof Local l) {
			System.out.println("LOCAL COMERCIAL");
			imprimirInformacionComun(i);
			System.out.println("EL LOCAL %s TIENE SALIDA DE HUMOS"
					.formatted(l.isTieneSalidaHumos() ? "SI" : "NO"));
		} else if ( i instanceof Casa c) {
			System.out.println("CASA");
			imprimirInformacionComun(i);
			System.out.println("Nº HABITACIONES: " + c.getNumHabitaciones());
			System.out.println("Nº PLANTAS: " + c.getNumPisos());
		} else if ( i instanceof Apartamento a) {
			System.out.println("APARTAMENTO");
			imprimirInformacionComun(i);
			System.out.println("Nº HABITACIONES: " + a.getNumHabitaciones());
		}
		
		System.out.println();
	}
	
	public static void imprimirInformacionComun(Inmueble i) {
		System.out.println("DIRECCION: " + i.getDireccion());
		System.out.println("TAMAÑO: %.2f m2".formatted(i.getMetrosCuadrados()));
		System.out.println("PRECIO FINAL: %2f".formatted(i.precioVentaFinal()));
	}

}
