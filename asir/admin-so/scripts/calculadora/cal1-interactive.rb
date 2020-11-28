#!/usr/bin/ruby


def get_int_values
  [gets, gets].map{ |s| s.chomp.to_i }
end

puts "¿Que le gustaría hacer?
-----------------------
(1)Sumar.
(2)Multiplicar.
(3)Restar.
(4)Salir."
response = gets.chomp

case response.downcase
when '1'
  puts "Introduzca los números que quiere sumar"
  operator = :+

when '2'
  puts "Introduzca los números que quiere restar"
  operator = :-

when '3'
  puts "Introduzca los números que quiere multiplicar"
  operator = :*

when '4'
  puts "Saliendo de la calculadora...
Hasta pronto!"
  exit
end

answer = get_int_values.inject(operator)
puts "El resultado es: #{ answer }"
