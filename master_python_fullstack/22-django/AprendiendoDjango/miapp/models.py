from django.db import models

# Create your models here.
# https://docs.djangoproject.com/en/3.1/ref/models/fields/
# https://docs.djangoproject.com/en/3.1/ref/models/options/
class Article(models.Model):
    title = models.CharField(max_length=150, verbose_name = "Título")
    content = models.TextField(verbose_name = "Contenido")
    image = models.ImageField(default='null', verbose_name = "Miniatura")
    public = models.BooleanField(verbose_name = "Público")
    created_at = models.DateTimeField(auto_now=False, auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True, auto_now_add=False)
    
    class Meta:
        verbose_name = "Artículo"
        verbose_name_plural = "Artículos" 
        ordering = ['-created_at']

class Category(models.Model):
    name = models.CharField(max_length=110, verbose_name = "Nombre")
    description = models.CharField(max_length=250, verbose_name = "Descripción")
    created_at = models.DateField()
    
    class Meta:
        verbose_name = "Categoría"
        verbose_name_plural = "Categorías" 
