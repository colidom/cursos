package orientacionobjetos;

import java.util.Objects;

public class Coche {

	private String marca;
	private String modelo;
	private int anio;
	private double velocidadActual;
	private double litrosEnDeposito;

	public Coche(String marca, String modelo, int anio, double velocidadActual, double litrosEnDeposito) {
		this.marca = marca;
		this.modelo = modelo;
		this.anio = anio;
		this.velocidadActual = velocidadActual;
		this.litrosEnDeposito = litrosEnDeposito;
	}

	public Coche(String marca, String modelo) {
		this(marca, modelo, 2022, 0, 0);// Seteamos un valor por defecto en el constructor
	}

	public Coche(String marca, int anio) {
		this(marca, null, 2022, 0, 0);
	}

	public Coche() { // Constructor vacío
	}
	
	public String getMarca() {
		return marca;
	}

	public void setMarca(String marca) {
		this.marca = marca;
	}

	public void arrancar() {
		if (litrosEnDeposito > 0) {
			System.out.println(
					"El coche de marca %s y modelo %s del año %d ha arrancado!"
					.formatted(marca, modelo, anio));
		} else {
			System.out.println("El coche de marca %s y modelo %s del año %d no puede arrancar ya que no tiene gasolina."
					.formatted(marca, modelo, anio));
		}
	}
	
	/*
	 * Incrementar litros de combustible en el depósito
	 */
	public double repostar(double cantidad) {
		this.litrosEnDeposito += cantidad;
		System.out.println("Se han añadido %sL de combustible."
				.formatted(cantidad));
		return litrosEnDeposito;
	}
	
	public double acelerar(double incrementoVelocidad) {
		this.velocidadActual += incrementoVelocidad;
		return velocidadActual;
	}
	
	public double viajar(double kilometros) {
		// Comprobamos que l coche puede viajar
		if (kilometros * 0.07 <= litrosEnDeposito) {
			double tiempoEnHoras = kilometros / velocidadActual;
			double tiempoEnSegundos = tiempoEnHoras * 60 * 60;
			this.litrosEnDeposito -= kilometros * 0.07;
			System.out.println("Tras el viaje, el depósito ha quedado con %.2f litros."
					.formatted(litrosEnDeposito));
			return tiempoEnSegundos;
		} else {
			System.out.println("Para realizar este viaje has de repostar!");
			return 0;
		}
	}

	@Override
	public int hashCode() {
		return Objects.hash(anio, litrosEnDeposito, marca, modelo, velocidadActual);
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Coche other = (Coche) obj;
		return anio == other.anio
				&& Double.doubleToLongBits(litrosEnDeposito) == Double.doubleToLongBits(other.litrosEnDeposito)
				&& Objects.equals(marca, other.marca) && Objects.equals(modelo, other.modelo)
				&& Double.doubleToLongBits(velocidadActual) == Double.doubleToLongBits(other.velocidadActual);
	}

	@Override
	public String toString() {
		return "Coche [marca=" + marca + ", modelo=" + modelo + ", anio=" + anio + ", velocidadActual="
				+ velocidadActual + ", litrosEnDeposito=" + litrosEnDeposito + "]";
	}
	
	
}
