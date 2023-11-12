package orientacionobjetos;

public class App {

	public static void main(String[] args) {
		
		Coche fordFocus = new Coche("Ford", "Focus", 2023, 0, 0);
		// fordFocus.arrancar();
		
		Coche toyotaCorolla = new Coche("Toyota", "Corrolla");
		toyotaCorolla.arrancar();
		toyotaCorolla.repostar(45);
		toyotaCorolla.arrancar();
		toyotaCorolla.viajar(100);

		System.out.println(toyotaCorolla);


	}

}
