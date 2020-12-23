from flask import Flask

app = Flask(__name__)

@app.route('/')
def index():
    return ("Aprendiendo Flask")

@app.route('/información')
def informacion():
    return "<h1>Página de información </h1>"

@app.route('/contacto')
def contacto():
    return "<h1>Página de contacto </h1>"

@app.route('/lenguajes-de-programacion')
def lenguajes():
    return "<h1>Página de lenguajes </h1>"

if __name__ == '__main__':
    app.run(debug=True)
