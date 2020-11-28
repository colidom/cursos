#!/usr/bin/ruby

if ARGV.size != 1
  puts("Argumento no válido")
  exit
end

filename = ARGV[0]
content = `cat #{filename}`
lines = content.split("\n")

lines.each do |i|
  fields = i.split
  num1 = fields[0].to_i
  op   = fields[1]
  num2 = fields[2].to_i

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
end
