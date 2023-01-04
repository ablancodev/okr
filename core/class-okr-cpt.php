<?php
class OKR_CPT {

    public static function init() {
        self::okr_register_cpts();
        self::okr_register_tax();

        add_action( 'save_post', array( __CLASS__, 'save_key_result_meta_box_data' ) );

    }

    public static function okr_register_cpts() {
        // objetives
        $labels = array(
            'name'                  => _x( 'Objetives', 'Post Type General Name' ),
            'singular_name'         => _x( 'Objetive', 'Post Type Singular Name' ),
            'menu_name'             => __( 'Objetives' ),
            'name_admin_bar'        => __( 'Objetives' ),
            'archives'              => __( 'Listado Objetives' ),
            'attributes'            => __( 'Atributos' ),
            'parent_item_colon'     => __( 'Objetive padre:' ),
            'all_items'             => __( 'Todos los Objetives' ),
            'add_new_item'          => __( 'Añadir nuevo Objetive' ),
            'add_new'               => __( 'Añadir nuevo' ),
            'new_item'              => __( 'Nuevo Objetive' ),
            'edit_item'             => __( 'Editar Objetive' ),
            'update_item'           => __( 'Actualizar Objetive' ),
            'view_item'             => __( 'Ver Objetive' ),
            'view_items'            => __( 'Ver Objetives' ),
            'search_items'          => __( 'Buscar Objetive' ),
            'not_found'             => __( 'No encontrado' ),
            'not_found_in_trash'    => __( 'No encontrado en la papelera' ),
            'featured_image'        => __( 'Imagen destacada' ),
            'set_featured_image'    => __( 'Establecer imagen destacada' ),
            'remove_featured_image' => __( 'Borrar imagen destacada' ),
            'use_featured_image'    => __( 'Usar como imagen destacada' ),
            'insert_into_item'      => __( 'Insertar en Objetives' ),
            'uploaded_to_this_item' => __( 'Subir a Objetives' ),
            'items_list'            => __( 'Listado Objetives' ),
            'items_list_navigation' => __( 'Listado Objetives' ),
            'filter_items_list'     => __( 'Filtrado Objetives' ),
        );
        
        $rewrite = array(
            'slug'                  => 'objetive',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        
        $args = array(
            'label'                 => __( 'okr_objetive' ),
            'description'           => __( 'okr_objetive' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-superhero-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
    
        register_post_type( 'okr_objetive', $args );
    
        // Key Result
        $labels = array(
            'name'                  => _x( 'Key Results', 'Post Type General Name' ),
            'singular_name'         => _x( 'Key Result', 'Post Type Singular Name' ),
            'menu_name'             => __( 'Key Results' ),
            'name_admin_bar'        => __( 'Key Results' ),
            'archives'              => __( 'Listado Key Results' ),
            'attributes'            => __( 'Atributos' ),
            'parent_item_colon'     => __( 'Key Result padre:' ),
            'all_items'             => __( 'Todos los Key Results' ),
            'add_new_item'          => __( 'Añadir nuevo Key Result' ),
            'add_new'               => __( 'Añadir nuevo' ),
            'new_item'              => __( 'Nuevo Key Result' ),
            'edit_item'             => __( 'Editar Key Result' ),
            'update_item'           => __( 'Actualizar Key Result' ),
            'view_item'             => __( 'Ver Key Result' ),
            'view_items'            => __( 'Ver Key Results' ),
            'search_items'          => __( 'Buscar Key Result' ),
            'not_found'             => __( 'No encontrado' ),
            'not_found_in_trash'    => __( 'No encontrado en la papelera' ),
            'featured_image'        => __( 'Imagen destacada' ),
            'set_featured_image'    => __( 'Establecer imagen destacada' ),
            'remove_featured_image' => __( 'Borrar imagen destacada' ),
            'use_featured_image'    => __( 'Usar como imagen destacada' ),
            'insert_into_item'      => __( 'Insertar en Key Results' ),
            'uploaded_to_this_item' => __( 'Subir a Key Results' ),
            'items_list'            => __( 'Listado Key Results' ),
            'items_list_navigation' => __( 'Listado Key Results' ),
            'filter_items_list'     => __( 'Filtrado Key Results' ),
        );
        
        $rewrite = array(
            'slug'                  => 'key-result',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        
        $args = array(
            'label'                 => __( 'okr_kr' ),
            'description'           => __( 'okr_kr' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array(),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-chart-area',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
            'register_meta_box_cb'  => array( __CLASS__, 'okr_register_meta_box_key_result' )
        );
    
        register_post_type( 'okr_kr', $args );
    }
    
    public static function okr_register_tax() {
        $labels = array(
            'name' => __( 'Cycles' ),
            'singular_name' => __( 'Cycle' ),
            'search_items' =>  __( 'Buscar Cycles' ),
            'popular_items' => __( 'Cycles frecuentes' ),
            'all_items' => __( 'Todas las Cycles' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Editar Cycle' ),
            'update_item' => __( 'Actualizar Cycle' ),
            'add_new_item' => __( 'Añadir nueva Cycle' ),
            'new_item_name' => __( 'Nuevo nombre de Cycle' ),
            'separate_items_with_commas' => __( 'Separar Cycles por comas' ),
            'add_or_remove_items' => __( 'Añadir o eliminar Cycle' ),
            'choose_from_most_used' => __( 'Elegir entre los cargos más frecuentes' ),
            'menu_name' => __( 'Cycles' ),
        );
        register_taxonomy( 'okr_cycle',
            'okr_objetive', array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'show_in_rest'      => true,
                'rewrite'           => array( 'slug' => 'cycle', 'hierarchical' => true ),
        ));
    }
    
    public static function okr_register_meta_box_key_result() {
        add_meta_box(
            'okr-keyresult-attributes',
            __( 'Attributes' ),
            array( __CLASS__, 'okr_hey_result_meta_box_callback' )
        );
    }
    public static function okr_hey_result_meta_box_callback( $post ) {
    
        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'okr_hey_result_nonce', 'okr_hey_result_nonce' );
    
        $value = get_post_meta( $post->ID, 'okr_key_result_objetive', true );
        $completed = get_post_meta( $post->ID, 'okr_key_result_completed', true );
    
        // Objetives
        ?>
        <h3>OKR: Objetive</h3>
        <select name="okr_key_result_objetive">
        <?php
            $objetives = get_posts(
                array(
                    'post_type' => 'okr_objetive',
                    'numberposts' => -1
                )
            );
            if ( $objetives ) {
                foreach ( $objetives as $objetive ) {
                    ?>
                    <option value="<?php echo $objetive->ID;?>" <?php echo ($value == $objetive->ID) ? 'selected="selected"' : '';?>><?php echo get_the_title($objetive);?></option>
                    <?php
                }
            }
        ?>
        </select>
        <?php
    
        // Completed
        ?>
        <h3><span id="value_completed"><?php echo $completed;?></span> % completed</h3>
        <input type="range" name="okr_key_result_completed" value="<?php echo $completed;?>" min="0" max="100" oninput="document.getElementById('value_completed').textContent = this.value">
        <?php
    }
    
    
    
    // Save_post
    public static function save_key_result_meta_box_data( $post_id ) {
    
        // Check if our nonce is set.
        if ( ! isset( $_POST['okr_hey_result_nonce'] ) ) {
            return;
        }
    
        // Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $_POST['okr_hey_result_nonce'], 'okr_hey_result_nonce' ) ) {
            return;
        }
    
        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
    
        // Check the user's permissions.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    
        // Objetive
        // ---------
        if ( ! isset( $_POST['okr_key_result_objetive'] ) ) {
            return;
        }
        $my_data = intval( $_POST['okr_key_result_objetive'] );
        update_post_meta( $post_id, 'okr_key_result_objetive', $my_data );
    
        // Completed
        // ---------
        if ( ! isset( $_POST['okr_key_result_completed'] ) ) {
            return;
        }
        $my_data = intval( $_POST['okr_key_result_completed'] );
        update_post_meta( $post_id, 'okr_key_result_completed', $my_data );
    
    }
    
}
OKR_CPT::init();