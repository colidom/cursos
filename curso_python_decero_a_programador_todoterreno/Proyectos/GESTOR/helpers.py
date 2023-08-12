import os
import platform


def clean_screen():
    os.system("cls") if platform.system() == "Windows" else os.system("clear")


def read_text(min_length=0, max_length=100, msg=None):
    print(msg) if msg else None
    while True:
        text = input("> ")
        if len(text) >= min_length and len(text) <= max_length:
            return text
