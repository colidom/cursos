package IntroduccionAJava;

public class Strings {
    public static void main(String args[]) {
        String nada = ""; // Cadena vacía
        String frase;
        int edad = 20;
        String nombre = "Pepe";
        String apellido = "Martínez";
        String nombreCompleto1 = nombre + apellido; // PepeMartínez
        String nombreCOmpleto2 = nombre + " " + apellido; // Pepe Martínez

        // Combinando string con variables numéricas
        frase = nombre + " tiene " + edad + " años"; // Pepe tiene 20 años
        frase = nombre + " tiene " + edad + 5 + " años"; // Pepe tiene 205 años
        frase = nombre + " tiene " + (edad + 5) + " años"; // Pepe tiene 25 años
        frase = nombre + " tiene " + 15 + 5 + " años"; // Pepe tiene 155 años
        frase = nombre + " tiene " + (15 + 5) + " años"; // Pepe tiene 20 años
        frase = nombre + " tiene " + (15 - 5) + " años"; // Pepe tiene 10 años
        // frase = nombre + " tiene " + 15 - 5 + " años"; // ERROR
        frase = 15 + 5 + nombre; // 20Pepe
        frase = 15 - 5 + nombre; // -10Pepe
        frase = 15 - 5 + nombre + 5 + 10 + (5 + 5); // -5Pepe51010

        int cantidad = 10;
        int precio = 50;
        float num = 2.5f;
        float num2 = 10f;
        String s1 = "El total es " + (cantidad + precio); // El total es 60
        String s2 = "El total es " + cantidad * precio; // El total es 500
        String s3 = "El total es " + cantidad + precio; // El total es 1050
        // String s4 = cantidad + precio; // ERROR
        // String s5 = cantidad * precio; // ERROR
        // String s6 = (cantidad + precio); // ERROR
        String s7 = "" + cantidad + precio; // 1050
        String s8 = "" + (cantidad + precio); // 60
        String s9 = "El total es " + (cantidad + precio); // El total es 12.5
        String s10 = "El total es " + (cantidad / 3); // El total es 3
        String s11 = "El total es " + (num2 / 3); // El total es 3.3333333
        String s12 = "El total es " + (cantidad / 3f); // El total es 3.3333333
        String s13 = "El total es " + (num2 / 3d); // El total es 3.3333333333333335

    }
}
