<?php 
         session_start();
      $title = "";
      $body = "";

       $db = mysqli_connect('localhost' , 'root', '', 'lab_blog');
    if(isset($_POST['post_blog'])){

        $title = mysqli_real_escape_string($db, $_POST['title']);
        $body = mysqli_real_escape_string($db, $_POST['body']);

        if(empty($title)){array_push($errors, "Title is required");}
        if(empty($body)){array_push($errors, "Nothing in the body");}

        $post_query = "INSERT INTO posts (title, body) VALUES('$title' , '$body' )";

        mysqli_query($db, $post_query);

        
        header('location:blog.php');


    }
        $aa = "SELECT title, body FROM posts";
        $res = mysqli_query($db,$aa);

    //     $i = 0;
    //     $gg = array();
    //     if($res->num_rows > 0){
    //         while($row = $res-> fetch_assoc()){
    //             $gg[$i]["title"] = $row["title"];
    //             $gg[$i]["body"] = $row["body"];
    //             $i++;
    //         }
    //     }
    // echo $gg;
 ?>