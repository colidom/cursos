from django.shortcuts import render, HttpResponse, redirect
from miapp.models import Article

# Create your views here.
# MVC = Modelo Vista Controlador -> Acciones(métodos)
# MVT = Modelo Template Vista(vista = controlador) -> Acciones(métodos)

def index(request):
    

    year = 2021
    hasta = range(year, 2051)

    nombre = 'Carlos Oliva'
    lenguajes = ['JavaScript', 'Python', 'PHP', 'C']
    
    return render(request, 'index.html', {
        'title': 'Inicio',
        'mi_variable': 'Soy un dato que está en la vista',
        'nombre': nombre,
        'lenguajes': lenguajes,
        'years': hasta,
    })


def hola_mundo(request):
    return render(request, 'hola_mundo.html')


def pagina(request):
    return render(request, 'pagina.html', {
        'texto': 'Este es mi texto',
        'lista': ['uno', 'dos', 'tres']
    })


def contacto(request, nombre="", apellidos=""):
    return render(request, 'contacto.html')
    

def crear_articulo(request, title, content, public):
    articulo = Article(
        title = title,
        content = content,
        public = public
    )
    articulo.save()

    return HttpResponse(f"Artículo creado: {articulo.title} - {articulo.content}")


def articulo(request):
    
    try:
        articulo = Article.objects.get(pk=1, public=True)
        response = f"Artículo: {articulo.id}-{articulo.title}"
    except:
        response = "<h1>Artículo no encontrado!</h1>"
        
    return HttpResponse(response)


def editar_articulo(request, id):

    articulo = Article.objects.get(pk=id)

    articulo.title = "Badman"
    articulo.content = "Pelicula del 2017"
    articulo.public = False
    articulo.save()

    return HttpResponse(f"Artículo editador: {articulo.title} - {articulo.content}")


def articulos(request):
    
    articulos = Article.objects.all()
    # articulos = Article.objects.order_by('id')[1:3] # Usamos Slicing en la consulta

    # Lockups
    # articulos = Article.objects.filter(title__contains="Articulo")
    # articulos = Article.objects.filter(title__exact="Articulo")
    # articulos = Article.objects.filter(title__icontains="Articulo")

    # Greater than
    # articulos = Article.objects.filter(id__gt=32)
    # Greater than equal
    # articulos = Article.objects.filter(id__gte=32)
    # Less than
    # articulos = Article.objects.filter(id__lt=32)
    # Less than equal
    # articulos = Article.objects.filter(id__lte=32)

    return render(request, 'articulos.html',{
        'articulos': articulos
    })
    

def borrar_articulo(request, id):
    
    articulo = Article.objects.get(id=id)
    articulo.delete()

    return redirect('articulos')