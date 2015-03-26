<?php


	$url1 ='control-de-gastos/wp-load.php';
	$url2 ='control-de-gastos/wp-includes/registration.php';

 
	require($url1);
	require_once($url2);

		$UserName = $_POST['name'];
		$UserEmail = $_POST['email'];
		$pass ='';



		$user_id = username_exists($UserName);
		$mail_id = email_exists($email);

		if($user_id || $UserName =="" || $UserName==""){

		global $user_exist;
		$user_exist = $user_id;
		$error = "user";
		}

		if ( $mail_id || $mail == "" ) {

		global $mail_exist;
		$mail_exist = $mail_id;
		$error = "mail";

		}

		if ( isset($errore) ) {
		           
		 }else {
		        $random_pass = wp_generate_password( 12, false );

		    	if ( $pass == '' ) { $pass = $random_pass; }        

		    	$userdata = array(
		                        'user_pass' => $pass,
		                        'user_login' => $UserName,
		                        'user_url' => '',
		                        'user_email' => $UserEmail,
		                        'first_name' => $UserName,
		                        'last_name' => '',
		                        'description' => '',
		                        'role' => 'subscriber',
		                        'twitter' => '',
		                        'feed' => '',
		                );
		                $user_id = wp_insert_user( $userdata );

		                update_user_meta( $user_id, 'twitter', '');
		                update_user_meta( $user_id, 'feed', '');

		                echo "Se a registrado correctamente";

}




/*$my_post = array( 
  'post_title'    => 'My post',
  'post_content'  => 'This is my post.',
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_category' => array(8,39)
);

// Insert the post into the database
if(wp_insert_post( $my_post )){
echo "si";
}
else{
	echo "no";
}*/

?>
