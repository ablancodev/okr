<?php
class OKR_Shortcodes {

    public static function init() {
        add_shortcode( 'okr', array( __CLASS__, 'okr_list') ); 
    }

    public static function okr_list() {
        $output = '';
        $objetives = get_posts(array(
            'post_type' => 'okr_objetive',
            'numberposts' => -1,
        ));

        if ( !$objetives ) {
            $output .= "<h3>No tiene objetivos definidos aún. Pruebe a crear alguno.</h3>";
            return $output;
        }
        
        foreach ( $objetives as $objetive ) {
            $output .= '<div class="row">';
            $output .= '<div class="col-12 bg-primary text-light">' . get_the_title($objetive) . '</div>';

            // KR
            $args = array(
                'meta_query' => array(
                    array(
                        'key' => 'okr_key_result_objetive',
                        'value' => $objetive->ID
                    )
                ),
                'post_type' => 'okr_kr',
                'posts_per_page' => -1
            );
            $krs = get_posts($args);
            if ( $krs ) {
                foreach ( $krs as $kr ) {
                    $output .= '<div class="col-12">' . get_the_title($kr) . '</div>';
                    $kr_value = get_post_meta($kr->ID, 'okr_key_result_completed', true);
                    $bg_progress = '';
                    if ( $kr_value <= 50 ) {
                        $bg_progress = 'bg-danger';
                    } else if ( $kr_value <= 75 ) {
                        $bg_progress = 'bg-warning';
                    } else {
                        $bg_progress = 'bg-success';
                    }
                    if ( $kr_value ) {
                        $output .= '
                        <div class="col-12">
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar ' . $bg_progress . '" role="progressbar" style="width: ' . $kr_value . '%;" aria-valuenow="' . $kr_value . '" aria-valuemin="0" aria-valuemax="100">' . $kr_value . '%</div>
                            </div>
                        </div>
                        ';
                    }
                }
            }
        
            $output .= '</div>'; // row
        }
        
        return $output;
    }

}
OKR_Shortcodes::init();