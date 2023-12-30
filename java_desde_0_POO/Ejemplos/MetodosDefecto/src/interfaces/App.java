package interfaces;

public class App {

	public static void main(String[] args) {

		Loggable logger = new ConsoleLogger();
		Loggable loggerInverse = new ConsoleInverseLogger();
		
		String msg = "Hola Mundo";
		
		logger.log(msg);
		
		String[] arr = new String[] {"Message 1", "Message 2", "Message 3"};

		logger.logArray(arr);
		System.out.println();
		loggerInverse.logArray(arr);
	}

}
