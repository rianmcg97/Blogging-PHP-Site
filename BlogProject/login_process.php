<?php
	session_start();
	require_once 'database.php';

	if(isset($_POST['btn-login']))
	{
		$user_email = trim($_POST['Email']);
		$user_password = trim($_POST['Password']);
		
		
		
		try
		{	
		
			$stmt = $db->prepare("SELECT * FROM user WHERE Email=:Email");
			$stmt->execute(array(":Email"=>$user_email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['Password']==$user_password){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['Username'];
                                header("location:index.php");
			}
			else{
				
				echo "email or password does not exist."; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>