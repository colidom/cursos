from django.contrib import admin
from .models import Link

# Register your models here.
class LinkAdmin(admin.ModelAdmin):
    readonly_fields = ('created', 'updated')

    # Mostrar campos solo lectura, para que no se puedan modificar
    def get_readonly_fields(self, request, object=None):
        if request.user.groups.filter(name="Personal").exists():
            return ('key', 'name')
        else:
            return('created', 'updated')

admin.site.register(Link, LinkAdmin)
