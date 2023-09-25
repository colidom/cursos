package IntroduccionAJava;

public class Escapes {
    public static void main(String[] args) {
        char letra = '\u2605';
        String texto = "\n\n\t" + letra + " Esto es un string \n\t" + letra + " Esto sigue siendo un string\n\n";
        System.out.println(texto);
    }
}
