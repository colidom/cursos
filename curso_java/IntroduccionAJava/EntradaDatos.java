package IntroduccionAJava;

import java.util.Scanner;

public class EntradaDatos {
    public static void main(String[] args) {

        String nombre;
        System.out.println("Introduzca su nombre (una palabra): ");
        System.out.println();
        try (Scanner entrada = new Scanner(System.in)) {
            nombre = entrada.next(); // Leemos hasta llegar a un espacio en blanco
        }
        System.out.println("Hola, " + nombre);
    }
}
