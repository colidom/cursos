from mysql import DB

db = DB("aragorn", "arazorn")

cmd = input("Introduzca el comando: ")
desc = input("Introduzca la descripción: ")

sql = "insert into commands values ('{}', '{}')".format(cmd, desc)
db.run(sql)

sql = "select * from commands order by name"
print(db.query(sql))
