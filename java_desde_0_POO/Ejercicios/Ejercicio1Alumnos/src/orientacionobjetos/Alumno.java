package orientacionobjetos;

import java.util.Objects;

public class Alumno {

	private String name;
	public String surname;
	public String email;
	public int age;
	public String phoneNumber;

	// Constructor vacío
	public Alumno() {
	}

	// Constructor con atributos name, surname, edad
	public Alumno(String name, String surname, int edad) {
		this.name = name;
		this.surname = surname;
		this.age = edad;
	}

	// Constructor con todos los atributos
	public Alumno(String name, String surname, String email, int edad, String phoneNumber) {
		this.name = name;
		this.surname = surname;
		this.email = email;
		this.age = edad;
		this.phoneNumber = phoneNumber;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getSurname() {
		return surname;
	}

	public void setSurname(String surname) {
		this.surname = surname;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public int getAge() {
		return age;
	}

	public void setAge(int age) {
		this.age = age;
	}

	public String getPhoneNumber() {
		return phoneNumber;
	}

	public void setPhoneNumber(String telefono) {
		this.phoneNumber = telefono;
	}

	@Override
	public int hashCode() {
		return Objects.hash(age, email, name, surname, phoneNumber);
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Alumno other = (Alumno) obj;
		return age == other.age && Objects.equals(email, other.email) && Objects.equals(name, other.name)
				&& Objects.equals(surname, other.surname) && Objects.equals(phoneNumber, other.phoneNumber);
	}

	@Override
	public String toString() {
		return "Alumno [name=" + name + ", surname=" + surname + ", email=" + email + ", age=" + age + ", telefono="
				+ phoneNumber + "]";
	}
	
	public String esMayorEdad() {
	    return (this.age >= 18) ? "MAYOR DE EDAD" : "MENOR DE EDAD";
	}

}
