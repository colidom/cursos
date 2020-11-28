#!/usr/bin/ruby

num1=ARGV[0].to_i
op=ARGV[1]
num2=ARGV[2].to_i

if ARGV.size == 3
  if op == '+' then
    puts(num1+num2)
  elsif op == '-' then
    puts(num1-num2)
  elsif op == 'x' then
    puts(num1*num2)
  elsif op == '/' then
    puts(num1/num2)
  else
    puts("Parece que algo ha fallado, los argumentos que buscas son (+)(-)(*) y (/)")
  end
else
  puts("Argumento no válido")
end
