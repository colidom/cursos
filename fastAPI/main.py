from fastapi import FastAPI, HTTPException
import json
from pathlib import Path
from pydantic import BaseModel
from utils.filesystem import manipulate_json_file
import aiofiles

# fastapi dev main.py            # development server
# uvicorn main:app --reload      # development server with auto-reload
# uvicorn main:app               # production server

MOVIES_FILE = Path(__file__).resolve().parent / "movies.json"


async def load_movies():
    try:
        async with aiofiles.open(MOVIES_FILE, "r", encoding="utf-8") as f:
            content = await f.read()
            return json.loads(content) if content else []
    except FileNotFoundError:
        return []


class Movie(BaseModel):
    id: int
    title: str
    director: str
    year: int
    genre: str


app = FastAPI()


@app.get("/", tags=["Home"])
def root():
    return {"message": "Hello World!"}


@app.get("/movies/", tags=["Movies"])
async def get_all_movies():
    movies = await load_movies()
    return movies


@app.get("/movies/{id}", tags=["Movies"])
async def get_movie_by_id(id: int):
    movies = await load_movies()
    for movie in movies:
        if movie["id"] == id:
            return movie
    raise HTTPException(status_code=404, detail="Movie not found")


@app.get("/movies/title/{title}", tags=["Movies"])
async def get_movie_by_title(title: str):
    movies = await load_movies()
    for movie in movies:
        if movie["title"].lower() == title.lower():
            return movie
    raise HTTPException(status_code=404, detail="Movie not found")


@app.post("/movies/", tags=["Movies"])
async def add_movie(movie: Movie):
    movies = await load_movies()
    if any(m["id"] == movie.id for m in movies):
        raise HTTPException(status_code=400, detail="Movie with this ID already exists")

    movies.append(movie.model_dump())
    await manipulate_json_file(MOVIES_FILE, movies)
    return movie


@app.put("/movies/", tags=["Movies"])
async def update_movie(movie: Movie):
    movies = await load_movies()
    for i, m in enumerate(movies):
        if m["id"] == movie.id:
            movies[i] = movie.model_dump()
            await manipulate_json_file(MOVIES_FILE, movies)
            return movie
    raise HTTPException(status_code=404, detail="Movie not found")


@app.delete("/movies/{id}", tags=["Movies"])
async def delete_movie(id: int):
    movies = await load_movies()
    filtered = [movie for movie in movies if movie["id"] != id]
    if len(filtered) == len(movies):
        raise HTTPException(status_code=404, detail="Movie not found")
    await manipulate_json_file(MOVIES_FILE, filtered)
    return {"message": "Movie deleted successfully"}, {"movies": filtered}
