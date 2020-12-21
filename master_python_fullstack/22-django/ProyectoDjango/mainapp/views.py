from django.shortcuts import render, redirect
from django.contrib import messages
from django.contrib.auth.forms import UserCreationForm
from mainapp.forms import RegisterForm

# Create your views here.
def index(request):
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio'
    })

def about(request):
    return render(request, 'mainapp/about.html', {
        'title': 'Sobre nosotros'
    })

def register_page(request):

    register_form = RegisterForm()

    if request.method == 'POST':
        register_form = RegisterForm(request.POST)

        if register_form.is_valid():
            register_form.save()
            messages.success(request, 'Te has registrado correctamente😋')

            return redirect('/inicio')

    return render(request, 'users/register.html', {
        'title': 'Registro',
        'register_form': register_form
    })
