import json


def manipulate_json_file(file, movies):
    with open(file, "w", encoding="utf-8") as f:
        json.dump(movies, f, indent=4)
