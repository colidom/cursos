package IntroduccionAJava;

public class BreakContinue {
    public static void main(String[] args) {

        // Instrucción Break
        System.out.println("Empezamos...");
        for (int i = 1; i <= 10; i++) {
            System.out.println("Vuelta: " + i);
            if (i == 8)
                break;
            System.out.println("Termina la vuelta: " + i);
        }
        System.out.println("Terminado");

        // Instrucción Continue
        System.out.println("Empezamos...");
        for (int i = 1; i <= 10; i++) {
            System.out.println("Vuelta: " + i);
            if (i == 8)
                continue;
            System.out.println("Termina la vuelta: " + i);
        }
        System.out.println("Terminado");
    }
}
