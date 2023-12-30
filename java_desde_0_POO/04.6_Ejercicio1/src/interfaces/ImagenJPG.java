package interfaces;

public class ImagenJPG extends Imagen {

	public ImagenJPG(long width, long height) {
		super(width, height);
	}

	@Override
	public Boolean isValid() {
		return width * height <= 5_000_000;
	}

}
