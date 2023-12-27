package sealed;

public class Animal {
	
	protected int estatura;
	protected double peso;
	protected String raza;

	public Animal(int estatura, double peso, String raza) {
		super();
		this.estatura = estatura;
		this.peso = peso;
		this.raza = raza;
	}

	public int getEstatura() {
		return estatura;
	}

	public void setEstatura(int estatura) {
		this.estatura = estatura;
	}

	public double getPeso() {
		return peso;
	}

	public void setPeso(double peso) {
		this.peso = peso;
	}

	public String getRaza() {
		return raza;
	}

	public void setRaza(String raza) {
		this.raza = raza;
	}

	@Override
	public String toString() {
		return "Animal [estatura=" + estatura + ", peso=" + peso + ", raza=" + raza + "]";
	}

	public void saludar() {
		System.out.println("Hola soy un animal de raza %s y peso %.2f kilos" .formatted(this.raza, this.peso));
	}
	
}
