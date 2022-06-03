<div id="footer">

    <div class="sidebar">
            <?php dynamic_sidebar( 'Footer' ); ?>
    </div>

	<div class="copy"><?php printf( __( '&copy; %s', 'typist' ), date_i18n('Y') ) ?> - <?php typist_footer(); ?></div>

</div>
</div><!--.tlo-->

<?php wp_footer(); /* this is used by many Wordpress features and for plugins to work properly */ ?>
</body>
</html>