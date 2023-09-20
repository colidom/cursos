package IntroduccionAJava;

public class BoolChar {
    public static void main(String args[]) {
        boolean seguir = true; // correcto
        boolean parar = false; // correcto

        boolean seguirLogic = 3 > 5; // false
        boolean pararLogic = 7 != 6; // true

        char letra = 'A'; // "letra" es de tipo caracter y tiene guardada la letra A
        char simbolo = '*'; // "simbolo" es de tipo caracter y tiene guardado el caracter asterisco *

        letra = (char) (letra + 1); // "letra" tiene guardada la letra B
        letra = (char) (letra + 3); // "letra" tiene guardada la letra E
        letra = 97; // "letra" tiene guardada la letra a
        letra = 100; // "letra" tiene guardada la letra d

        char letra1 = '\u03c0'; // simbolo de PI
        char letra2 = '\u00a9'; // simbolo de copyright (C)
        char letra3 = '\u00A9'; // simbolo de copyright (C)
        char letra4 = '\u03ae'; // simbolo de marca registrada (R)
        char letra5 = '\u2605'; // simbolo de estrella
        char letra6 = '\u2661'; // simbolo de corazón
        char letra7 = '\u221e'; // simbolo de infinito

    }
}
