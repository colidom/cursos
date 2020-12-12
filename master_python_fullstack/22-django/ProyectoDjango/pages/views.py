from django.shortcuts import render
from .models import Page

# Create your views here.
def page(request, slug):

    page = Page.objects.get(slug=slug)

    return render(request, "pages/page.html", {
        "page": page
    })
