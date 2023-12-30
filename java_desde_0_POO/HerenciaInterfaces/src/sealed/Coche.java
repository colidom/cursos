package sealed;

public abstract sealed class Coche implements Motor permits CocheDiesel, CocheGasolina {

	@Override
	public void arrancar() {
		System.out.println("El coche ha arrancado");
	}

	@Override
	public void apagar() {
		System.out.println("El coche se ha parado");

	}

}
