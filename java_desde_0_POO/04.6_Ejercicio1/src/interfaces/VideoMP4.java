package interfaces;

public class VideoMP4 extends Video {

	public VideoMP4(int length) {
		super(length);
	}

	@Override
	public Boolean isValid() {
		return length > 0 && length < 5 * 60;
	}

}
