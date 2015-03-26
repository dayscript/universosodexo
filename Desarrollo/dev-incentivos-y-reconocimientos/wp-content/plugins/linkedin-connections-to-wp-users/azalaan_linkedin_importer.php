<style>
.azalaan_linkedin_importer
{
		-webkit-box-shadow: 0px 0px 18px rgba(50, 50, 50, 0.75);
		-moz-box-shadow:    0px 0px 18px rgba(50, 50, 50, 0.75);
		box-shadow:         0px 0px 18px rgba(50, 50, 50, 0.75);
		border: 1px solid #CCCDCC;
		padding: 20px;
		margin-top: 5%;
		width: 60%;
}
.form_input_file
{
width: 100%; 
padding: 15px;
}
.form_input_checkbox
{
width: 100%; 
padding: 15px;
}

</style>
<div class="wrap">
<div class="azalaan_linkedin_importer">
<?php 
 
if($_POST['azalaan_hidden']=='Y')
{ 
global $wpdb;
$fieldseparator = ",";
$lineseparator = "\n";
$file = $_FILES['linke_din_contacts'];
$csv_file_name = $file['name'];
$pathfile= plugin_dir_path( __FILE__ );
$path =$pathfile. "/csvimports/" . basename($csv_file_name);
move_uploaded_file($file['tmp_name'], $path); 

$csvfile =$pathfile. "/csvimports/".$csv_file_name;
if(!file_exists($csvfile)) {
	echo "File not found. Make sure you specified the correct path.\n";
	exit;
}

$file = fopen($csvfile,"r");

if(!$file) {
	echo "Error opening data file.\n";
	exit;
}
$size = filesize($csvfile);

if(!$size) {
	echo "File is empty.\n";
	exit;
}

$csvcontent = fread($file,$size);

fclose($file);
 
$lines = 0;
$queries = "";
$linearray = array();
$not_imported=0;
foreach(split($lineseparator,$csvcontent) as $line) {
	$lines++;
	$line = trim($line," \t");	
	$line = str_replace("\r","",$line);  
	$linearray = explode($fieldseparator,$line);
	$first_name=str_replace('"','',$linearray[1],$i); 
	$user_login= $first_name;	 
	 $email_address=str_replace('"','',$linearray[5],$i);
		if($lines!=1)
		{ 
		  			$user_id = username_exists( $user_login );
					if ( !$user_id and email_exists($email_address) == false ) 
					{
					$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
					$user_id = wp_create_user( $user_login, $random_password, $email_address );
						if($_POST['send_notification_email']=='send')
						{
								wp_new_user_notification( $user_id, $random_password );
						}
					} 
					else
					{ 
					$not_imported++;
					}
			 
		}
} 
$lines=$lines-1;
$message= "Imported $lines Numbers of Users. And $not_imported were already exists as username!";
?>
  			 <div class="updated">
            <p><?php echo $message;?></p>
            </div>
<?php
}
 
?> 
			
<?php    echo "<h2>" . __( 'Import Linkedin Connections from .csv file', 'add_links' ) . "</h2>"; ?>
            
         
 <form name="azalaan_importer_form" enctype="multipart/form-data" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="azalaan_hidden" value="Y">
				 <div class="form_input_file">
					<label>Import Your CSV Here :</label>
                    <input type="file" name="linke_din_contacts"  />
				</div>
                
                 <div class="form_input_checkbox">
                
                <input type="checkbox" name="send_notification_email" value="send" />
				<label>Send notification emails with username and passwords to imported contacts </label>
                 </div>
				<p class="submit">
 <input type="submit" class="button button-primary" name="Submit" style="margin-left:10px;" value="<?php _e('Import Users', 'import_users' ) ?>" />
				</p>
			</form>
            
            Download your Linkedin Connection <a href="http://www.linkedin.com/people/connections?trk=nav_responsive_tab_network"> CSV</a>   |  Click Export Connections on the bottom of page.

</div>
</div>