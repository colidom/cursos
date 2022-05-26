from rest_framework import serializers
from profiles_api import models


class HelloSerializers(serializers.Serializer):
    """Serializa un campo para probar nuestro APIView"""
    name = serializers.CharField(max_length=10)


class UserProfileSerializer(serializers.ModelSerializer):
    """ Serializa objeto de perfil de usuario """
    class Meta:
        model = models.UserProfile
        fields = ('id', 'email', 'name', 'password')
        extra_kwargs = {
            'password': {
                'write_only': True,
                'style': {'input_type': 'password'}
            }
        }
