<?php
/**
 * Adds VT_Widget widget.
 */
class BrickSt_Subscribe_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'brickst_subscribe_widget', // Base ID
			'BrickSt_Subscribe_Widget', // Name
			array( 'description' => __( 'A Brick Street Connect Subscribe Widget', 'text_domain' ), ) // Args
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
							 
						   }
						});
						vtfname = $("#vtfname").val();
						vtlname = $("#vtlname").val();
						vtemail = $("#vtemail").val();
						vtcompany = $("#vtcompany").val();
						
						
						data = {action: "myajax-submit",fname:vtfname,lname:vtlname,email:vtemail,company:vtcompany};
						
						if(jQuery("#contactForm").valid()){
							
								$.post("'.admin_url("admin-ajax.php").'",data, function(data) {
									//alert(data); // alerts ajax submitted
									alert("Form Submit Successfully !");
								});
							
						}
					 });
				  
				});
			
		</script>
		<div id="sub-form"> <form action="" id="contactForm" class="styled" method="post">

	                        	<label for="vtfname">'.$tfirstname.'</label>
	                            <input type="text" id="vtfname" name="vtfname" value="" sizeclass="required textbox"  size="30" />

		                        <label for="vtemail">'.$tlastname.'</label>
		                        <input type="text" id="vtlname" name="vtlname" value="" class="textbox"  size="30" />

								<label for="vtemail">'.$temail.'</label>
		                        <input type="text" id="vtemail" name="vtemail" value="" class="textbox"  size="30" />
								
								<label for="vtcompany">'.$tcompany.'</label>
		                        <input type="text" id="vtcompany" name="vtcompany" value="" class="textbox"  size="30" />
								
		                        
								
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
		
			//first name title
		
		
		
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
		<!--Conversation id  title-->
		
		<!--Conversation id  title-->
		
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
	
	
	
	
	

} // class BrickSt_Subscribe_Widget

// register BrickSt_Subscribe_Widget widget
function intfoo() { register_widget( 'BrickSt_Subscribe_Widget' ); }
add_action( 'widgets_init',  'intfoo');




// ajax functions 

add_action( 'wp_ajax_nopriv_myajax-submit', 'myajax_action' );
add_action( 'wp_ajax_myajax-submit', 'myajax_action' );
 
