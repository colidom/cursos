package IntroduccionAJava;

public class StringMetodos {
    public static void main(String[] args) {
        String cadena = "Curso JAVA";
        int longitud = cadena.length();
        char primeraLetra = cadena.charAt(0);
        char ultimaLetra = cadena.charAt(cadena.length() - 1);
        String cadenaMayuscula = cadena.toUpperCase();
        String cadenaMinuscula = cadena.toLowerCase();

        // length()
        System.out.println(cadena + " tiene " + longitud + " caracteres.");
        // charAt()
        System.out.println("La primera letra es: " + primeraLetra);
        System.out.println("La última letra es: " + ultimaLetra);
        // toUpperCase() toLowerCase()
        System.out.println(cadena + " en mayúsculas " + cadenaMayuscula);
        System.out.println(cadena + " en minúsculas " + cadenaMinuscula);

    }
}
