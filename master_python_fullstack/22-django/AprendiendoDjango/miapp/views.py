from django.shortcuts import render, HttpResponse, redirect
from miapp.models import Article
from django.db.models import Q
from miapp.forms import FormArticle

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


def save_article(request):

    if request.method == 'POST':    

        title = request.POST['title']
        if len(title) <= 5:
            return HttpResponse("El título del artículo es muy pequeño")

        content = request.POST['content']
        public = request.POST['public']

        articulo = Article(
            title = title,
            content = content,
            public = public
        )
        articulo.save()
        
        return redirect('articulos')
        # return HttpResponse(f"Artículo creado: {articulo.title} - {articulo.content}")

    else:
        return HttpResponse("<h2>No se ha podido crear el artículo</h2>")



def create_article(request):

    return render(request, 'create_article.html')


def create_full_article(request):

    if request.method == 'POST':
        formulario = FormArticle(request.POST)

        if formulario.is_valid():
            data_form = formulario.cleaned_data

            title = data_form.get('title')
            content = data_form['content']
            public = data_form['public']

            articulo = Article(
                title = title,
                content = content,
                public = public
            )
            return HttpResponse(articulo.title + ' ' + articulo.content + ' ' + str(articulo.public))

    else:
        formulario = FormArticle()
    
    return render(request, 'create_full_article.html', {
        'form': formulario
    })


def articulos(request):
    
    articulos = Article.objects.all().order_by('-id')
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
    """
    articulos = Article.objects.filter(
        Q(title__contains="2") | Q(title__contains="3") | Q(public=True)
    )

    articulos = Article.objects.filter(
        title = 'Articulo',
    ).exclude(
        public=False
    )
    # Consulta SQL puro
    # articulos = Article.objects.raw("SELECT * FROM miapp_article WHERE title='Articulo' AND public=0")
    """
    return render(request, 'articulos.html',{
        'articulos': articulos
    })
    

def borrar_articulo(request, id):
    
    articulo = Article.objects.get(id=id)
    articulo.delete()

    return redirect('articulos')