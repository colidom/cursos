from flask import Flask, flash, redirect, url_for, render_template, request
from datetime import datetime
from flask_mysqldb import MySQL

app = Flask(__name__)

app.secret_key = 'clave_secreta_flask'

# Conexión DB
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'proyectoflask'

mysql = MySQL(app)

# Context processors
@app.context_processor
def date_now():
    return {
        'now': datetime.utcnow()
    }

@app.route('/')
def index():

    edad = 30
    personas = ['Carlos', 'Paco', 'Francisco', 'David']
    return render_template('index.html', 
                            edad=edad,
                            dato1='valor', 
                            dato2='valor2', 
                            personas=personas)


@app.route('/informacion')
@app.route('/informacion/<string:nombre>')
@app.route('/informacion/<string:nombre>/<string:apellidos>')
def informacion(nombre = None, apellidos = None):

    texto = ""
    if nombre != None and apellidos != None:
        texto = f"Bienvenid@, {nombre} {apellidos}"

    return render_template('informacion.html', texto=texto)

@app.route('/contacto')
@app.route('/contacto/<redireccion>')
def contacto(redireccion = None):

    if redireccion is not None:
        return redirect(url_for('lenguajes'))

    return render_template('contacto.html')

@app.route('/lenguajes-de-programacion')
def lenguajes():
    return render_template('lenguajes.html')

@app.route('/crear-coche', methods=['GET', 'POST'])
def crear_coche():
    if request.method == 'POST':

        marca = request.form['marca']
        modelo = request.form['modelo']
        precio = request.form['precio']
        ciudad = request.form['ciudad']

        cursor = mysql.connection.cursor()
        cursor.execute("INSERT INTO coches VALUES(NULL, %s, %s, %s, %s)", (marca, modelo, precio, ciudad))
        cursor.connection.commit()
        flash('Has creado el coche correctamente!!!')
        return redirect(url_for('index'))

    return render_template('crear_coche.html')

@app.route('/coches')
def coches():
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM coches")
    coches = cursor.fetchall()
    cursor.close()

    return render_template('coches.html', coches=coches)

if __name__ == '__main__':
    app.run(debug=True)
