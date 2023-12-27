package patternmatching;

public class Avion extends VehiculoAereo {

	public Avion(String marca, String modelo, int alturaMaxima) {
		super(marca, modelo, alturaMaxima);
		// TODO Auto-generated constructor stub
	}

	@Override
	public void despegar() {
		System.out.println("Despegando de forma lineal");
	}

	@Override
	public void aterrizar() {
		System.out.println("Aterrizando de forma lineal");
	}

	public void transportarPasajeros() {
		System.out.println("Estoy transportando pasajeros para llevarlos de viaje");
	}

}
