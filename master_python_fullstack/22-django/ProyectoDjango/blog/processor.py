from blog.models import Category, Article

def get_categories(request):

    caterogies_in_use = Article.objects.filter(public=True).values_list('categories', flat=True)
    categories = Category.objects.filter(id__in=caterogies_in_use).values_list('id', 'name')
    
    return {
        'categories': categories,
        'ids': caterogies_in_use
    }
    