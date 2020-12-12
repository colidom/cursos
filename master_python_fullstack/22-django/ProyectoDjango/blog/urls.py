from django.urls import path
from . import views

urlpatterns = [
    path('articulos/', views.list, name='list_articles'),
    path('categoria/<int:category_id>', views.category, name='category'),
]
