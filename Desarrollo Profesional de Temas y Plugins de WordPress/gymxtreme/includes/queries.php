<?php

function gymxtreme_lessons_list($qty = -1)
{
?>
    <ul class="grid-list">
        <?php
        $args = array(
            'post_type' => 'gymxtreme_lessons',
            'posts_per_page' => $qty
        );

        $lessons = new WP_Query($args);
        while ($lessons->have_posts()) {
            $lessons->the_post();
        ?>
            <li class="card">
                <?php the_post_thumbnail() ?>
                <div class="content">
                    <a href="<?php the_permalink() ?>">
                        <h3><?php the_title() ?></h3>
                    </a>
                    <?php
                    $start_time = get_field('start_time');
                    $end_time = get_field('end_time');
                    ?>
                    <p>
                        <?php the_field('lessons_days'); ?> -
                        <?php echo $start_time . " to " . $end_time; ?>
                    </p>
                </div>
            </li>
        <?php }
        wp_reset_postdata(); // Para indicar a WP que finaliza la consulta
        ?>
    </ul>
<?php

}

function gymxtreme_instructors()
{
?>
    <ul class="grid-list instructors">
        <?php
        $args = array(
            'post_type' => 'instructors'
        );

        $instructors = new WP_Query($args);
        while ($instructors->have_posts()) {
            $instructors->the_post();
        ?>
            <li class="instructor">
                <?php the_post_thumbnail('large'); ?>
                <div class="content text-center">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>

                    <div class="speciality">
                        <?php
                        $spec = get_field('speciality');

                        foreach ($spec as $s) { ?>
                            <span class="label">
                                <?php echo esc_html($s); ?>
                            </span>
                        <?php } ?>

                    </div>
                </div>
            </li>
        <?php }
        wp_reset_postdata(); // Para indicar a WP que finaliza la consulta
        ?>
    </ul>
<?php
}

function gymxtreme_testimonials()
{
?>
    <ul class="testimonials-list swiper-wrapper">
        <?php
        $args = array(
            'post_type' => 'testimonials'
        );

        $testimonials = new WP_Query($args);
        while ($testimonials->have_posts()) {
            $testimonials->the_post();
        ?>
            <li class="testimonial text-center swiper-slide">
                <blockquote>
                    <?php the_content(); ?>
                </blockquote>

                <footer class="testimonial-footer">
                    <?php the_post_thumbnail('thumbnail') ?>
                    <p>
                        <?php the_title(); ?>
                    </p>
                </footer>
            </li>
        <?php }
        wp_reset_postdata(); // Para indicar a WP que finaliza la consulta
        ?>
    </ul>
<?php
}