function myajax_action() {
	//echo "<pre>";
	//print_r($_POST);
	// IMPORTANT: don't forget to "exit"
$resturl 			= 'https://demoapi.brickst.net/brickstapi/';
$restuser 			= 'apidemo';
$restpass 			= 'DEMO.2013';
$emailaddress 		= $_REQUEST['email'];
$lastname 			= $_REQUEST['lname'];
$firstname 			= $_REQUEST['fname'];
$eventName			= $_REQUEST['company'];	


$httpauth = $restuser . ':' . $restpass;
/*****
check email in customer
*******/
$apiurl = $resturl . 'data/customer/email/'.$emailaddress;
$curl = curl_init($apiurl);
curl_setopt($curl, CURLOPT_HTTPGET, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, $httpauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$jsonresult = null;
try {
  $jsonresult = curl_exec($curl);
  $custmerinfo	=	json_decode($jsonresult);
  print $jsonresult;
 
}
catch (Exception $e) {
  $jsonresult = $e->getMessage() . '<pre>' . $e->getTraceAsString() . '</pre>';
  print $jsonresult;
}
 $customerid	=	$custmerinfo->{'id'};
$email	=	$custmerinfo->{'emailAddress'};
/*****
update information in customer
*******/
if($email!='')
{
$apiurl = $resturl . 'data/customer/id/'.$customerid;
$customer = array(
  'statusCode' => 1,        // new
  'emailAddress' => $emailaddress, 
  'lastName' => $lastname,
  'firstName' => $firstname,
  'attributes' => array(
                        array( 'dataType'=> 12,
                               'name'=>'Email Client Type',
                               'value'=>'UNKNOWN',
                               'type'=>'attribute' )/* ,
                        array( 'dataType'=> 12,
                               'name'=>'Android Registration ID',
                               'value'=>'XXX',
                               'type'=>'attribute' ) */
                         )
                 );
$customer_json = json_encode($customer);
$fp = fopen('php://temp/maxmemory:256000', 'w');
if (!$fp) {
    die('could not open temp memory data');
}
fwrite($fp, $customer_json);
fseek($fp, 0); 
$curl = curl_init($apiurl);
curl_setopt($curl, CURLOPT_PUT, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, $httpauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $customer_json);
curl_setopt($curl, CURLOPT_INFILE, $fp);
curl_setopt($curl, CURLOPT_INFILESIZE, strlen($customer_json));
$jsonresult = null;
try {
	$jsonresult = curl_exec($curl);
	print $jsonresult;
 }
catch (Exception $e) {
  $jsonresult = $e->getMessage() . '<pre>' . $e->getTraceAsString() . '</pre>';
  print $jsonresult;
}
echo $response = json_encode($jsonresult);
}
else
{
/*****
if not email in customer
*******/
$apiurl = $resturl . 'data/customer/';
$customer = array(
  'statusCode' => 1,        // new
  'emailAddress' => $emailaddress, 
  'lastName' => $lastname,
  'firstName' => $firstname,
  'attributes' => array(
                        array( 'dataType'=> 12,
                               'name'=>'Email Client Type',
                               'value'=>'UNKNOWN',
                               'type'=>'attribute' )/* ,
                        array( 'dataType'=> 12,
                               'name'=>'Android Registration ID',
                               'value'=>'XXX',
                               'type'=>'attribute' ) */
							   )
                 );
$customer_json = json_encode($customer);
$curl = curl_init($apiurl);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, $httpauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $customer_json);
$jsonresult = null;
try {
	$jsonresult = curl_exec($curl);
	$custmerinsertinfo	=	json_decode($jsonresult);
	print $jsonresult;
 }
catch (Exception $e) {
  $jsonresult = $e->getMessage() . '<pre>' . $e->getTraceAsString() . '</pre>';
  print $jsonresult;
}
$response = json_encode($jsonresult);
$customerid    =  $custmerinsertinfo->{'id'};
}
/*****
check name in conversation
*******/
if($emailaddress!='')
{
$apiurl = $resturl . 'data/conversation/name/'.$emailaddress;
$curl = curl_init($apiurl);
curl_setopt($curl, CURLOPT_HTTPGET, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, $httpauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$jsonresult = null;
try {
  $jsonresult = curl_exec($curl);
  $getconversation	=	json_decode($jsonresult);
  print $jsonresult;
 }
catch (Exception $e) {
  $jsonresult = $e->getMessage() . '<pre>' . $e->getTraceAsString() . '</pre>';
  print $jsonresult;
}
$conversationid	=	$getconversation->{'id'};
/*****
post info  in conversation
*******/
if($conversationid=='')
{
$apiurl = $resturl . 'data/conversation/';
$conversation = array(
  'name' => $emailaddress, 
  'departmentID' => 100,
  'senderID' => 0,
  'signingEnabled' => false, 
  'mailFarmID' => 1, 
  'receiverDomain' => 1 
                 );
$conversation_json = json_encode($conversation);
$curl = curl_init($apiurl);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, $httpauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $conversation_json);
$jsonresult = null;
try {
  $jsonresult = curl_exec($curl);
  $conversationinsertinfo	=	json_decode($jsonresult);
  print $jsonresult;
}
catch (Exception $e) {
  $jsonresult = $e->getMessage() . '<pre>' . $e->getTraceAsString() . '</pre>';
  print $jsonresult;
}
echo $response 	= json_encode($jsonresult);
$conversationid	=	$conversationinsertinfo->{'id'};
}
}
/*****
update Subscription in customer
*******/
if($conversationid != '' &&  $customerid !='')
{
$apiurl = $resturl . 'data/customer/subscribe/id/'.$customerid.'/conversation_id/'.$conversationid;
$curl = curl_init($apiurl);
curl_setopt($curl, CURLOPT_PUT, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, $httpauth);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$jsonresult = null;
try {
	$jsonresult = curl_exec($curl);
	print $jsonresult;
 }
catch (Exception $e) {
  $jsonresult = $e->getMessage() . '<pre>' . $e->getTraceAsString() . '</pre>';
  print $jsonresult;
}
echo $response = json_encode($jsonresult);
}


}