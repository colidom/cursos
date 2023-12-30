package interfaces;

public interface FechaUtil {

	public static String formateaFecha(int dia, int mes, int anio) {

		boolean fechaEsValida = true;

		if (anio < 1 || anio > 9999) {
			fechaEsValida = false;
		}

		if (mes < 1 || mes > 12) {
			fechaEsValida = false;
		}

		if (dia < 1 || dia > 31) {
			fechaEsValida = false;
		} else {
			if (mes == 2) {
				if (dia > 29) {
					fechaEsValida = false;
				} else if (dia == 29) {
					boolean esBisiesto = (anio % 4 == 0 && anio % 100 != 0) || (anio % 400 == 0);
					if (!esBisiesto) {
						fechaEsValida = false;
					}
				}
			} else if (mes == 4 || mes == 6 || mes == 9 || mes == 11) {
				if (dia > 30) {
					fechaEsValida = false;
				}
			}
		}

		if (!fechaEsValida)
			return "Fecha no válida";
		else
			return "%2d/%2d/%4d".formatted(dia, mes, anio);
	}

}
