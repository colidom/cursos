from django.shortcuts import render

# Create your views here.
def page(request):

    return render(request, "pages/page.html", {
        "title": "Página individual", 
        "page": "Hola Mundo desde la Vista de app Pages"
    })
