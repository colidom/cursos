package IntroduccionAJava;

public class BuclesAnidados {
    public static void main(String[] args) {
        int a = 4, b = 3;

        for (int j = 0; j < a; j++) {
            for (int i = 0; i < b; i++) {
                System.out.print(i);
            }
        } // 012012012012

        System.out.println();

        int a1 = 3, b1 = 2;

        for (int j = 1; j <= a1; j++) {
            for (int i = 1; i <= b1; i++) {
                System.out.print(j);
            }
        } // 112233
    }
}
