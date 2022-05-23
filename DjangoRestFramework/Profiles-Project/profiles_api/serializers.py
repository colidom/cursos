from rest_framework import serializers

class HelloSerializers(serializers.Serializer):
    """Serializa un campo para probar nuestro APIView"""
    name = serializers.CharField(max_length=10)
