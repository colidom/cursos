#!/usr/bin/ruby


table = 7
numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

puts("Tabla de multiplicar del 7\n ")

numbers.each do |i|
  mult = table * i
  puts "#{table} x #{i} = #{mult}"
end
