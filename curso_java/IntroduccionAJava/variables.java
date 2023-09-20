package IntroduccionAJava;

public class Variables {
    public static void main(String args[]) {
        int cantidad = 5 + 2; // guardamos un cantidad un 7
        int precio = 10; // guardamos en precio 10
        precio = 5; // modificamos el precio a 5
        int precioFinal = cantidad * precio; // guardamos un 35 en precioFinal
        precioFinal = precioFinal + 10; // guardamos 45 en precioFinal

        // Declarar varias variables al mismo tiempo
        int a = 5, b = 10; // "a" y "b" son enteros y valen 5 y 10
        short c = -1, d, e = 4; // "c" vale -1, "d" no tiene valor y "e" vale 4
        int f, g; // declaramos las variables "f" y "g" de tipo entero

        // convención nombres
        int a2 = 4; // correcto
        // int 2a = 10 // incorrecto
        // int nombre-2 = 20 // incorrecto

        // variables numéricas
        float f1 = 1f; // "f1" es de tipo float y vale 1.0
        float f2 = 5.4f; // "f2" es de tipo float y vale 4.5
        float f3 = 12E6f; // "f3" es de tipo float y vale 12000000
        float f4 = 0.55E-2f; // "f4" es de tipo float y vale 0.0055
        float f5 = -5.44E-2f; // "f5" es de tipo float y vale -0.0544

        double d1 = 2; // "d1" es de tipo double y vale 2.0
        double d2 = 4.001d; // "d2" es de tipo double y vale 4.001
        double d3 = 1.51E-3; // "d3" es de tipo double y vale 0.00151
        double d4 = 2.11E8d; // "d4" es de tipo double y vale 211000000
        double d5 = -0.11E-3; // "d5" es de tipo double y vale -0.00011

        // Mayor legibilidad
        int mil = 1_000; // almacena 1000
        // int mil = 10_00; // almacena 1000
        int millon = 1_000_000; // almacena 1000000
        // int millon = 1_0_0_0_0_0_0; // almacena 1000000
        // int millon = 1_00_00_00; // almacena 1000000
        float mil_float = 1_00_0.0_1_2f; // macena 1000.012
        float millon_float = 1_00_00_00.0_0_5f; // almacena 1000000.005
        double mil_double = 1_000.00_3; // almacena 1000.003
        // double mil_double = 1_000._00_3; // error
    }

}
