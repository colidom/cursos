package Metodos;

public class Calculadora {

    public static void main(String[] args) {

        int num1 = 2, num2 = 4;
        int suma = suma(num1, num2);
        int cuadrado = areaCuadrado(num2);
        System.out.println(suma);
        System.out.println(cuadrado);
    }

    static int suma(int a, int b) {
        return a + b;
    }

    static int areaCuadrado(int lado) {
        return lado * lado;
    }
}
