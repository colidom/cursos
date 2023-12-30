package interfaces;

public class App {

	public static void main(String[] args) {
		Producto producto1 = new Producto("Tornillo", "Fontaner�a", 0.5);
		Producto producto2 = new Producto("Martillo", "Herramienta", 10.0);
		Servicio servicio1 = new Servicio("Pintura de paredes", "PINTURA", 120);
		Servicio servicio2 = new Servicio("Reparaci�n el�ctrica", "ELECTRICIDAD", 60);

		Vendible[] elementos = { producto1, producto2, servicio1, servicio2 };

		Factura factura = new Factura("Cliente ejemplo", elementos);

		double total = factura.calcularTotal();
		System.out.println("Total de la factura: " + total + "�");

	}

}
