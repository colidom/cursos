# Filtro custom
from django import template

register = template.Library()

@register.filter(name='saludo')
def saludo(value):

    largo = ''
    if len(value) >= 8:
        largo = '<p>Tu nombre es muy largo</p>'
    return f"<h1 style='background:green; color:white;'>Bienvenido, {value} </h1>" + largo
