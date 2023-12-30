package interfaces;

public class Cuadrado implements Dibujable {

	private int lado;

	public Cuadrado(int lado) {
		super();
		this.lado = lado;
	}

	@Override
	public void dibujar() {
		for (int i = 0; i < lado; i++) {
			System.out.println("*".repeat(lado));
		}
		System.out.println();
	}

	public int getLado() {
		return lado;
	}

	public void setLado(int lado) {
		this.lado = lado;
	}

}
