<?php
get_header();
?>
<main class="section container">
    <?php
    $category = get_queried_object();
    ?>
    <h2 class="text-primary text-center">Category: <?php echo $category->name; ?></h2>
    <ul class="grid-list">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/blog');
        }
        ?>
    </ul>
</main>

<?php
get_footer();
?>