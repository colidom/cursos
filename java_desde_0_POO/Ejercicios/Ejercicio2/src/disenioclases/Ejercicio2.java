package disenioclases;

public class Ejercicio2 {

	public static void main(String[] args) {

		Muestra m1 = new Muestra(new int[] {1, 2, 2, 3, 4, 5, 6, 7, 8, 9});
		m1.agregarNumero(123);
		double media = Estadistica.media(m1);
		System.out.println("La media es: " + media);
		
		int moda = Estadistica.moda(m1);
		System.out.println("La moda es: " + moda);
		
		var array = new int[] {1, 22, 333, 4444, 55555};
		double mediaArray = Estadistica.media(array);
		System.out.println("La media del array es: " + mediaArray);
	}

}
