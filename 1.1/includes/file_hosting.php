<?php
/*
 |----------------------------------|
|	PadsanSystem					|
|-----------------------------------|
|	Uploadcenter Version			|
|-----------------------------------|
|	Web   : www.PadsanSystem.com	|
|	Email : Info@PadsanSystem.com	|
|	Tel   : +98 - 26 325 45 700		|
|	Fax   : +98 - 26 325 45 701		|
|-----------------------------------|
*/
if(isset($_POST['send_file'])){
	// Include class ftp_upload
	include_once CLASSES."class.ftp_upload.php";
	
	// Servers
	$rand_address="misnotary.ir";
	$rand_username="upload.misnotary";
	$rand_password="b,=NeF;gTq{!";
	
	// Files
	$type=get_type($_FILES['file_hosting']['name']);
	$size=$_FILES['file_hosting']['size'];
	
	// Generate name
	$name=random_text("number");
	
	// String of name and type file
	$name=$name.".".$type;
	$size=$_FILES['file_hosting']['size'];
	
	// Create object as ftp_upload
	$ftp_upload=new ftp_upload();
	
	// FTP folder
	$ftp_upload->user_ftp=$rand_username;
	
	// FTP password
	$ftp_upload->pwd_ftp=$rand_password;
	
	// FTP host address
	$ftp_upload->hostadd=$rand_address;
	
	// Initialize FTP server
	$ftp_upload->initialize();
	
	// Upload file in FTP Server
	$ftp_upload->upload($_FILES['file_hosting']['tmp_name'], $name);
	
	// Close ftp connection
	$ftp_upload->close_connection();
	
	if(iMEMBER){
		$attachment_view_user="'".$userdata['user_id']."'";
	}else{
		$attachment_view_user='NULL';
	}
	
	$result=dbquery("SELECT * FROM ".DB_PREFIX."attachments_exts WHERE attachment_ext_name='$type'");
	$data=dbarray($result);
	
	$attachment_folder='NULL';

	dbquery("INSERT INTO ".DB_PREFIX."attachments (attachment_uid, attachment_size, attachment_address, attachment_ext, attachment_server, attachment_folder, attachment_user, attachment_time, attachment_ip, attachment_status) VALUES ('$name', '$size', '$name', '".$data['attachment_ext_id']."', '1', $attachment_folder, $attachment_view_user, '".time()."', '".get_ip()."', 'Enable')");
	
}
?>