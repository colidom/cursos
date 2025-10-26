import logging

logging.basicConfig(filename="app.log", level=logging.DEBUG)
logging.debug("This is a debug message")
logging.info("This is an informational   message")
logging.warning("This is a warning message")
logging.error("This is an error message")
