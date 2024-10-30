<?php
/**
 * Check if this the user has a premium liscense
 */
if ( ! function_exists( 'kcb_fs' ) ) {
    // Create a helper function for easy SDK access.
    function kcb_fs() {
        global $kcb_fs;

        if ( ! isset( $kcb_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $kcb_fs = fs_dynamic_init( array(
                'id'                  => '11416',
                'slug'                => 'kpis-cta-buttons',
                'type'                => 'plugin',
                'public_key'          => 'pk_c7d8e1a3e34fbe9e9255e2f567b39',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'manutencion-cta-buttons',
                    'first-path'     => 'admin.php?page=manutencion-cta-buttons',
                    'account'        => false,
                    'contact'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $kcb_fs;
    }

    // Init Freemius.
    kcb_fs();
    // Signal that SDK was initiated.
    do_action( 'kcb_fs_loaded' );
}