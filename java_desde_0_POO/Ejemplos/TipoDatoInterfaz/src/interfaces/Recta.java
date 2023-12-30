package interfaces;

public class Recta implements Dibujable {

	private int longitud;

	public Recta(int longitud) {
		super();
		this.longitud = longitud;
	}

	@Override
	public void dibujar() {
		System.out.println("*".repeat(longitud));
		System.out.println();
	}

}
