import mysql.connector

def conectar():
    database = mysql.connector.connect(
        host = "localhost",
        user = "root",
        password = "",
        database = "master_python",
        port = 3306
    )

    cursor = database.cursor(buffered = True) # Nos permite hacer varias consultas con el mismo cursor
    return [database, cursor]
    