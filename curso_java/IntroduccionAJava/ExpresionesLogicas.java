package IntroduccionAJava;

public class ExpresionesLogicas {
    public static void main(String[] args) {
        int precio1 = 10;
        int precio2 = 30;

        boolean barato = precio1 > precio2; // false
        boolean iguales1 = 40 == (precio1 + precio2); // true
        boolean iguales2 = 40 == precio1 + precio2; // true
        // boolean iguales2 = (40 == precio1) + precio2; // ERROR
        boolean distintos = precio1 != precio2; // true

        System.out.println(barato);
        System.out.println(iguales1);
        System.out.println(iguales2);
        System.out.println(distintos);

        String nombre1 = "Pepe";
        String nombre2 = "Jose";
        String nombre3 = "pepe";

        boolean iguales3 = nombre1.equals(nombre2); // false
        boolean iguales4 = nombre1.equals(nombre3); // false
        boolean iguales5 = nombre1.equalsIgnoreCase(nombre3); // true

    }
}
