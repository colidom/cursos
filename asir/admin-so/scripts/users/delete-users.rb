#!/usr/bin/ruby

if ARGV.size != 1
  puts("El argumento introducido no es válido")
  exit
end
filename = ARGV[0]
user_list = `cat #{filename}`
users = user_list.split("\n")

users.each do |user|
func = system("id #{user} &> /dev/null")
if func == true
  `userdel -r #{user} &> /dev/null`
  puts "El usuario #{user} ha sido borrado."
else
    puts "El usuario #{user} no existe."
  end
end
