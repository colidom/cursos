from rest_framework import permissions


class UpdateOwnProfile(permissions.BasePermission):
    """ Permite al usuario editar su propio perfil"""

    def has_object_permission(self, request, view, obj):
        """ Comprobar si el usuario está intentando editar su propio perfil"""
        if request.metod in permissions.SAFE_METHODS:
            return True
