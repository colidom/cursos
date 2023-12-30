package hotel.economia;

import hotel.habitaciones.Habitacion;

public class HabitacionDoble extends Habitacion {

	public HabitacionDoble(int numero, String descripcion) {
		super(numero, Precios.PRECIO_DOBLE, descripcion);
	}

}
