package orientacionobjetos;

public class App {

	public static void main(String[] args) {

		// Alumno 1
		Alumno alumna = new Alumno();
		alumna.setName("Laura");
		alumna.setSurname("Rodríguez");
		alumna.setAge(23);
		alumna.setEmail("laura@alumno.es");
		alumna.setPhoneNumber("666666666");

		System.out.println("Objeto antes de modificar nombre: " + alumna);
		// Cambiamos el nombre de atributo private mediante método setter
		alumna.setName("Elizabeth");
		alumna.phoneNumber = "777777777"; // atributo público
		System.out.println("Objeto después de modificar nombre: " + alumna);

		// Alumno 2 creado pasando datos directamente al constructor
		Alumno alumno = new Alumno("Carlos", "Oliva", "colidom@outlook.com", 33, "666666666");
		System.out.println(alumno);
		System.out.println("El alumno %s %s es %s"
			.formatted(alumno.getName(), alumno.getSurname(), alumno.esMayorEdad()));
		
		if (alumna.equals(alumno)) {
			System.out.println("Son el mismo objeto");
		} else {
			System.out.println("Son objetos distintos");
		}

	}

}
