import re
import requests
from bs4 import BeautifulSoup

req = requests.get("https://es.wikipedia.org/wiki/Python")
soup = BeautifulSoup(req.text, "html.parser")

# Get web title
title = soup.select("title")[0].get_text()
print(title)

# Get 1º p element
summary = soup.select("p")[0].get_text()
print(summary)

# Get index element
toc = soup.select("#vector-toc")[0]

for a in toc.select("a"):
    print(a.get_text())

# Get index element with re
for a in toc.select("a"):
    text = a.get_text()
    if re.match(r"\d+", text):
        print(text)
    elif re.match(r"\d+.\d+ ", text):
        print(" ", text)
    elif re.match(r"\d+.\d+.\d+ ", text):
        print("  ", text)

# Get information box
tr_tags = soup.select(".infobox tr")
for tr_tag in tr_tags:
    th_tags = tr_tag.select("th")
    td_tags = tr_tag.select("td")
    if len(th_tags) > 0 and len(td_tags) > 0:
        print(f"{th_tags[0].getText().strip()}: {td_tags[0].getText().strip()}")


# Scraping image
img = soup.select(".infobox img")[0]
print(img['src'])

# With requests and https protocol
response = requests.get(f"https:{img['src']}")

if response.status_code == 200:
    with open('image.png', 'wb') as f:
        f.write(response.content)
