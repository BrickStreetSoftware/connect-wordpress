<?php
/**
 * Adds VT_Widget widget.
 */
class VT_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'VT_widget', // Base ID
			'VT_Widget', // Name
			array( 'description' => __( 'A VT Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		// titles 
		$title = apply_filters( 'widget_title', $instance['title'] );
		$tfirstname = $instance['firstname'];
		$tlastname = $instance['lastname'];
		$temail = $instance['email'];
		$tcompany = $instance['company'];

		echo $before_widget;
		if ( ! empty( $title ) )
		echo $before_title . $title . $after_title;
		

		// form
		echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
			  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js""></script>
		<script>
				// Use jQuery 
				jQuery(document).ready(function(){
					// validation
					
					jQuery("#born-submit").click(function(){
						jQuery("#contactForm").validate({rules: {
							 vtfname: "required",
							 vtlname: "required",
							 vtemail: {required:true,email:true},
							 vtcompany: {required:true},
						   }
						});
						vtfname = $("#vtfname").val();
						vtlname = $("#vtlname").val();
						vtemail = $("#vtemail").val();
						vtcompany = $("#vtcompany").val();
						//post data 
						data = {action: "myajax-submit",fname:vtfname,lname:vtlname,email:vtemail,company:vtcompany};
						
						if(jQuery("#contactForm").valid()){
							
								$.post("'.admin_url("admin-ajax.php").'",data, function(data) {
									//alert(data); // alerts ajax submitted
									alert("Form submitted successfully !");
								});
							
						}
					 });
				  
				});
			
		</script>
		<style>.error{color:red}</style>
		<div id="sub-form"> <form action="" id="contactForm" class="styled" method="post">

	                        	<label for="vtfname">'.$tfirstname.'</label>
	                            <input type="text" id="vtfname" name="vtfname" value="" sizeclass="required textbox"  size="30" />
								<br />
		                        <label for="vtemail">'.$tlastname.'</label>
		                        <input type="text" tid="vtlname" name="vtlname" value="" class="textbox"  size="30" />
								<br />
								<label for="vtemail">'.$temail.'</label>
		                        <input type="text" id="vtemail" name="vtemail" value="" class="textbox"  size="30" />
								<br />
								<label for="vtcompany">'.$tcompany.'</label>
		                        <input type="text" id="vtcompany" name="vtcompany" value="" class="textbox"  size="30" />
								<br />
		                        <div class="form-section">
		                            <button class="button" tabindex="7" type="button" id="born-submit" name="born-submit">Send Message</button>
		                            <input type="hidden" name="submitted" id="submitted" value="true" />
		                        </div>

		                    </form>
						</div>';
		
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		//title
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Vtaurus Widget', 'text_domain' );
		}
		//first name title
		if ( isset( $instance[ 'firstname' ] ) ) {
			$firstname = $instance[ 'firstname' ];
		}
		else {
			$firstname = __( 'First Name', 'text_domain' );
		}
		
		//first name title
		if ( isset( $instance[ 'lastname' ] ) ) {
			$lastname = $instance[ 'lastname' ];
		}
		else {
			$lastname = __( 'Last Name', 'text_domain' );
		}
		
		//first name title
		if ( isset( $instance[ 'email' ] ) ) {
			$email = $instance[ 'email' ];
		}
		else {
			$email = __( 'Email ', 'text_domain' );
		}
		
		//first name title
		if ( isset( $instance[ 'company' ] ) ) {
			$company = $instance[ 'company' ];
		}
		else {
			$company = __( 'company', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		<!--Frist Name title-->
		<label for="<?php echo $this->get_field_name( 'firstname' ); ?>"><?php _e( 'First name Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'firstname' ); ?>" name="<?php echo $this->get_field_name( 'firstname' ); ?>" type="text" value="<?php echo esc_attr( $firstname ); ?>" />
		<!--Last Name title-->
		<label for="<?php echo $this->get_field_name( 'lastname' ); ?>"><?php _e( 'Last name Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'lastname' ); ?>" name="<?php echo $this->get_field_name( 'lastname' ); ?>" type="text" value="<?php echo esc_attr( $lastname ); ?>" />
		
		<!--Email title-->
		<label for="<?php echo $this->get_field_name( 'email' ); ?>"><?php _e( 'Email Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
		
		<!--Company title-->
		<label for="<?php echo $this->get_field_name( 'company' ); ?>"><?php _e( 'Company Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'company' ); ?>" name="<?php echo $this->get_field_name( 'company' ); ?>" type="text" value="<?php echo esc_attr( $company ); ?>" />
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['firstname'] = ( !empty( $new_instance['firstname'] ) ) ? strip_tags( $new_instance['firstname'] ) : '';
		$instance['lastname'] = ( !empty( $new_instance['lastname'] ) ) ? strip_tags( $new_instance['lastname'] ) : '';
		$instance['email'] = ( !empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['company'] = ( !empty( $new_instance['company'] ) ) ? strip_tags( $new_instance['company'] ) : '';

		return $instance;
	}

} // class VT_Widget
// register VT_Widget widget
function intfoo() { register_widget( 'VT_Widget' ); }
add_action( 'widgets_init',  'intfoo');
// ajax functions 

add_action( 'wp_ajax_myajax-submit', 'myajax_action' );
function myajax_action() {
	//echo "<pre>";
	//print_r($_POST);
	// IMPORTANT: don't forget to "exit"
	echo $response = json_encode( array( 'success' => true,'post'=>$_POST	) );
	exit;
}