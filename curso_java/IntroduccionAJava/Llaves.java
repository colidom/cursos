package IntroduccionAJava;

public class Llaves {
    public static void main(String[] args) {
        int a = 1, b = 2, c = 3;
        {
            a++;
            b += c;

            int d = a;
        }

        // d = 1; Error, out of scope
    }
}
