<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
</head>

<body>

    <h1><?php echo $bussiness['name'] ?></h1>

    <ul>
        <?php foreach ($bussiness['categories'] as $category) : ?>
            <li><?php echo $category ?></li>
        <?php endforeach ?>
    </ul>

</body>

</html>