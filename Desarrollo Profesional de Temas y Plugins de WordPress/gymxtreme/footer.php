<footer class="footer container">
    <hr>

    <div class="footer-content">
        <?php
        $args = array(
            'theme-location' => 'main-menu',
            'container' => 'nav',
            'container_class' => 'main-menu'
        );
        wp_nav_menu($args);
        ?>

        <p class="copyright">Copyright &copy <?php echo date("Y") . ' - ' . get_bloginfo('name'); ?></p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>