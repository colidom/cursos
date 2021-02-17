from django.db.models.base import Model
from django.forms import ModelForm
from .models import *

class OrderForm(ModelForm):
    class Meta:
        model = Order
        fields = '__all__'
