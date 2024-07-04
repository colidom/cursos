<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundamentals</title>
</head>

<body>
    <ul>
        <?php foreach ($filteredMovies as $movie) : ?>
            <li>
                <a href="<?= $movie['url'] ?> ">
                    <?= $movie['title']; ?> (<?= $movie['release_year']; ?>) - By <?= $movie['director']; ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>

</body>

</html>