package IntroduccionAJava;

public class AsignacionesComplejas {
    public static void main(String[] args) {
        int a = 1, b = 2, c = 3;

        b = ++c; // -> 4
        a += b++; // -> 5
        a = a++ + a; // -> 11
        a -= b--; // -> 6
        c = a++ - ++b; // -> 1
        c -= ++a; // -> -7
        a -= ++c; // -> 14
        a -= c++; // -> 20
        a -= --c; // -> 26
        System.out.println(a);
    }
}
