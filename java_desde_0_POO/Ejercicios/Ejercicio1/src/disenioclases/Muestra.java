package disenioclases;

public class Muestra {

	public static final int DEFAULT_SIZE = 10;
	
	private int[] numeros;
	private int cantidadNumeros;
	
	public Muestra() {
		numeros = new int[DEFAULT_SIZE];
		cantidadNumeros = 0;
	}
	
	public Muestra(int tam) {
		numeros = new int[tam];
		cantidadNumeros = 0;
	}
	
	public Muestra(int[] array) {
		numeros = array.clone();
		cantidadNumeros = numeros.length;
	}
	
	public void agregarNumero(int n) {
		numeros[cantidadNumeros] = n;
		cantidadNumeros++;
	}

	public static int getDefaultSize() {
		return DEFAULT_SIZE;
	}

	public int[] getNumeros() {
		return numeros;
	}

	public int getCantidadNumeros() {
		return cantidadNumeros;
	}
}
