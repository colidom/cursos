<?php
get_header();
?>
<main class="container section con-sidebar">
    <section class="main-content">
        <?php
        get_template_part('template-parts/lesson');
        ?>
    </section>
    <?php
    get_sidebar();
    ?>
</main>
<?php
get_footer();
?>