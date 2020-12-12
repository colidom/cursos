from django.contrib import admin
from .models import Page

# Register your models here.
admin.site.register(Page)

title = "Proyecto con Django"
subtitle = "Panel de gestión"

# Configuración del panel de Django (admin)
admin.site.site_header = title
admin.site.site_title = title
admin.site.index_title = subtitle
