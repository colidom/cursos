from django import forms

class FormArticle(forms.Form):

    title = forms.CharField(
        label = 'Título',
        max_length=40,
        required=True,
        widget=forms.TextInput(
            attrs={
                'placeholder': 'Introduzca el título',
                'class': 'titulo_form_article'
            }
        )
    )

    content = forms.CharField(
        label = 'Contenido',
        widget=forms.Textarea
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
