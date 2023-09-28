package operadores;

public class EjemploOperadoresAritmeticos {

	public static void main(String[] args) {

		System.out.println("OPERADORES ARITMÉTICOS");
		int i1 = 7;
		int i2 = 5;
		int i = i1 + i2;
		System.out.println(i);

		float f1 = 123.45f;
		float f2 = 456.34f;
		float f = f1 - f2;
		System.out.println(f);

		// No es lo mismo división entera que con decimales
		int resultadoDivisionEntera = 3 / 2; // 1
		float resultadoDivisionDecimales = 3.0f / 2.0f;
		System.out.println("Resultado de la división entera -> " + resultadoDivisionEntera);
		System.out.println("Resultado de la división con decimales -> " + resultadoDivisionDecimales);

		int resto = i1 % i2;
		System.out.println(resto);

		System.out.println("OPERADORES ARITMÉTICOS DE ASIGNACIÓN");
		int a = 7;
		// a = a + 1;
		a += 1;
		System.out.println(a);

		int c = 3;
		// c = a * 2;
		c *= 2;
		System.out.println(c);

		System.out.println("OPERADORES ARITMÉTICOS UNARIOS");
		int e = 8;
		int eNegativo = -e;
		System.out.println(eNegativo);

		// PREINCREMENTO
		int inc = 8;
		int preIncremento = ++inc; // 9
		System.out.println(preIncremento);

		// POSTINCREMENTO
		inc = 8;
		int postIncremento = inc++; // 8
		System.out.println(postIncremento);

	}

}
