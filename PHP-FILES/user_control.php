<?php

include_once 'connection.php';
	
	
class User {
		
		
private $db;
		
private $connection;
		
		
function __construct() {
	
$this -> db = new DB_Connection();

$this -> connection = $this->db->getConnection();
		
 }
		
		
public function does_user_exist($username,$pasword)
		
{
			
$query = "Select * from loginr where username='$username' and pasword = '$pasword' ";
	
$result = mysqli_query($this->connection, $query);
			
if(mysqli_num_rows($result)>0){
				
 $json['success'] = ' Welcome '.$username;
				
echo json_encode($json);
				
mysqli_close($this -> connection);
			
} else{
				
 $query = "insert into loginr (username, pasword) values ( '$username','$pasword')";
				
$inserted = mysqli_query($this -> connection, $query);
				
if($inserted == 1 )
{
					
$json['success'] = 'Acount created';
				
}else{
					
$json['error'] = 'Wrong password';
				
}
				
echo json_encode($json);
				
mysqli_close($this->connection);
			
}
			
		
}
		
	
}
	
	
	
$user = new User();
	
if(isset($_POST['username'],$_POST['pasword'])) 
{
		
$username = $_POST['username'];
		
$password = $_POST['pasword'];
		
		
if(!empty($username) && !empty($pasword)){
			
			
$encrypted_password = md5($pasword);
			
$user-> does_user_exist($username,$pasword);
			
		
}
else{
			
echo json_encode("you must type both inputs");
		
}
		
	
}














?>