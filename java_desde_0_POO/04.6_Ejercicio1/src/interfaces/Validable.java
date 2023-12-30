package interfaces;

public sealed interface Validable permits Documento, Imagen, Video {
	
	Boolean isValid();

}
