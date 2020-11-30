from django import forms

class FormArticle(forms.Form):

    title = forms.CharField(
        label = 'Título'
    )

    content = forms.CharField(
        label = 'Contenido',
        widget = forms.Textarea
    )

    public_options = [
        (1, 'Si'),
        (0, 'No')
    ]

    select = forms.TypedChoiceField(
        label = "¿Publicado?",
        choices = public_options
    )
