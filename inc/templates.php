<?php
if ( ! defined( 'ABSPATH' ) ) {exit; /* Exit if accessed directly. */ }
/* frontend show buttons */
function kpis_div_custom_cta() {
	$classcolmobilecss ="0";
	if ( get_option('kpis_cta_phone_number') )		{$classcolmobilecss +="1"; }
	if ( get_option('kpis_cta_url_contact_page') )	{$classcolmobilecss +="1"; }
	if ( get_option('kpis_cta_wts_number') ) 		{$classcolmobilecss +="1"; }
	
	if (get_option('kpis_cta_anchor_text_contact_page'))	{$texto2= esc_html(get_option('kpis_cta_anchor_text_contact_page'));} else { $texto2= esc_html( __( 'Contact US', 'kpis-cta-buttons' )); }
?>
<div id="mySidenavr" class="sidenavr">
<?php if (get_option('kpis_cta_phone_number'))		{ ?>
	<a target="_blank" rel="nofollow noopener" href="tel:<?php echo esc_html(preg_replace("/[^0-9.]/", '', get_option('kpis_cta_phone_number') ));?>" id="Sidenavphone" class="<?php echo esc_html($classcolmobilecss)."col"; ?> <?php echo esc_html(get_option('kpis_cta_phone_class'));?> btn_ctr_phone" aria-label="<?php echo esc_html(get_option('kpis_cta_phone_number'));?>">
		<div class="vertical-center">
			<img src="<?php echo KPIS_CTA_BUTTONS_URL. 'assets/images/phone_18x18.svg'; ?>" class="iconcta" height="18" width="18" alt="cta <?php echo esc_html(get_option('kpis_cta_phone_number'));?>">
			<p><?php echo esc_html(get_option('kpis_cta_phone_number'));?></p>
		</div>
	</a>
<?php }?>
<?php if (get_option('kpis_cta_url_contact_page'))	{ ?>
	<a href="<?php echo esc_url(html_entity_decode(get_option('kpis_cta_url_contact_page')));?>" id="Sidenavmail" class="<?php echo esc_html($classcolmobilecss)."col"; ?> <?php echo esc_html(get_option('kpis_cta_whatsapp_class'));?> btn_ctr_mail" aria-label="<?php echo $texto2;?>">
		<div class="vertical-center">
			<img src="<?php echo KPIS_CTA_BUTTONS_URL. 'assets/images/envelope-regular.svg'; ?>" class="iconcta" height="18" width="18" alt="cta <?php echo $texto2; ?>">
			<p><?php echo $texto2; ?></p>
		</div>
	</a>
<?php }?>
<?php if (get_option('kpis_cta_wts_number')) 		{ ?>
	<a target="_blank" rel="nofollow noopener" href="https://wa.me/<?php echo esc_html(str_replace(' ', '',get_option('kpis_cta_wts_country_number')));?><?php echo esc_html(preg_replace("/[^0-9.]/", '', get_option('kpis_cta_wts_number')));?>" id="Sidenavwhatsapp" class="<?php echo esc_html($classcolmobilecss)."col"; ?> <?php echo esc_html(get_option('kpis_cta_whatsapp_class'));?> btn_ctr_whatsapp" aria-label="Whatsapp <?php echo esc_html(get_option('kpis_cta_wts_number'));?>">
		<div class="vertical-center">
			<img src="<?php echo KPIS_CTA_BUTTONS_URL. 'assets/images/whatsapp.svg'; ?>" class="iconcta" height="18" width="18" alt="cta <?php echo esc_html(get_option('kpis_cta_wts_number'));?>">
			<p><?php echo esc_html(get_option('kpis_cta_wts_number'));?></p>
		</div>
	</a>
<?php }?>
</div>
<?php
}
add_action ( 'wp_footer', 'kpis_div_custom_cta',200);