<?php
/* 
*  Template Name: Lessons list
*/
get_header();
?>
<main class="container section">
    <?php
    get_template_part('template-parts/page');
    ?>
    <?php gymxtreme_lessons_list()?>
</main>

<?php
get_footer();
?>