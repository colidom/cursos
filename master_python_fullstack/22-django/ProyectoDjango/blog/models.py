from django.db import models

# Create your models here.
class Category(models.Model):
    name = models.CharField(max_length=100, verbose_name='Nombre')
    description = models.CharField(max_length=500, verbose_name='Descripción')
    created_at = models.DateTimeField(auto_now_add=True, verbose_name='Creado el')

    class Meta:
        vervose_name = 'Categoría'
        vervose_name_plural = 'Categorías'
    
    def __str__(self):
        return self.name
        