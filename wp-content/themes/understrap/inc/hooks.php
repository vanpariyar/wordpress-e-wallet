<?php
/**
 * Custom hooks.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

if ( ! function_exists( 'understrap_add_site_info' ) ) {
	add_action( 'understrap_site_info', 'understrap_add_site_info' );

	/**
	 * Add site info content.
	 */
	function understrap_add_site_info() {
		$the_theme = wp_get_theme();

		$site_info = sprintf(
			'<a href="%1$s">%2$s</a><span class="sep"> | </span>%3$s(%4$s)',
			esc_url( __( 'http://wordpress.org/', 'understrap' ) ),
			sprintf(
				/* translators:*/
				esc_html__( 'Proudly powered by %s', 'understrap' ),
				'WordPress'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ),
				$the_theme->get( 'Name' ),
				'<a href="' . esc_url( __( 'http://understrap.com', 'understrap' ) ) . '">understrap.com</a>'
			),
			sprintf( // WPCS: XSS ok.
				/* translators:*/
				esc_html__( 'Version: %1$s', 'understrap' ),
				$the_theme->get( 'Version' )
			)
		);

		echo apply_filters( 'understrap_site_info_content', $site_info ); // WPCS: XSS ok.
	}
}

function add_custom_user(){

// Add a custom user role

global $wp_roles;
if ( ! isset( $wp_roles ) )
	$wp_roles = new WP_Roles();

$sub = $wp_roles->get_role('contributor');
//Adding a 'new_role' with all subscriber caps
$capability =  $sub->capabilities;

$capability = array_merge($capability, array('edit_gallery' => 1 ,  
'edit_galleries' => 1 , 
'edit_other_galleries' => 1 , 
'publish_galleries' => 1 , 
'see_transaction' => 1 , 
'read_private_galleries' => 1 , 
'delete_gallery' => 1 ) );
// print_r($capability);
// die();
$wp_roles->add_role('wallet_user', 'Wallet User', $capability );

}
add_action( 'init', 'add_custom_user', 999 );


function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_option", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_layout_element()
{
	?>
		<input type="checkbox" name="theme_layout" value="1" <?php checked(1, get_option('theme_layout'), true); ?> /> 
	<?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("theme_layout", "Do you want the layout to be responsive?", "display_layout_element", "theme-options", "section");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "theme_layout");
}

add_action("admin_init", "display_theme_panel_fields");
function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

add_action("wp_ajax_send_money", "send_money");
add_action("wp_ajax_nopriv_send_money", "my_must_login");
function send_money() {
	// return var_dump($_POST);
	$user_id = $_POST['user_id'];
	$send_user = $_POST['send_user'];
	$type = $_POST['type'];
	$amount = $_POST['amount'];
	$wallet_balance = get_user_meta( $user_id, 'wallet_balance', TRUE );
	$transection_1 = array();
	($transection_1 = get_user_meta( $user_id, 'transaction', TRUE )) ? '' : ($transection_1 = update_user_meta( $user_id, 'transaction', '' ));
	($transection_2 = get_user_meta( $user_id, 'transaction', TRUE )) ? '' : ($transection_2 = update_user_meta( $user_id, 'transaction', '' ));

	if( $type == 'send' ){
	
		if($wallet_balance < $amount){
			return 302;
		}else{
			$wallet_balance -= $amount;
			update_user_meta( $user_id, 'wallet_balance', $wallet_balance );
			$temp = array('date'=>current_time( 'timestamp' ), 'amount'=> $amount, 'type'=> $type );
			array_push($transection_1, $temp);
			update_user_meta( $user_id, 'transaction', $transection_1 );

		}


		
	}

	die();
 
 }
 
 function my_must_login() {
	echo "You must log in to vote";
	die();
 }