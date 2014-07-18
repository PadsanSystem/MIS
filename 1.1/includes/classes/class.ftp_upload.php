<?php
/*
|-----------------------------------|
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
class ftp_upload{
	var $conn;
	var $auth;
	var $user_ftp;
	var $pwd_ftp;
	var $hostadd;
	var $pasv;
	
	// Initialize the ftp connection
	function initialize(){
		$this->conn=@ftp_connect($this->hostadd, 21) or die("Error!!! can't connect to ftp server");
		$this->auth=@ftp_login($this->conn, $this->user_ftp, $this->pwd_ftp) or die("Error!!! invalid authentication");
		$this->pasv=@ftp_pasv($this->conn, TRUE) or die("ERROR FTP->PASV [$this->conn]");
	}

	// Upload file
	function upload($file_path=NULL, $file_name=NULL){
		$ret=@ftp_put($this->conn, $file_name, $file_path, FTP_BINARY);
		if($ret){
			return true;
		}else{
			return false;
		}
	}

	// Remove file
	function remove_file($str_filename){
		if(@ftp_delete($this->conn, $str_filename)){
			return true;
		}else{
			return false;
		}
	}

	// Close connection
	function close_connection(){
		return ftp_close($this->conn);	
	}
}
?>
