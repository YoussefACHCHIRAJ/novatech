<?php
function vaximo_function_pcs() {
	$vaximo_live_status = get_option( 'vaximo_live_status' );
	$purchase_code = get_option('vaximo_purchase_valid_code');

	if($vaximo_live_status == 'true' || isset($_GET['lk-refresh'])){
		if(isset($_COOKIE['VAXIMO_PKCODENO'])) {
			$purchase_code = $_COOKIE['VAXIMO_PKCODENO'];
			update_option('vaximo_purchase_valid_code',  $purchase_code, 'yes');
			update_option('vaximo_live_status',  'false', 'yes');
		}
	}
	$purchase_code = str_replace(' ', '', $purchase_code);
	if( $purchase_code != '' ){

		require VAXIMO_ACC_PATH .'/inc/admin/class.verify-purchase.php';
		$o = EnvatoApi2::verifyPurchase( $purchase_code );

		if ( is_object($o) && strpos($o->item_name, 'Vaximo') !== false ) {

			// Check in localhost
			$whitelist = array(
				'127.0.0.1',
				'::1',
				'192.168.1',
				'192.168.0.1',
				'182.168.1.5',
				'192.168.1.4',
				'192.168.1.5',
				'192.168.1.4',
				'192.168',
				'10.0.2.2',
			);

			if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){ // In server
				$url 			= 'https://api.envytheme.com/api/v1/license';
				$purchaseKey 	= $purchase_code;
				$itemName 		= $o->item_name;
				$buyer 			= $o->buyer;
				$purchasedAt 	= $o->created_at;
				$supportUntil 	= $o->supported_until;
				$licenseType 	= $o->licence;
				$domain 		= get_site_url();
				$post_url 		= '';

				$post_url .= $url.'?purchaseKey='.$purchaseKey.'&itemName='.$itemName.'&buyer='.$buyer.'&purchasedAt='.$purchasedAt.'&supportUntil='.$supportUntil.'&licenseType='.$licenseType.'&domain='.$domain.'';

				$post_url = str_replace(' ', '%', $post_url);

				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_URL 			=> $post_url,
					CURLOPT_RETURNTRANSFER 	=> true,
					CURLOPT_ENCODING 		=> "",
					CURLOPT_MAXREDIRS		=> 10,
					CURLOPT_TIMEOUT 		=> 30,
					CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST 	=> "POST",
					CURLOPT_HTTPHEADER 		=> array(
						"cache-control: no-cache",
						"content-type: application/x-www-form-urlencoded"
					),
					CURLOPT_SSL_VERIFYPEER => false,
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					echo "cURL Error #:" . $err;
				} else {
					$json = json_decode($response);
					$already_registered = $json->message[0]; // Already registered

					$new_response = '';
					$new_response .= 'Congratulations! Updated for this domain '.$domain.'';
					preg_match_all('#https?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $already_registered, $match);
					$url 			= $match[0];
					$protocols 		= array('http://', 'http://www.', 'www.', 'https://', 'https://www.');
					$domain_name 	= str_replace( $protocols, '', $url[0] );
					$site_url 		= str_replace( $protocols, '', get_site_url() );

					if( $already_registered != '' ){
						if( $already_registered == $new_response ):
							update_option('vaximo_purchase_code_status', 'valid', 'yes');
							update_option('vaximo_purchase_valid_code',  $purchase_code, 'yes');
							update_option('valid_url', get_site_url(), 'yes');
							?><script>let pkcodeDate = new Date(Date.now() + (7 * 24 * 60 * 60 * 1000));	pkcodeDate = pkcodeDate.toUTCString(); document.cookie = "VAXIMO_PKCODENO=<?php echo $purchase_code; ?>; expires=" + pkcodeDate; </script><?php
						elseif( $domain_name == $site_url ):
							/* Deregister  */
								$url 			= 'https://api.envytheme.com/api/v1/license';
								$purchaseKey 	= $purchase_code;
								$status 		= 'disabled';
								$post_url = '';
								$post_url .= $url.'?purchaseKey='.$purchaseKey.'&status='.$status.'';
								$post_url = str_replace(' ', '%', $post_url);
								$curl = curl_init();
								curl_setopt_array($curl, array(
									CURLOPT_URL 			=> $post_url,
									CURLOPT_RETURNTRANSFER 	=> true,
									CURLOPT_ENCODING 		=> "",
									CURLOPT_MAXREDIRS 		=> 10,
									CURLOPT_TIMEOUT 		=> 30,
									CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST 	=> "PUT",
									CURLOPT_HTTPHEADER 		=> array(
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
									CURLOPT_SSL_VERIFYPEER => false,
								));

								$response = curl_exec($curl);
								$err = curl_error($curl);
								curl_close($curl);
							/* Deregister */

							/* Register */
								$url 			= 'https://api.envytheme.com/api/v1/license';
								$purchaseKey 	= $purchase_code;
								$itemName 		= $o->item_name;
								$buyer 			= $o->buyer;
								$purchasedAt 	= $o->created_at;
								$supportUntil 	= $o->supported_until;
								$licenseType 	= $o->licence;
								$domain 		= get_site_url();
								$post_url 		= '';

								$post_url .= $url.'?purchaseKey='.$purchaseKey.'&itemName='.$itemName.'&buyer='.$buyer.'&purchasedAt='.$purchasedAt.'&supportUntil='.$supportUntil.'&licenseType='.$licenseType.'&domain='.$domain.'';

								$post_url = str_replace(' ', '%', $post_url);

								$curl = curl_init();

								curl_setopt_array($curl, array(
								CURLOPT_URL => $post_url,
								CURLOPT_RETURNTRANSFER => true,
								CURLOPT_ENCODING => "",
								CURLOPT_MAXREDIRS => 10,
								CURLOPT_TIMEOUT => 30,
								CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								CURLOPT_CUSTOMREQUEST => "POST",
								CURLOPT_HTTPHEADER => array(
									"cache-control: no-cache",
									"content-type: application/x-www-form-urlencoded"
								),
								CURLOPT_SSL_VERIFYPEER => false,
								));

								$response = curl_exec($curl);
								$err = curl_error($curl);
								curl_close($curl);
							/* Register */

							update_option('vaximo_purchase_code_status', 'valid', 'yes');
							update_option('vaximo_purchase_valid_code',  $purchase_code, 'yes');
							update_option('valid_url', get_site_url(), 'yes');
							?><script>let pkcodeDate = new Date(Date.now() + (7 * 24 * 60 * 60 * 1000)); pkcodeDate = pkcodeDate.toUTCString(); document.cookie = "VAXIMO_PKCODENO=<?php echo $purchase_code; ?>; expires=" + pkcodeDate; </script><?php
						else:
							$target_site 	= $url[0];
							$src 			= file_get_contents( $target_site );
							preg_match("/\<link rel='stylesheet' id='vaximo-style-css'.*href='(.*?style\.css.*?)'.*\>/i", $src, $matches );

							if( $matches ) { // if theme found
								update_option('vaximo_purchase_code_status', 'already_registered', 'yes');
								update_option('vaximo_already_registered', $already_registered, 'yes');
							}else{
								/* Deregister  */
									$url 			= 'https://api.envytheme.com/api/v1/license';
									$purchaseKey 	= $purchase_code;
									$status 		= 'disabled';
									$post_url = '';
									$post_url .= $url.'?purchaseKey='.$purchaseKey.'&status='.$status.'';
									$post_url = str_replace(' ', '%', $post_url);
									$curl = curl_init();
									curl_setopt_array($curl, array(
										CURLOPT_URL 			=> $post_url,
										CURLOPT_RETURNTRANSFER 	=> true,
										CURLOPT_ENCODING 		=> "",
										CURLOPT_MAXREDIRS 		=> 10,
										CURLOPT_TIMEOUT 		=> 30,
										CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST 	=> "PUT",
										CURLOPT_HTTPHEADER 		=> array(
											"cache-control: no-cache",
											"content-type: application/x-www-form-urlencoded"
										),
										CURLOPT_SSL_VERIFYPEER => false,
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
								/* Deregister */

								/* Register */
									$url 			= 'https://api.envytheme.com/api/v1/license';
									$purchaseKey 	= $purchase_code;
									$itemName 		= $o->item_name;
									$buyer 			= $o->buyer;
									$purchasedAt 	= $o->created_at;
									$supportUntil 	= $o->supported_until;
									$licenseType 	= $o->licence;
									$domain 		= get_site_url();
									$post_url 		= '';

									$post_url .= $url.'?purchaseKey='.$purchaseKey.'&itemName='.$itemName.'&buyer='.$buyer.'&purchasedAt='.$purchasedAt.'&supportUntil='.$supportUntil.'&licenseType='.$licenseType.'&domain='.$domain.'';

									$post_url = str_replace(' ', '%', $post_url);

									$curl = curl_init();

									curl_setopt_array($curl, array(
									CURLOPT_URL => $post_url,
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_ENCODING => "",
									CURLOPT_MAXREDIRS => 10,
									CURLOPT_TIMEOUT => 30,
									CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST => "POST",
									CURLOPT_HTTPHEADER => array(
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
									CURLOPT_SSL_VERIFYPEER => false,
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
								/* Register */
							}
						endif;
					}else {
						update_option('vaximo_purchase_code_status', 'valid', 'yes');
						update_option('vaximo_purchase_valid_code',  $purchase_code, 'yes');
						update_option('valid_url', get_site_url(), 'yes');
						?><script>let pkcodeDate = new Date(Date.now() + (7 * 24 * 60 * 60 * 1000));	pkcodeDate = pkcodeDate.toUTCString(); document.cookie = "VAXIMO_PKCODENO=<?php echo $purchase_code; ?>; expires=" + pkcodeDate; </script><?php
					}
				}

			}else{ // In local
				$domain = get_site_url();
				update_option('vaximo_purchase_code_status', 'valid', 'yes');
				update_option('vaximo_purchase_valid_code',  $purchase_code, 'yes');
				update_option('valid_url',  $domain, 'yes');
				?>
				<script>let pkcodeDate = new Date(Date.now() + (7 * 24 * 60 * 60 * 1000));	pkcodeDate = pkcodeDate.toUTCString(); document.cookie = "VAXIMO_PKCODENO=<?php echo $purchase_code; ?>; expires=" + pkcodeDate; </script>
				<?php
			}
		} elseif( $purchase_code == '' ){
			update_option( 'vaximo_purchase_code_status', '', 'yes' );
			update_option( 'vaximo_purchase_valid_code', '', 'yes' );
		}
	}
}

add_action( 'admin_bar_menu', 'vaximo_header_options', 500 );
function vaximo_header_options ( WP_Admin_Bar $admin_bar ) {
    global $wp;
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if ( strpos($actual_link, 'themes.envytheme.com') != false ):
		update_option('vaximo_purchase_code_status', 'valid', 'yes');
		update_option('vaximo_live_status', 'true', 'yes');
		update_option( 'vaximo_purchase_valid_code', '', 'yes' );
	elseif(get_option( 'vaximo_live_status' ) == 'true'):
		vaximo_function_pcs();
	endif;

	if ( $actual_link == home_url('/wp-admin/admin.php?page=vaximo-activation') ){
		return '';
	}else{
		$site_url 	= get_site_url();
		$valid_url 	= get_option( 'valid_url' );
		$purchase_code 	= get_option( 'vaximo_purchase_valid_code' );
		if( current_user_can('administrator') ) {
			if(!isset($_COOKIE['VAXIMO_PKCODENO'])) {
				vaximo_function_pcs();
			}elseif( $site_url !=  $valid_url) {
				vaximo_function_pcs();
			}
		}
	}
}

if(isset($_GET['lk-refresh'])) {
	vaximo_function_pcs();
}