from fastapi import FastAPI
import json
from pathlib import Path
from utils.filesystem import manipulate_json_file

# fastapi dev main.py            # development server
# uvicorn main:app --reload      # development server with auto-reload
# uvicorn main:app               # production server

MOVIES_FILE = Path(__file__).resolve().parent / "movies.json"

with open(MOVIES_FILE, encoding="utf-8") as f:
    movies = json.load(f)

app = FastAPI()


@app.get("/", tags=["Home"])
async def root():
    return {"message": "Hello World!"}


@app.get("/movies/", tags=["Movies"])
async def get_all_movies():
    return movies


@app.get("/movies/{id}", tags=["Movies"])
async def get_movie_by_id(id: int):
    for movie in movies:
        if movie["id"] == id:
            return movie
    return {"error": "Movie not found"}


@app.get("/movies/title/{title}", tags=["Movies"])
async def get_movie_by_title(title: str):
    for movie in movies:
        if movie["title"].lower() == title.lower():
            return movie
    return {"error": "Movie not found"}


@app.post("/movies/", tags=["Movies"])
async def add_movie(id: int, title: str, director: str, year: int, genre: str):
    new_movie = {
        "id": id,
        "title": title,
        "director": director,
        "year": year,
        "genre": genre,
    }
    movies.append(new_movie)
    manipulate_json_file(MOVIES_FILE, movies)
    return new_movie


@app.put("/movies/{id}", tags=["Movies"])
async def update_movie(
    id: int,
    title: str = None,
    director: str = None,
    year: int = None,
    genre: str = None,
):
    for movie in movies:
        if movie["id"] == id:
            if title is not None:
                movie["title"] = title
            if director is not None:
                movie["director"] = director
            if year is not None:
                movie["year"] = year
            if genre is not None:
                movie["genre"] = genre
            manipulate_json_file(MOVIES_FILE, movies)
            return movie
    return {"error": "Movie not found"}


@app.delete("/movies/{id}", tags=["Movies"])
async def delete_movie(id: int):
    global movies
    movies = [movie for movie in movies if movie["id"] != id]
    manipulate_json_file(MOVIES_FILE, movies)
    return {"message": "Movie deleted successfully"}
