package IntroduccionAJava;

public class Switch {
    public static void main(String[] args) {

        int x = 3;
        switch (x) {
            case 1:
            case 2:
            case 3:
                System.out.println("El valor de x está entre 1 y 3");
                break;
            case 4:
                System.out.println("El valor de x es 4");
                System.out.println("Instrucción adicional");
                break;
            case 5:
            case 6:
                System.out.println("El valor de x es 5 o 6");
            default:
                System.out.println("El valor de x no está entre 1 y 6");
                break;
        }
    }
}
