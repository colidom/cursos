package operadores;

public class EjemploOperadoresBits {

	public static void main(String[] args) {

		int x1 = 10; // 00001010
		int y1 = x1 << 2; // 00101000

		System.out.println(x1 + " - " + Integer.toBinaryString(x1));
		System.out.println();
		System.out.println(y1 + " - " + Integer.toBinaryString(y1));

		int x2 = 10; // 00001010
		int y2 = 20; // 00010100
		int res2 = x2 | y2;

		System.out.println(x2 + " - " + Integer.toBinaryString(x2));
		System.out.println();
		System.out.println(y2 + " - " + Integer.toBinaryString(y2));
		System.out.println(res2 + " - " + Integer.toBinaryString(res2));
	}

}
