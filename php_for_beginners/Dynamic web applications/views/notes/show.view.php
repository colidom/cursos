<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>
<?php require base_path('views/partials/main.php'); ?>

<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p>
        <a href="/notes" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-60" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0L5 1M1 5l4 4" />
            </svg>
            Go back...
        </a>
    </p>
    <h1 class="text-blue-600 text-2xl mt-5"><?= $note['title']; ?></h1>
    <p class="text-1xl"><?= htmlspecialchars($note['body']); ?></p>
    <form class="mt-6" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <button class="text-sm text-red-500 hover:text-red-900 hover:bg-red-100">Delete</button>
    </form>
</div>

<?php require base_path('views/partials/footer.php'); ?>