package IntroduccionAJava;

public class StringMetodos {
    public static void main(String[] args) {
        String cadena = "Curso JAVA";
        String cadena2 = "         Curso JAVA";
        int longitud = cadena.length();
        char primeraLetra = cadena.charAt(0);
        char ultimaLetra = cadena.charAt(cadena.length() - 1);
        String cadenaMayuscula = cadena.toUpperCase();
        String cadenaMinuscula = cadena.toLowerCase();
        String palabraSubstring = cadena.substring(0, 3);

        // length()
        System.out.println(cadena + " tiene " + longitud + " caracteres.");
        // charAt()
        System.out.println("La primera letra es: " + primeraLetra);
        System.out.println("La última letra es: " + ultimaLetra);
        // toUpperCase() toLowerCase()
        System.out.println(cadena + " en mayúsculas " + cadenaMayuscula);
        System.out.println(cadena + " en minúsculas " + cadenaMinuscula);
        System.out.println(palabraSubstring);
        System.out.println(cadena2.trim());

    }
}
