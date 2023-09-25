package IntroduccionAJava;

public class OperadoresNivelBits {
    public static void main(String[] args) {
        int a = 3; // 00000011
        int b = 4; // 00000100
        int c = 8; // 00001000
        int d = 15; // 00001111
        int resultado = 0;

        resultado = a & b; // 00000000 -> 0
        resultado = a | b; // 00000111 -> 7
        resultado = a ^ b; // 0001100 -> 12
        resultado = ~a; // 11111100 -> -4
        resultado = a | b | c; // 00001111 -> 15
        resultado = a & b & c; // 00000000 -> 0
        resultado = d >> 1; // 00000111 -> 7
        resultado = d << 1; // 00011110 -> 30
        resultado = d >> 4; // 00000000 -> 0
        resultado = d << 4; // 11110000 -> 240
        byte e = (byte) (d << 4); // 11110000 -> -16
    }
}
