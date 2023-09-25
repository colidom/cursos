package IntroduccionAJava;

public class OperadoresLogicos {
    public static void main(String[] args) {
        int a = 1, b = 2;

        boolean condition1 = true;
        boolean condition2 = false;
        boolean resultado;

        resultado = condition1 && condition2; // false
        resultado = condition1 || condition2; // true
        resultado = condition1 && a < b; // true
        resultado = condition2 && a < b; // false
        resultado = condition1 && !condition2; // true
        resultado = !(condition1 && !condition2); // false
        resultado = !(condition1 && condition2); // true
        resultado = condition1 ^ condition2; // true
        resultado = condition1 ^ a != b; // false
        resultado = !condition1 ^ !(a != b); // false
        resultado = !(condition1 ^ a != b); // true
    }

}
