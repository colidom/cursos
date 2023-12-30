package interfaces;

public class App {

	public static void main(String[] args) {

		String fecha1 = FechaUtil.formateaFecha(32, 24, -36);
		String fecha2 = FechaUtil.formateaFecha(06, 10, 1990);
		
		System.out.println(fecha1);
		System.out.println(fecha2);

	}

}
