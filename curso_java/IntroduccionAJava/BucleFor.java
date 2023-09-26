package IntroduccionAJava;

public class BucleFor {
    public static void main(String[] args) {

        // Forma While
        int j1 = 10;
        while (j1 > 0) {
            System.out.println(j1);
            j1 -= 2;
        }

        // Forma For
        for (int j2 = 10; j2 > 0; j2 -= 2)
            System.out.println(j2);

        for (int j3 = 1, i = 1; j3 < 5; j3++) {
            System.out.print(j3 + i); // 2345

        }

        System.out.println();

        for (int j3 = 1; j3 < 10; j3++, j3 += 2) {
            System.out.print(j3); // 147
        }

        System.out.println();

        for (int j3 = 1, i = 5; j3 < i; j3 += 2, i++) {
            System.out.print(j3); // 1357
        }
    }
}
