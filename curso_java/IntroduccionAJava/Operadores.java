package IntroduccionAJava;

public class Operadores {
    public static void main(String[] args) {
        int a = 3, b = 2, c = 1;

        a += b; // a = a + b -> 5
        c += a; // c = c + a -> 6
        b += a + b; // b = b + (a + b) -> 9
        c -= a; // c = c - a -> 1
        c *= a / 2; // c = c * (a / 2) -> 2
        b %= 5; // b = b % 5 -> 4
        b /= c; // b = b / c -> 2
        b *= a + b; // b = b * (a + b) -> 14
        a /= b - c * 5; // a = a / (b -c * 5) -> 1
    }
}
