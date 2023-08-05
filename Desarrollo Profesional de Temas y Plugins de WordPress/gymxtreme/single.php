<?php
get_header();
?>
<main class="container section">
    <?php
    get_template_part('template-parts/post');
    ?>

    <div class="comments">
        <?php comment_form(); ?>
        <h3 class="text-center text-primary comments">Comments</h3>
        <ul class="comments-list">
            <?php
            $comments = get_comments(array(
                'post_id' => $post->ID,
                'status'  => 'approve'
            ));

            wp_list_comments(array(
                'per_page' => 10,
                'reverse_top_level' => false
            ), $comments);
            ?>
        </ul>
    </div>

</main>
<?php
get_footer();
?>