import requests
import csv
import os
from bs4 import BeautifulSoup


def scrap_quotes(url=""):
    domain = "https://quotes.toscrape.com"
    req = requests.get(f"{domain}{url}")
    soup = BeautifulSoup(req.text)

    # Lista para almacenar diccionarios que contendrán datos de las citas
    quotes = []
    # Buscamos las citas de la portada
    quotes_tags = soup.select("div.quote")
    for quote_tag in quotes_tags:
        # Creamos un diccionario vacío
        quote = {}
        # Almacenamos los diferentes campos del diccionario
        quote['text'] = quote_tag.select("span.text")[0].get_Text()
        quote['author'] = quote_tag.select("small.author")[0].get_Text()
        quote['tags'] = []
        for tag in quote_tag.select("div.tags a.tag"):
            quote['tags'].append(tag.getText())
        # Añadimos el diccionario con la cita a la lista
        quotes.append(quote)

    # Buscamos el enlace en el tag li con clase next
    next_url = None
    link_tag = soup.select("li.next a")
    # Si hay como mínimo un enlace extraemos su href relativo sumado al dominio
    if len(link_tag) > 0:
        next_url = link_tag[0]['href']

    # Imprimimos un mensaje informativo
    print(f"Página {domain}{url}, {len(quotes)} citas scrapeadas.")

    # Devolvemos las citas scrapeadas
    return quotes, next_url


def scrap_site(limit=2):
    # Definimos una lista global para almacenar todas las citas
    all_quotes = []
    # Definimos la siguiente URL que irá cambiando (Inicialmente es el dominio raíz)
    next_url = ""
    # Iniciamos un bucle infinito
    while 1:
        # Scrapeamos la página, guardamos las citas scrapeadas y la siguiente página
        quotes, next_url = scrap_quotes(next_url)
        # Añadimos las citas escrapeadas a la lista global
        all_quotes += quotes
        # Restamos 1 al límite
        limit -= 1
        # Si lo superamos o no hay siguiente página finalizamos la función
        if limit == 0 or next_url == None:
            # Finalizamos la función
            return all_quotes


class Citas:
    # Variable de clase para almacenar las citas en memoria
    quotes = list[str]

    @staticmethod
    def scrapear():
        # Scrapeamos todas las citas
        Citas.quotes = scrap_site(limit=99)
        # Guardamos las citas scrapeadas en un fichero CSV volcándolas de la lista dicts
        with open("quotes.csv", "w") as file:
            # Definimos el objeto par aescribir con las cabeceras de los campos
            writer = csv.DictWriter(file, fieldnames=["text", "author", "tags"])
            # Escribimos las cabeceras
            writer.writeheader()
            # Escribimos cada cita en la memoria del fichero
            for quote in Citas.quotes:
                writer.writerow(quote)

    @staticmethod
    def listar(limite=10):
        for quote in Citas.quotes[:limite]:
            print(quote["text"])
            print(quote["author"])
            for tag in quote["tags"]:
                print(tag, end=" ")
            print("\n")

    @staticmethod
    def etiqueta(nombre=""):
        for quote in Citas.quotes:
            if nombre == quote["tags"]:
                print(quote["text"])
                print(quote["author"])
                for tag in quote["tags"]:
                    print(tag, end=" ")
                print("\n")

    @staticmethod
    def author(nombre=""):
        for quote in Citas.quotes:
            if nombre == quote["author"]:
                print(quote["text"])
                print(quote["author"])
                for tag in quote["tags"]:
                    print(tag, end=" ")
                print("\n")


Citas.scrapear()
Citas.etiqueta("love")
Citas.author("Albert Einstein")
Citas.listar(5)


quotes, next_url = scrap_quotes()
print()  # Espacio en blanco
print(next_url)

for quote in quotes:
    print(quote['text'])
    print(quote['author'])
    for tag in quote['tags']:
        print(tag, end=" ")
    print("\n")
