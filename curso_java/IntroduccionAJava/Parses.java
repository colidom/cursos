package IntroduccionAJava;

import static java.lang.Math.*;

public class Parses {
    public static void main(String[] args) {
        char num = '2';
        int a = num, b = 3;
        a = Character.getNumericValue(num);

        int c = (int) pow(a, b);
        System.out.println(c);
    }
}
