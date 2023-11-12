package orientacionobjetos;

public class Coche {

	private String marca;
	private String modelo;
	private int anio;

	public Coche(String marca, String modelo, int anio) {
		this.marca = marca;
		this.modelo = modelo;
		this.anio = anio;
	}

	public Coche(String marca, String modelo) {
		this(marca, modelo, 2022);// Seteamos un valor por defecto en el constructor
	}

	public Coche() { // Constructor vacío
	}

	public void arrancar() {
		System.out.println("El coche de marca %s y modelo %s del año %d ha arrancado!".formatted(marca, modelo, anio));
	}

}
