package fechas;

import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.time.temporal.ChronoUnit;

public class App {

	public static void main(String[] args) {

		LocalDate hoy = LocalDate.now();
		LocalDate ayer = hoy.minus(1, ChronoUnit.DAYS);
		LocalDate manana = hoy.plusDays(1);
		LocalDate fechaFija = LocalDate.of(1990, 10, 06);
		LocalDate fechaTexto = LocalDate.parse("1990-10-06");
		LocalDate fechaTextoFormatted = LocalDate.parse("06/10/1990", DateTimeFormatter.ofPattern("dd/MM/yyyy"));
		String fechaTextoInversed = fechaTextoFormatted.format(DateTimeFormatter.ofPattern("dd/MM/yyyy"));
		String fechaTextoOriginalPattern = fechaTextoFormatted.format(DateTimeFormatter.ofPattern("yyyy/MM/dd"));
		
		// Comprobación de resultados
		System.out.println(hoy);
		System.out.println(ayer);
		System.out.println(manana);
		System.out.println(fechaFija);
		System.out.println(fechaTexto);
		System.out.println(fechaTextoFormatted);
		System.out.println(fechaTextoInversed);
		System.out.println(fechaTextoOriginalPattern);
		
		if (hoy.isAfter(ayer)) {
			System.out.println("Normal, hoy está después que ayer y antes que mañana");
		}
	}

}
