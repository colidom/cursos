package hotel.personas;

public class Cliente extends Huesped {

	private String tarjetaBancaria;

	public Cliente(String nombre, String dni, int edad, String tarjetaBancaria) {
		super(nombre, dni, edad);
		this.tarjetaBancaria = tarjetaBancaria;
	}

	public String getTarjetaBancaria() {
		return tarjetaBancaria;
	}

	public void setTarjetaBancaria(String tarjetaBancaria) {
		this.tarjetaBancaria = tarjetaBancaria;
	}

}
