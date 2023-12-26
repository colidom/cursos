package polimorfismo;

public class Rectangulo extends Poligono {

	Punto p1, p2, p3, p4;

	public Rectangulo(Punto p1, Punto p2, Punto p3, Punto p4) {
		super();
		this.p1 = p1;
		this.p2 = p2;
		this.p3 = p3;
		this.p4 = p4;
	}

	public Rectangulo(double base, double altura) {
		this.p1 = new Punto(0, 0);
		this.p2 = new Punto(base, 0);
		this.p3 = new Punto(base, altura);
		this.p4 = new Punto(0, altura);
	}
	
	public double base() {
		return p3.getX() - p4.getX();
	}
	
	public double altura() {
		return p3.getY() - p2.getY();
	}

	@Override
	public void pintar() {
		int base = (int) Math.round(this.base());
		int altura = (int) Math.round(this.altura());
		
		String pintura = "*";
		System.out.println(pintura.repeat(base));
	
		if (altura > 2) {
			for (int i = 0; i < altura - 2; i++) { 
				System.out.print(pintura);
				if (base > 2) {
					System.out.print(" ".repeat(base - 2));
				}
				System.out.println(pintura);
			}
		}
		System.out.println(pintura.repeat(base));
	}
}
