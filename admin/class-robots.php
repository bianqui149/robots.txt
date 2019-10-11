<?php
/**
 * @author Bianqui Julián
 */
class Robots {
	/**
	 * Used for singleton class
	* @staticvar instance
	*/
	static $instance = null;
	/**
	 * @var constant standarize the save action key
	 */
	/**
	 * Used to keep a singleton of the current class
	 * @return Class
	 */
	public static function instance() {
		if ( ! self::$instance ) :
			$class          = __CLASS__;
			self::$instance = new $class;
		endif;
		return self::$instance;
	}
	/**
	 * Construct the class and initialize some parameters for this one
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu_robots' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'plugin_load_js_and_css' ) );
		add_action( 'do_robotstxt', array( $this, 'allow_directory' ) );
	}
	public function admin_menu_robots() {
		add_options_page( 'Customiza el archivo robots.txt', 'Custom Robots.txt', 'manage_options', 'Robots Custom', array( $this, 'load_fields_for_robots' ) );
	}
	public function plugin_load_js_and_css() {
		wp_enqueue_code_editor( array( 'type' => 'text/html' ) );
		wp_enqueue_script( 'js-code-editor', plugin_dir_url( __FILE__ ) . 'js/code-editor.js', array( 'jquery' ), '', true );
	}
	/**
	 *
	 */
	public function load_fields_for_robots(){ ?>
		<div class="wrap">
			<h2>Scripts</h2>
			<hr />
			<form method="post" action="options.php">
				<?php wp_nonce_field( 'update-options' ); ?>
				<p><strong>Scripts de inicialización</strong><hr /><br /></p>
				<table class="form-table">
					<textarea id="code_editor_page_js" name="custom_robots_txt" rows="20" cols="170">
						<?php echo esc_textarea( get_option( 'custom_robots_txt' ) ); ?>
					</textarea>
				</table>
				<div class="edit-tag-actions">
					<input type="submit" class="button button-primary" name="Submit" value="<?php echo esc_attr( __( 'Guardar Cambios', 'robots.txt' ) ); ?>" />
				</div>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="custom_robots_txt" />
			</form>
		</div>
		<?php
	}
	/**
	 * Sanitize fields
	 */
	public function sanitaze_scripts_fields( $input ) {
		$new_input = array();
		if ( isset( $input['custom_robots_txt'] ) ) {
			$new_input[] = absint( $input['custom_robots_txt'] );
		}
		return $new_input;
	}
	public function allow_directory() {
		$option_robots = get_option('custom_robots_txt' );
		echo esc_html( $option_robots ) . PHP_EOL;
	}
}
$initialize = Robots::instance();
