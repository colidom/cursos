package IntroduccionAJava;

import static java.lang.Math.*;

public class Condicionales {
    public static void main(String[] args) {
        int a = (int) (random() * 10 + 1); // número aleatorio entre 1 y 10

        // Uso de llaves
        /*
         * if (a == 1) {
         * System.out.println("El valor es 1");
         * } else {
         * if (a == 2) {
         * System.out.println("El valor es 2");
         * } else {
         * if (a == 3) {
         * System.out.println("El valor es 3");
         * } else {
         * System.out.println("El valor es " + a);
         * }
         * }
         * }
         * 
         * // Simplificado
         * if (a == 1)
         * System.out.println("El valor es 1");
         * else if (a == 2)
         * System.out.println("El valor es 2");
         * else if (a == 3)
         * System.out.println("El valor es 3");
         * else
         * System.out.println("El valor es " + a);
         */

        int x = 1, y = 2;
        boolean condition = x == 2 && y == 1;

        if (condition) {
            System.out.println("x=1, y=2");
        }
    }
}
