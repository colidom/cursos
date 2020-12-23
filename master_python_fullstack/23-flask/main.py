from flask import Flask

app = Flask(__name__)

@app.route('/')
def index():
    return ("Aprendiendo Flask")

@app.route('/informacion/<string:nombre>/<string:apellidos>/<int:edad>')
def informacion(nombre, apellidos, edad):
    return f"""
            <h1>Página de información</h1>
            <p>Esta es la página de información</p>
            <h3>Bienvenid@, {nombre} {apellidos}</h3>
            <h4>Edad: {edad}</h4>
    """

@app.route('/contacto')
def contacto():
    return "<h1>Página de contacto </h1>"

@app.route('/lenguajes-de-programacion')
def lenguajes():
    return "<h1>Página de lenguajes </h1>"

if __name__ == '__main__':
    app.run(debug=True)
