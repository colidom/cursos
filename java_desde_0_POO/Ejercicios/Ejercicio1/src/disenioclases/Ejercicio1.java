package disenioclases;

public class Ejercicio1 {

	public static void main(String[] args) {

		Muestra m1 = new Muestra(new int[] {1, 2, 2, 3, 4, 5, 6, 7, 8, 9});

		double media = Estadistica.media(m1);
		System.out.println("La media es: " + media);
		
		int moda = Estadistica.moda(m1);
		System.out.println("La moda es: " + moda);
		
	}

}
