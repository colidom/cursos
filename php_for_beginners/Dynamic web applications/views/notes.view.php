<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>

<?php require('partials/banner.php'); ?>
<?php require('partials/main.php'); ?>
<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <?php foreach ($notes as $note) : ?>
        <li><a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= $note['title']; ?></a></li>
    <?php endforeach; ?>
</div>

<?php require('partials/footer.php'); ?>