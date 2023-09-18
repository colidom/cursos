import requests
from bs4 import BeautifulSoup

req = requests.get("http://example.com")
soup = BeautifulSoup(req.text, "html.parser")

# Get site title
print(soup.select("title")[0].get_text())
print("-----------------------------")

# Get h1 element
print(soup.select("h1"))
print("-----------------------------")

# Get p element
print(soup.select("p"))
print("-----------------------------")

# Get the link element of second p element
a = soup.select("p")[1].select("a")[0]
print(a.get_text())
print("-----------------------------")

# Get the att with the link address
print(a['href'])
print("-----------------------------")

# Items of the attrs
print(a.attrs.items())
print("-----------------------------")

# Get the char-set information
for meta in soup.select("meta"):
    for attr, value in meta.attrs.items():
        print(f"{attr}: {value}")
print("-----------------------------")
