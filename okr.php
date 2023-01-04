<?php
/*
Plugin Name: OKR
Plugin URI: https://www.ablancodev.com
Description: Manage your OKRs and goals.
Author: Antonio Blanco Oliva
Version: 1.0.0
*/

add_action( 'init', 'okr_init' );

function okr_init() {
    require_once 'core/class-okr-cpt.php';
    require_once 'views/class-okr-shortcodes.php';
}


add_action( 'wp_footer', 'theme_add_bootstrap' );
function theme_add_bootstrap() {
    ?>
    <script type="text/javascript">
        if (!jQuery.fn.modal) {
        document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">');
        document.write('\x3Cscript src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">\x3C/script>');
        }
    </script>
    <?php
}