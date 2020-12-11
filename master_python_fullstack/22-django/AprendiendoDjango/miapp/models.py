from django.db import models

# Create your models here.
# https://docs.djangoproject.com/en/3.1/ref/models/fields/
# https://docs.djangoproject.com/en/3.1/ref/models/options/
class Article(models.Model):
    title = models.CharField(max_length=150, verbose_name = "Título")
    content = models.TextField(verbose_name = "Contenido")
    image = models.ImageField(default='null', verbose_name = "Miniatura", upload_to="articles")
    public = models.BooleanField(verbose_name = "Público")
    created_at = models.DateTimeField(auto_now=False, auto_now_add=True, verbose_name="Creado")
    updated_at = models.DateTimeField(auto_now=True, auto_now_add=False, verbose_name="Última modificación")
    
    class Meta:
        verbose_name = "Artículo"
        verbose_name_plural = "Artículos" 
        ordering = ['-created_at']

    def __str__(self):
        if self.public:
            public = "(publicado)"
        else:
            public = "(privado)"
        return f"{self.title} {public}"

class Category(models.Model):
    name = models.CharField(max_length=110, verbose_name = "Nombre")
    description = models.CharField(max_length=250, verbose_name = "Descripción")
    created_at = models.DateField()
    
    class Meta:
        verbose_name = "Categoría"
        verbose_name_plural = "Categorías" 
