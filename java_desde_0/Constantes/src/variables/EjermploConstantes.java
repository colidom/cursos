package variables;

public class EjermploConstantes {

	public static void main(String[] args) {

		final float PI = 3.141593f;
		// PI = 3; // error: The final local variable PI cannot be assigned. It must be blank and not using a compound assignment
		
		final int UNIDAD = 1;
		//UNIDAD = 2; // error: The final local variable UNIDAD cannot be assigned. It must be blank and not using a compound assignment
		
		final String EL_MENSAJE = "Hola Mundo";
		// EL_MENSAJE = "Hasta Luego"; //error
	}

}
