package herencia;

import java.util.Objects;

public class Habitacion {

	private String uso;
	private double metrosCuadrados;
	private int numeroVentanas;

	public Habitacion() {}

	@Override
	public String toString() {
		return "Habitacion [uso=" + uso + ", metrosCuadrados=" + metrosCuadrados + ", numeroVentanas=" + numeroVentanas
				+ "]";
	}

	@Override
	public int hashCode() {
		return Objects.hash(metrosCuadrados, numeroVentanas, uso);
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Habitacion other = (Habitacion) obj;
		return Double.doubleToLongBits(metrosCuadrados) == Double.doubleToLongBits(other.metrosCuadrados)
				&& numeroVentanas == other.numeroVentanas && Objects.equals(uso, other.uso);
	}

	public String getUso() {
		return uso;
	}

	public void setUso(String uso) {
		this.uso = uso;
	}

	public double getMetrosCuadrados() {
		return metrosCuadrados;
	}

	public void setMetrosCuadrados(double metrosCuadrados) {
		this.metrosCuadrados = metrosCuadrados;
	}

	public int getNumeroVentanas() {
		return numeroVentanas;
	}

	public void setNumeroVentanas(int numeroVentanas) {
		this.numeroVentanas = numeroVentanas;
	}

	public Habitacion(String uso, double metrosCuadrados, int numeroVentanas) {
		super();
		this.uso = uso;
		this.metrosCuadrados = metrosCuadrados;
		this.numeroVentanas = numeroVentanas;
	}
}
