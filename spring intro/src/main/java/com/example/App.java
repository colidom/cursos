package com.example;

import com.example.controller.EmployeeController;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ApplicationContext;

@SpringBootApplication
public class App {

	public static void main(String[] args) {

		ApplicationContext context = SpringApplication.run(App.class, args);

		var EmployeeController = context.getBean(EmployeeController.class);
		System.out.println(EmployeeController.helloFromEmployeeService());
		System.out.println(EmployeeController.helloFromCustomerService());
	}

}
