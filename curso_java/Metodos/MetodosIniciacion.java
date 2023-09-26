package Metodos;

public class MetodosIniciacion {
    public static void main(String[] args) {

        saludar("Carlos");
        System.out.println("El cubo de 5 es: " + cubo(5));
        System.out.println("5 multiplicado por 5 es: " + mult(5, 5));
        tablaMult(7);
    }

    static void saludar(String nombre) {
        System.out.println("Hola, " + nombre + " que tal estás?");
    }

    static int cubo(int n) {
        return n * n * n;
    }

    static int mult(int n1, int n2) {
        return n1 * n2;
    }

    static void tablaMult(int n) {
        System.out.println("Tabla de multiplicar del " + n);
        for (int i = 1; i < 10; i++) {
            System.out.println(i + " X " + n + " = " + mult(i, n));
        }
    }
}
