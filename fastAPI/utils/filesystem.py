import aiofiles
import json


async def manipulate_json_file(file, movies):
    try:
        async with aiofiles.open(file, "w", encoding="utf-8") as f:
            data = json.dumps(movies, indent=4)
            await f.write(data)
    except Exception as e:
        print(f"Error writing to file: {e}")
        raise
