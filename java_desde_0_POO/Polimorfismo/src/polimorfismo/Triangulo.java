package polimorfismo;

public class Triangulo extends Poligono {

	private int lado;

	public Triangulo() {}

	public int getLado() {
		return lado;
	}

	public void setLado(int lado) {
		this.lado = lado;
	}

	public Triangulo(int lado) {
		this.lado = lado;
	}

	@Override
	public void pintar() {
		// Iterar sobre las filas del tri�ngulo
		for (int i = 0; i < this.lado; i++) {
			// Imprimir espacios en blanco antes de los asteriscos
			System.out.print(" ".repeat(this.lado - i));
			
			// Imprimir los asteriscos para formar el tri�ngulo
			System.out.print("* ".repeat(i));
			
			// Ir a la siguiente l�nea despu�s de cada fila
			System.out.println();
		}
		System.out.println();
	}
	
	
}
