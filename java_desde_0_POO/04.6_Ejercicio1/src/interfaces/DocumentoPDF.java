package interfaces;

public class DocumentoPDF extends Documento {

	public DocumentoPDF(long size) {
		super(size);
	}

	@Override
	public Boolean isValid() {
		return size >= 0 & size <= 1024 * 1024;
	}

}
