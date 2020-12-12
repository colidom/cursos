from django.db import models

# Create your models here.
class Page(models.Model):
    title = models.CharField(max_length=50, verbose_name="Título")
    content = models.TextField(verbose_name="Contenido")
    slug = models.CharField(unique=True, max_length=150, verbose_name="URL amigable")
    visible = models.BooleanField(verbose_name="¿Visible?")
    created_at = models.DateTimeField(auto_now_add=True, verbose_name="Creado el")
    updated_at = models.DateTimeField(auto_now=True, verbose_name="Modificado el")

    class Meta:
        verbose_name = "Página"
        verbose_name_plural = "Páginas"
        
    def __str__(self):
        return self.title
