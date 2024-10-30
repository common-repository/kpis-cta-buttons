<?php
if ( ! defined( 'ABSPATH' ) ) { exit; /* Exit if accessed directly. */ }
function kpis_cta_buttons_manutencion_rotina_callback()  {

/* check update */
if ( isset( $_POST["kpis_cta_setup_submit"] ) and $_POST["kpis_cta_setup_submit"]=="enviar_setup" ){

if ( ! isset( $_POST['kpis_cta_enviar_nonce'] ) || ! wp_verify_nonce( $_POST['kpis_cta_enviar_nonce'], 'code_kpis_cta_valornonce' ) ) {
   _e( 'Sorry, has a error. Try again.', 'kpis-cta-buttons' );
   exit;
} else {

// updates
if ( isset( $_POST['kpis_cta_active'])<>"1" )		{$kpis_cta_active="0";}else{$kpis_cta_active="1"; }    
													update_option(	'kpis_cta_active',filter_var($kpis_cta_active, FILTER_SANITIZE_NUMBER_INT ));

if (isset($_POST['kpis_cta_phone_number']))     	{ update_option(	'kpis_cta_phone_number',		sanitize_text_field($_POST['kpis_cta_phone_number']) ); } else { delete_option( 'kpis_cta_phone_number' );                  }
													update_option(	'kpis_cta_phone_class',sanitize_text_field($_POST['kpis_cta_phone_class']) );

if (isset($_POST['kpis_cta_wts_country_number'])) 	{ update_option(	'kpis_cta_wts_country_number',	sanitize_text_field($_POST['kpis_cta_wts_country_number'])	); } else { delete_option( 'kpis_cta_wts_country_number' );     }
if (isset($_POST['kpis_cta_phone_number']))     	{ update_option(	'kpis_cta_wts_number',			sanitize_text_field($_POST['kpis_cta_wts_number'])	); } else { delete_option( 'kpis_cta_wts_number' );                     }
													update_option(	'kpis_cta_whatsapp_class',sanitize_text_field($_POST['kpis_cta_whatsapp_class']) );

if (isset($_POST['kpis_cta_url_contact_page'])) 			{ update_option(	'kpis_cta_url_contact_page',			sanitize_url(htmlentities(stripslashes($_POST['kpis_cta_url_contact_page'])))			);  } else { delete_option( 'kpis_cta_url_contact_page' );			}
if (isset($_POST['kpis_cta_anchor_text_contact_page'])) 	{ update_option(	'kpis_cta_anchor_text_contact_page',	sanitize_text_field($_POST['kpis_cta_anchor_text_contact_page'])	);                      } else { delete_option( 'kpis_cta_anchor_text_contact_page' );	}
															  update_option(	'kpis_cta_url_class',   sanitize_text_field($_POST['kpis_cta_url_class']) );

}
}
echo '<h1>'. __( 'Cta Buttons', 'kpis-cta-buttons').'</h1><hr>';
?>
<div class=wrap>
<div id=div-col-left> 
	<div id=div-col-overview>
		<div class=inner>
			<h2><?php _e( 'Settings', 'kpis-cta-buttons' ); ?></h2>
			<form method="POST" action="admin.php?page=manutencion-cta-buttons">
				<table class="widefat fixed">
					<tbody>
						<tr class="alternate">
						<td class="column-columnname" colspan="3">
						<p>
						<label class="slider-switch"><input type="checkbox" id="kpis_cta_active"  name="kpis_cta_active"  value="1" <?php if (get_option('kpis_cta_active') =="1") { echo "checked";} ?>><span class="slider round"></span></label>
						<label><?php _e( 'Active to show a CTA float', 'kpis-cta-buttons' ); ?> </label>
						</p>
						</td>
						</tr>
						<tr class="alternate">
							<td class="column-columnname" colspan=2>
								<label><?php _e( 'Phone', 'kpis-cta-buttons' ); ?>: </label>
								<input type=text name=kpis_cta_phone_number id=kpis_cta_phone_number class=large-text placeholder="<?php __( 'type a number. Use only numero and no put special characters', 'kpis-cta-buttons' ); ?>"   maxlength="15"  value="<?php echo get_option('kpis_cta_phone_number')?>" required /> 
							</td>
							<td class="column-columnname">
								<label><?php _e( 'Position', 'kpis-cta-buttons' ); ?>: </label>
								<select class="form-control large-text" id="kpis_cta_phone_class" name="kpis_cta_phone_class" required>
								<option value="fixed" <?php if (get_option('kpis_cta_phone_class')=="fixed") { echo "selected"; } ?>><?php _e( 'Fixed', 'kpis-cta-buttons' ); ?></option>
								<option value="nofixed" <?php if (get_option('kpis_cta_phone_class')=="nofixed") { echo "selected"; } ?>><?php _e( 'No Fixed', 'kpis-cta-buttons' ); ?></option>
								</select>
							</td>
						</tr>
						<tr class="alternate">
							<td class="column-columnname">
								<label><?php _e( 'Country Code', 'kpis-cta-buttons' ); ?>: </label>
								<input type=number name=kpis_cta_wts_country_number id=kpis_cta_wts_country_number class=large-text placeholder="<?php __( 'type the whatsapp number XXYY123456789. Do not need +', 'kpis-cta-buttons' ); ?>"   maxlength="3"  value="<?php echo get_option('kpis_cta_wts_country_number')?>" />						
							</td>
							<td class="column-columnname">
								<label><?php _e( 'Number of whatsapp', 'kpis-cta-buttons' ); ?>: </label>
								<input type=text name=kpis_cta_wts_number id=kpis_cta_wts_number class=large-text placeholder="<?php __( 'type the whatsapp number XXYY123456789. Do not need +', 'kpis-cta-buttons' ); ?>"   maxlength="15"  value="<?php echo get_option('kpis_cta_wts_number')?>" />
							</td>
							<td class="column-columnname">
								<label><?php _e( 'Position', 'kpis-cta-buttons' ); ?>: </label>	    
								<select class="form-control large-text" id="kpis_cta_whatsapp_class" name="kpis_cta_whatsapp_class" required>
								<option value="fixed" <?php if (get_option('kpis_cta_whatsapp_class')=="fixed") { echo "selected"; } ?>><?php _e( 'Fixed', 'kpis-cta-buttons' ); ?></option>
								<option value="nofixed" <?php if (get_option('kpis_cta_whatsapp_class')=="nofixed") { echo "selected"; } ?>><?php _e( 'No Fixed', 'kpis-cta-buttons' ); ?></option>
								</select>
							</td>
						</tr>
						<tr class="alternate">
							<td class="column-columnname">
								<label for="kpis_cta_url_contact_page"><?php _e( 'Paste here your contact page url', 'kpis-cta-buttons' ); ?></label>
								<input type=text name=kpis_cta_url_contact_page id=kpis_cta_url_contact_page class=large-text   value="<?php echo html_entity_decode(get_option('kpis_cta_url_contact_page'));?>" />
							</td>
							<td class="column-columnname">
								<label for="kpis_cta_anchor_text_contact_page"><?php _e( 'Anchor text', 'kpis-cta-buttons' ); ?></label>
								<input type=text name=kpis_cta_anchor_text_contact_page id=kpis_cta_anchor_text_contact_page class=large-text  maxlength="15" value="<?php echo get_option('kpis_cta_anchor_text_contact_page');?>" />
							</td>
							<td class="column-columnname">
								<label><?php _e( 'Position', 'kpis-cta-buttons' ); ?>: </label>	    
								<select class="form-control large-text" id="kpis_cta_url_class" name="kpis_cta_url_class" required>
								<option value="fixed" <?php if (get_option('kpis_cta_url_class')=="fixed") { echo "selected"; } ?>><?php _e( 'Fixed', 'kpis-cta-buttons' ); ?></option>
								<option value="nofixed" <?php if (get_option('kpis_cta_url_class')=="nofixed") { echo "selected"; } ?>><?php _e( 'No Fixed', 'kpis-cta-buttons' ); ?></option>
							    </select>
							</td>
						</tr>
						<tr class="alternate">
							<td class="column-columnname" colspan="3">
								<?php submit_button(); ?>
								<input type="hidden" name="kpis_cta_setup_submit" id="kpis_cta_setup_submit" value="enviar_setup" />
								<?php wp_nonce_field( 'code_kpis_cta_valornonce', 'kpis_cta_enviar_nonce' );?>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			<div class="bloco-textos">
			<h3><?php _e( 'Help Info', 'kpis-cta-buttons' ); ?></h3>
			<p>- <?php _e( 'Country code, exemples: Spain = 34, Brazil = 55, EUA = 1', 'kpis-cta-buttons' ); ?></p>
			<p>- <?php _e( 'Use dashes (-) to separate numbers on phone and whatsapp', 'kpis-cta-buttons' ); ?></p>
			<p>- <?php _e( 'Control click to Google TAG Manager', 'kpis-cta-buttons' ); ?>: </p>
			<ul><li><?php _e( 'To control click on phone button use a class', 'kpis-cta-buttons' ); ?>: <strong>btn_ctr_phone</strong></li>
			<li><?php _e( 'To control click on mail button use a class', 'kpis-cta-buttons' ); ?>: <strong>btn_ctr_mail</strong></li>
			<li><?php _e( 'To control click on whatsapp button use a class', 'kpis-cta-buttons' ); ?>: <strong>btn_ctr_whatsapp</strong></li></ul>
			</div>
		</div>
	</div>
</div>
<div id=div-col-right>
	<div class=wp-box>
		<div class=inner>
			<h2><?php echo name_kpis_cta_buttons; ?></h2>
			<p class=version><?php echo version_kpis_cta_buttons; ?></p>
		</div>
		<div class="footer footer-blue">
			<ul class="left">
			<li><?php _e( 'Support', 'kpis-cta-buttons' ); ?> <a href="https://agenciakpis.com" target="_blank" title="Agencia KPIS">Agencia KPIS</a></li>
			</ul>
		</div>
	</div>
</div>
</div>
<?php
}