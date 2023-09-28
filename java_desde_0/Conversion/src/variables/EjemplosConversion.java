package variables;

public class EjemplosConversion {

	public static void main(String[] args) {
		
		// Conversión sin pérdida de información
		int i = 1234567;
		long l = i;
		System.out.println("Conversión de int -> long");
		System.out.println(i);
		System.out.println(l);
		
		// Conversión pérdida de información
		long l2 = 123_456_789_123_456L;
		System.out.println("Conversión de long -> float");
		System.out.println(l2);
		float f2 = l2;
		System.out.printf("%.2f", f2);
		System.out.println("");
		
		double d2 = l2;
		System.out.println("Conversión de long -> double");
		System.out.println(l2);
		System.out.printf("%.2f", d2);
		System.out.println("");
		
		int big = 1234567890;
		float approx = big;
		System.out.println("Conversión de int -> float");
		System.out.println(big);
		System.out.println(approx);
		System.out.println(big - (int) approx);
	}

}
