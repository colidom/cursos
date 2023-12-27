package patternmatching;

public abstract class VehiculoAereo extends Vehiculo {

	private int alturaMaxima;

	public VehiculoAereo(String marca, String modelo, int alturaMaxima) {
		super(marca, modelo);
		this.alturaMaxima = alturaMaxima;
	}

	@Override
	public void desplazarse() {
		System.out.println("Un veh�culo que se desplaza por el aire");
	}

	public void mostrarInformacion() {
		super.mostrarInformacion();
		System.out.println("Altitud m�xima: " + this.alturaMaxima);
	}

	public abstract void despegar();

	public abstract void aterrizar();

}
