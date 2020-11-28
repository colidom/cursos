from django import template
from pages.models import Page

register = template.Library()

@register.simple_tag
# Obtenemos la lista de páginas
def get_page_list():
    pages = Page.objects.all()
    return pages
