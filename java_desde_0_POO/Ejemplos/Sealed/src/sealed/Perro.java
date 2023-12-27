package sealed;

public sealed class Perro extends Animal 
	permits PastorAleman, Bulldog, Boxer {

	public Perro(int estatura, double peso, String raza) {
		super(estatura, peso, raza);
	}
	
	public void ladrar() {
		System.out.println("Guau guay guau...");
	}
	
	public void saludar() {
		System.out.println("Hola soy un perro de raza %s y peso %.2f kilos" .formatted(this.raza, this.peso));
	}
}
