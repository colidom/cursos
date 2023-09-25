package IntroduccionAJava;

import static java.lang.Math.*;

public class Math {
    public static void main(String[] args) {
        int n = 2;
        System.out.println(pow(n, 8)); // 256.0

        double radio = 5, area;
        area = PI * radio * radio; // 78.2.650633974483
        area = PI * pow(radio, 2); // 78.2.650633974483
        System.out.println(ceil(area)); // 79.00
        System.out.println(floor(area)); // 78.00
        System.out.println(round(area)); // 79
        System.out.println(sqrt(area * area)); // 78.53981633974483

        System.out.println(sqrt(pow(n, 4))); // 4.0
    }
}
