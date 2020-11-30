from django import forms
from django.core import validators
# https://docs.djangoproject.com/en/3.1/ref/validators/

class FormArticle(forms.Form):

    title = forms.CharField(
        label = "Título",
        max_length=40,
        required=True,
        widget=forms.TextInput(
            attrs={
                'placeholder': 'Introduzca el título',
                'class': 'titulo_form_article'
            }
        ),
        validators = [
            validators.MinLengthValidator(4, 'El título es demasiado corto'),
            validators.RegexValidator('[A-Za-z0-9 ]*$', 'El título está mal formado', 'invalid_title')
        ]
    )

    content = forms.CharField(
        label = 'Contenido',
        widget=forms.Textarea,
        validators = [
            validators.MaxLengthValidator(20, 'Te has pasado, has puesto mucho texto')
        ]
    )
    content.widget.attrs.update({
        'placeholder': 'Contenido',
        'class': 'contenido_form_article',
        'id': 'contenido_form'
    })


    public_options = [
        (1, 'Si'),
        (0, 'No')
    ]

    public = forms.TypedChoiceField(
        label = "¿Publicado?",
        choices = public_options
    )
