class Config:
    DEBUG = True
    SQLALCHEMY_DATABASE_URI = 'postgresql+psycopg2://{colidom}:{Pass1234}@localhost/{smilecook}'
    SQLALCHEMY_TRACK_MODIFICATIONS = False
