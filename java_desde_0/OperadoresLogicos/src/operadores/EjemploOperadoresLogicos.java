package operadores;

public class EjemploOperadoresLogicos {

	public static void main(String[] args) {
		// OPERADORES DE COMPARACIÓN
		int a1 = 7;
		int b1 = 6;

		boolean r1 = a1 > b1;
		System.out.print("a1 <= b1 ");
		System.out.println(r1);

		int a4 = 3;
		int b4 = 3;
		boolean r4 = a4 <= b4;
		System.out.print("a4 <= b4 ");
		System.out.println(r4);

		boolean r5 = a4 == b4;
		System.out.print("a4 == b4 ");
		System.out.println(r5);

		boolean r6 = a4 != b4;
		System.out.print("a4 != b4 ");
		System.out.println(r6);

		// OPERADORES LÓGICOS
		int x1 = 5;

		boolean c1 = x1 > 0;
		boolean c2 = x1 < 10;
		boolean c = c1 && c2;
		System.out.println(c);

		c = x1 > 0 && x1 < 10;
		System.out.println(c);

		int x2 = 5;
		c1 = x2 <= 5;
		c2 = x2 > 100;
		c = c1 || c2;
		System.out.println(c);

		c = x2 <= 5 || x2 > 100;
		System.out.println(c);
	}

}
