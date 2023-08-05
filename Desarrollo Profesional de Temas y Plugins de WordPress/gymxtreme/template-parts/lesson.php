<?php
while (have_posts()) : the_post();

    the_title('<h1 class="text-center text-primary">', '</h1>');
    if (has_post_thumbnail()) {
        the_post_thumbnail('full', array('class' => 'imagen-destacada'));
    }
        $start_time = get_field('start_time');
        $end_time = get_field('end_time');
        ?>
        <p class="lesson-info">
            <?php the_field('lessons_days'); ?> -
            <?php echo $start_time . " to " . $end_time; ?>
        </p>
        <?php
    the_content();

endwhile;
