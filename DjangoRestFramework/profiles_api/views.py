from urllib import response
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status, viewsets, filters
from rest_framework.authentication import TokenAuthentication
from rest_framework.authtoken.views import ObtainAuthToken
from rest_framework.settings import api_settings

from profiles_api import serializers, models, permissions


class HelloApiView(APIView):
    """API View de prueba"""
    serializer_class = serializers.HelloSerializers

    def get(self, request, format=None):
        """Retornar lista de caracterísitcas del APIView"""
        an_apiview = [
            'Usamos métodos HTTP como funciones (get, post, patch, put, delete',
            'Es similar a una vista tradicional de Django',
            'Nos da el mayor control sobre la lógica de nuestra aplicación',
            'Está mapeado manualmente a los URLs',
        ]

        return Response({'message': 'Hello', 'an_apiview': an_apiview})

    def post(self, request):
        """Crea un mensaje con nuestro nombre"""
        serializer = self.serializer_class(data=request.data)

        if serializer.is_valid():
            name = serializer.validated_data.get('name')
            message = f"Hello {name}"
            return Response({'message': message})
        else:
            return Response(
                serializer.errors,
                status=status.HTTP_400_BAD_REQUEST
            )

    def put(self, request, pk=None):
        """Maneja actualizar un objeto"""
        return Response({'method': 'PUT'})

    def patch(self, request, pk=None):
        """Maneja actualización parcial de un objeto"""
        return Response({'method': 'PATCH'})

    def delete(self, request, pk=None):
        """Borrar un objeto"""
        return Response({'method': 'DELETE'})


class HelloViewSet(viewsets.ViewSet):
    """ Test API ViewSet """

    serializer_class = serializers.HelloSerializers

    def list(self, request):
        """ Retornar Mensaje de Hola Mundo """
        a_viewset = [
            'Usa acciones (list, create, retrieve, update, partial_update',
            'Automaticamente mapea a los URÑs usando Routers',
            'Provee más funcionalidad con menos código'
        ]

        return Response({'message': '¡Hola!', 'a_viewset': a_viewset})

    def create(self, request):
        """ Crear nuevo mensaje de Hola Mundo """
        serializer = self.serializer_class(data=request.data)

        if serializer.is_valid():
            name = serializer.validated_data.get('name')
            message = f"Hola {name}"
            return Response({'message': message})
        else:
            return Response(
                serializer.errors,
                status=status.HTTP_400_BAD_REQUEST
            )

    def retrieve(self, request, pk=None):
        """ Handle getting an object by its ID"""
        return Response({'http:method': 'GET'})

    def uptade(self, request, pk=None):
        """ Actualiza un objeto"""
        return Response({'http:method': 'PUT'})

    def partial_uptade(self, request, pk=None):
        """ Actualiza parcialmente un objeto"""
        return Response({'http:method': 'PATCH'})

    def destroy(self, request, pk=None):
        """ Destruye un objeto"""
        return Response({'http:method': 'DELETE'})


class UserProfileViewSet(viewsets.ModelViewSet):
    """ Crear y actualizar perfiles """
    serializer_class = serializers.UserProfileSerializer
    queryset = models.UserProfile.objects.all()
    authentication_classes = (TokenAuthentication,)
    permission_classes = (permissions.UpdateOwnProfile,)
    filter_backends = (filters.SearchFilter,)
    search_fields = ('name', 'email',)


class UserLoginApiView(ObtainAuthToken):
    """ Crea los tokens de autenticación de usuario """
    renderer_classes = api_settings.DEFAULT_RENDERER_CLASSES
