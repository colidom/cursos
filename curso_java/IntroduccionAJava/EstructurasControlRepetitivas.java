package IntroduccionAJava;

import java.util.Scanner;

public class EstructurasControlRepetitivas {
    public static void main(String[] args) {

        int a = 0, b = 1;

        // While
        while (a < 4) {
            b += a;
            a++;
        } // a -> 4, b -> 7

        // Do While
        do {
            b += a;
            a++;
        } while (a < 4); // a -> 4, b -> 7

        // Ejemplo While
        Scanner teclado = new Scanner(System.in);
        int num = 0;
        System.out.println("Introduce un número distinto de cero para seguir en el bucle");
        num = teclado.nextInt();

        while (num != 0) {
            System.out.println("Introduce un número distinto de cero para seguir en el bucle");
            num = teclado.nextInt();
        }

        teclado.close();

        // Ejemplo Do While
        do {
            System.out.println("Introduce un número distinto de cero para seguir en el bucle");
            num = teclado.nextInt();
        } while (num != 0);
    }
}
