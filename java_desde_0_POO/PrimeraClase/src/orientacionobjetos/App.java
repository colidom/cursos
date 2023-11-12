package orientacionobjetos;

public class App {

	public static void main(String[] args) {
		
		Coche coche = new Coche("Ford", "Focus", 2023);
		coche.arrancar();
		
		Coche coche2 = new Coche("Toyota", "Corrolla");
		coche2.arrancar();
		
		Coche coche3 = new Coche();
		coche3.arrancar();

	}

}
