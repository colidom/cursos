<?php

if (!defined('ABSPATH')) die();

class Gymxtreme_Lessons_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'gymxtreme_widget',
            esc_html__('Gymxtreme Lessons', 'gymxtreme'),
            array('description' => esc_html__('Add Lessons as Widget', 'gymxtreme'),)
        );
    }

    public function widget($args, $instance)
    {
?>
        <ul class="lessons-sidebar">
            <?php
            $args = array(
                'post_type' => 'gymxtreme_lessons',
                'posts_per_page' => $instance['quantity']
            );

            $lessons = new WP_Query($args);
            while ($lessons->have_posts()) {
                $lessons->the_post();
            ?>
                <li>
                    <div class="image">
                        <?php the_post_thumbnail('thumbnail') ?>
                    </div>
                    <div class="lesson-content">
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
            <?php
            }
            wp_reset_postdata();
            ?>
        </ul>
    <?php
    }

    public function form($instance)
    {
        $quantity = !empty($instance['quantity']) ? $instance['quantity'] :
            esc_html('How many lessons do you want to show?');
    ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('quantity')); ?>">
                <?php esc_attr_e('How many lessons do you want to show?'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('quantity')); ?>" name="<?php echo esc_attr($this->get_field_name('quantity')); ?>" type="number" value="<?php echo esc_attr($quantity); ?>" />
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['quantity'] = (!empty($new_instance['quantity'])) ?
            sanitize_text_field($new_instance['quantity']) : '';
        return $instance;
    }
}

function gymxtreme_register_widget()
{
    register_widget('Gymxtreme_Lessons_Widget');
}

add_action('widgets_init', 'gymxtreme_register_widget');
