<?php 

   session_start();

    //intializing variables 
   $username = "";
   $email = "";
   $fullname = "";
   $title = "";
   $body = "";
   $errors = array();

     //connneting to database lab_blog
   $db = mysqli_connect('localhost' , 'root', '', 'lab_blog');

       
   if (isset($_POST['reg_user'])) {
   	     //receive inputs from the form 
       $username = mysqli_real_escape_string($db, $_POST['username']);
       $email = mysqli_real_escape_string($db, $_POST['email']);
       $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
       $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
       $confirm_pwd = mysqli_real_escape_string($db, $_POST['confirm_pwd']);

       
        //check that all your form is filled
       if(empty($username)){array_push($errors, "Username is required");}
       if(empty($email)){array_push($errors, "E-mail is required");}
       if(empty($fullname)){array_push($errors, "Fullanme is required");}
       if(empty($pwd)){array_push($errors, "Password is required");}


        //check a user does not already exist with the same username and/or email
       $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
       $result = mysqli_query($db, $user_check_query) ;
       $user = mysqli_fetch_assoc($result);

       if($user){

       	if($user['username'] === $username){

       		array_push($errors, "Username already exists");
       	}

       	if($user['email'] === $email){
       		array_push($errors, "Email already exists");
       	}
       }
         

         //if there is no error , then we can insert it to the table
        if(count($errors)==0){
	    
			    //encrypt the password  
			    $password = md5($pwd);


			     //insert received inputs to the table users
			    $query = "INSERT INTO users (username, email, password, fullname)  VALUES('$username','$email','$password', '$fullname')";

			    mysqli_query($db, $query);

                 $_SESSION['username'] = $username;
  	             $_SESSION['success'] = "You are now logged in";

			    //redirection to index.php page
			    header('location: index.php');
		}
   }  




      //LOGIN USER

      if(isset($_POST['login_user'])) {

      	$username = mysqli_real_escape_string($db,$_POST['username']);
      	$pwd = mysqli_real_escape_string($db, $_POST['pwd']);


      	if(empty($username)){
      		array_push($errors, "Username is required");
      	}

      	if(empty($pwd)){
      		array_push($errors, "Password is required");
      	}


      	if(count($errors)== 0){

       	$password = md5($pwd);

       	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
       	$result = mysqli_query($db, $query);

       	if(mysqli_num_rows($result) == 1){
       		$_SESSION['username'] = $username;
       		$_SESSION['success'] = "You are now logged in";
       		header('location: blog.php');
       	}else{
       		array_push($errors, "Wrong username or password combination");
       	}
       }

      }

      
	 




	 //posting posts 

	  
      
         $get_post_query = "SELECT title, body,publish_date FROM posts";
        $get_post = mysqli_query($db,$get_post_query);

    if(isset($_POST['post_blog'])){

    	$title = mysqli_real_escape_string($db, $_POST['title']);
    	$body = mysqli_real_escape_string($db, $_POST['body']);
      

    	if(empty($title)){array_push($errors, "Title is required");}
    	if(empty($body)){array_push($errors, "Nothing in the body");}

      if(count($errors) == 0){

    	$post_insert = "INSERT INTO posts (title, body) VALUES('$title' , '$body' )";

    	mysqli_query($db, $post_insert);

      }

    	header('location:blog.php');

		 }


 
     
      
    
 ?>