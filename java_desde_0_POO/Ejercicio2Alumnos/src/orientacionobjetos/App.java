package orientacionobjetos;

public class App {

	public static void main(String[] args) {

		var alumnos = new Alumno[5];

		alumnos[0] = new Alumno("Jos�", "Garc�a L�pez", 14);
		alumnos[1] = new Alumno("Mar�a", "Fern�ndez Mart�n", 17);
		alumnos[2] = new Alumno("Ra�l", "Miraflores Redondo", 11);
		alumnos[3] = new Alumno("Luc�a", "Mu�oz Seco", 16);
		alumnos[4] = new Alumno("Antonio", "De la Cruz Ser�n", 19);

		int posicionMasJoven = 0;

		for (int i = 1; i < alumnos.length; i++) {
			if (alumnos[posicionMasJoven].getAge() > alumnos[i].getAge())
				posicionMasJoven = i;
		}

		Alumno joven = alumnos[posicionMasJoven];
		System.out.println("El alumno m�s joven es %s %s con %d a�os."
				.formatted(joven.getName(), joven.getSurname(), joven.getAge()));
	}

}
