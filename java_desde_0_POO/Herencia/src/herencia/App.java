package herencia;

public class App {

	public static void main(String[] args) {

		Perro p = new Perro(60, 28, "Labrador");
		Gato g = new Gato(45, 6, "Montés");

		System.out.println(p);
		System.out.println(g);

		p.ladrar();
		g.maullar();
		p.saludar(); // Sobrecarga del metodo
		g.saludar();
	}

}
