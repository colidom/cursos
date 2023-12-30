package interfaces;

public class ReproductorMp3 implements Reproducible, Cargable {

	@Override
	public void reproducir() {
		System.out.println("Reproduciendo...");
	}

	@Override
	public void pausar() {
		System.out.println("Pausando...");

	}

	@Override
	public void detener() {
		System.out.println("Deteniendo...");
	}

	@Override
	public void cargar() {
		System.out.println("Cargando...");
	}

}
