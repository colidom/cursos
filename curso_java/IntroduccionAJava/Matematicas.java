package IntroduccionAJava;

import static java.lang.Math.*;

public class Matematicas {
    public static void main(String[] args) {

        int radio = (int) (random() * 10 + 1); // número aleatorio entre 1 y 10
        int n = 5, m = 5;
        double resultado = pow(n, m);
        double raiz = sqrt(resultado);
        double area = PI * radio * radio;

        System.out.println(n + " elevado a " + m + " es igual a: " + (int) resultado);
        System.out.println("La raíz cuadrada de: " + (int) resultado + " es: " + raiz);
        System.out.println("El área de un círculo de radio " + radio + " es: " + area);
        System.out.println("El área redondeada es: " + round((area)));
        System.out.println("El área por arriba es: " + ceil((area)));
        System.out.println("El área por abajo es: " + floor((area)));
        System.out.println("La raíz cuadrada de -2 es un NAN: " + Double.isNaN(sqrt(-2)));
        System.out.println("1.0/0.0 = Infinity: " + (Double.isInfinite(1.0 / 0.0)) + "\n");
    }
}
