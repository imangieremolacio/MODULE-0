<?php
	
	$taskname = filter_input(INPUT_POST, 'taskname');  
	$edit = filter_input(INPUT_POST, 'edit');  


	if(!empty($add)){
		if(!empty($edit)){
			$host = "localhost"; 
			$dbusername = "root"; 
			$dbpassword = "";
			$dbname = "todolist"; 

				$conn = new mysqli($host, $dbusername, $dbpassword, $dbname); 

				if(mysql_connect_error()){
					die('Connect Error ('.mysql_connect_errno() .')'.mysqli_connect_error()); 
				}
				else{
					$sql = "INSERT INTO tasks (taskname, edit) values ('$taskname', '$edit')";

					if($conn -> query($sql)){
						echo "<h1> Tasks added successfully!</h1>";
					}
					else{
						echo "Error: ". $sql ."<br>". $conn->error;
					}
					$conn->close(); 
				}
		}
		else{
			echo "Complete the task(s).";
			die();
		}
	}



?>