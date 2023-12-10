package disenioclases;

import java.util.Arrays;
import java.util.Objects;

public class Rectangulo {

	private final int COORD_X = 0;
	private final int COORD_Y = 1;
	
	private double[] c1, c2, c3, c4;
	
	public Rectangulo() {
		c1 = new double[2];
		c2 = new double[2];
		c3 = new double[2];
		c4 = new double[2];
	}
	
	public Rectangulo(double[] c1, double[] c2,double[] c3,double[] c4) {
		this.c1 = c1;
		this.c2 = c2;
		this.c3 = c3;
		this.c4 = c4;		
	}
	
	public Rectangulo(int base, int altura) {
		this.c1 = new double[] {0, 0};
		this.c2 = new double[] {base, 0};
		this.c3 = new double[] {base, altura};
		this.c4 = new double[] {0, altura};
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + Arrays.hashCode(c1);
		result = prime * result + Arrays.hashCode(c2);
		result = prime * result + Arrays.hashCode(c3);
		result = prime * result + Arrays.hashCode(c4);
		result = prime * result + Objects.hash(COORD_X, COORD_Y);
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Rectangulo other = (Rectangulo) obj;
		return COORD_X == other.COORD_X && COORD_Y == other.COORD_Y && Arrays.equals(c1, other.c1)
				&& Arrays.equals(c2, other.c2) && Arrays.equals(c3, other.c3) && Arrays.equals(c4, other.c4);
	}

	@Override
	public String toString() {
		return "Rectangulo [c1=" + Arrays.toString(c1) + ", c2=" + Arrays.toString(c2) + ", c3=" + Arrays.toString(c3)
				+ ", c4=" + Arrays.toString(c4) + "]";
	}
	
	
	public double base() {
		return Math.abs(c3[COORD_X] - c4[COORD_X]);
	}
	
	public double altura() {
		return Math.abs(c3[COORD_Y] - c2[COORD_Y]);
	}
	
	public void dibujar(char c) {
		int base = (int) Math.round(base());
		int altura = (int) Math.round(altura());
		
		String pintura = "" + c;
		
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
	
	public void dibujarVarios(Rectangulo...rectangulos) {
		for (var r : rectangulos) {
			System.out.println(r);
			r.dibujar('x');
			System.out.println();
		}
	}
}
