package simple;

public class PersonajeDeAccion implements PuedeLuchar, PuedeVolar {

	@Override
	public void saltar() {
		System.out.println("Estamos saltando...");
	}

	@Override
	public void volar() {
		System.out.println("Estamos Volando...");
	}

	@Override
	public void luchar() {
		System.out.println("Estamos Luchando...");
	}

}
