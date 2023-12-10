package disenioclase;

public class Producto {

	private static int numeroProducto = 0;

	private String nombre;
	static double precio;

	public Producto(String nombre, double precio) {
		this.nombre = nombre;
		this.precio = precio;
		numeroProducto++;
	}
	
	public static int getNumeroProductos() {
		return numeroProducto;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public static double getPrecio() {
		return precio;
	}

	public static void setPrecio(double precio) {
		Producto.precio = precio;
	}
}
