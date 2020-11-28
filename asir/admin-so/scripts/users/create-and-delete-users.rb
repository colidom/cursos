#!/usr/bin/ruby

user = `whoami`.rstrip
filename = ARGV[0]
file = `cat #{filename}`
lines = file.split("\n")

if user != "root"
  ARGV.size != 1
 puts("Error! No estás con el usuario Root!")
 exit 1
end
if
   ARGV.size != 1
  puts("Error! El argumento introducido no es válido")
  exit 1
end

if not File.exists?(filename)
  puts ("El fichero #{filename} no existe.")
  exit
end

filecontent = `cat #{filename}`
lines = filecontent.split("\n")
lines.each do |fields|
  user = fields.split(":")
  if user[2] == ""
    puts("El usuario #{user[0]} no tiene email!")
    next
  end
  puts ("El usuario #{user[0]} tiene email!")
  if user[4] == "add"
    if system("id #{user[0]} &> /dev/null") == true
      puts("El usuario #{user[0]} ya existe en el sistema.")
    else
      system("useradd -m #{user[0]} &> /dev/null")
      puts "El usuario #{user[0]} ha sido creado!"
    end
  elsif user[4] == "delete"
    if system("id #{user[0]} &> /dev/null") == true
      system("userdel -rf #{user[0]} &> /dev/null")
      puts "El usuario #{user[0]} ha sido borrado!"
    else
      puts("El usuario #{user[0]} no existe!")
    end
  else
      puts "La accion del ususario #{user[0]} es incorrecta!"
  end
end
