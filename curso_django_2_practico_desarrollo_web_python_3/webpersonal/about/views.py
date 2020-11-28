from django.shortcuts import render
from .models import About

# Create your views here.
def about(request):
    articles = About.objects.all()
    return render(request, "about/about.html", {'articles': articles})
    