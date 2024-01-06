package com.example.service;

import org.springframework.stereotype.Component;

@Component
public class EmployeeServiceImpl implements EmployeeService{
    @Override
    public String hello() {
        return "¡Hello World!";
    }
}
