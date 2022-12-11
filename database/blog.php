<?php
    require ('db.php');
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";

    $id = '';
    $title = '';
    $author = '';
    $body = '';
    $topic = '';
    $statusMsg='';
    

    if(isset($_POST['add-post'])&& !empty($_FILES["image"]["name"])){
        unset($_POST['add-post']);
        $title = $_POST['title'];
        $author = $_POST['author'];
        $body = $_POST['body'];
        $topic = $_POST['topic'];

        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir.$fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
          
          if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){       
            $sql = "INSERT INTO images (_filename) VALUES ('$fileName')";
            $insert = $conn->query($sql);

            if($insert){
                $postquery = "SELECT id FROM images WHERE _filename='$fileName' AND _status=1;";
                $postresult = mysqli_query($conn, $postquery);
                while($row = mysqli_fetch_array($postresult)){
                  $image_id = $row["id"];               
                  $postsql = "INSERT INTO posts (title, author, body, topic, image_id) VALUES ('$title', '$author','$body', '$topic', $image_id)";
                  $conn->query($postsql);
                  header("location: ../blog/manage.php");
                  exit();
                }    
            }else{
              $statusMsg="Sorry, error uploading post";
            }
           
          }
          else{
            $statusMsg="Sorry, error uploading image";
          }
        }
        else{
          $statusMsg="Sorry, only JPG, JPEG, PNG, GIF, & PDF files allowed";
        }
        
    }else{
      $statusMsg="Please select file to upload";
    }

    echo '<script>console.log('.$statusMsg.')</script>';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM posts WHERE id = $id and deleted=0;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
            $id = $row["id"];
            $title = $row["title"];
            $author = $row["author"];
            $body = $row["body"];
            $topic = $row["topic"];
            $image_id = $row["image_id"];
            
            $img_query = "SELECT _filename from images WHERE id=$image_id AND _status=1;";
            $img_result = mysqli_query($conn, $img_query);
            while($row = mysqli_fetch_array($img_result)){
            $imageURL = '/uploads/'.$row['_filename']; 
          }
    }

    if(isset($_POST['update-post'])){
        unset($_POST['update-post']);
        $id = $_POST["id"];
        $body = $_POST["body"];

        $imsql = "SELECT image_id FROM posts WHERE id=$id;";
        $imresult = mysqli_query($conn, $imsql);
        while($row = mysqli_fetch_array($imresult)){
          $image_id = $row['image_id'];
        if( !empty($_FILES["image"]["name"])){
          $fileName = basename($_FILES["image"]["name"]);
          $targetFilePath = $targetDir.$fileName;
          $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
          $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
              if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){       
                $sql = "UPDATE images SET _filename = '$fileName' WHERE id=$image_id";
                $conn->query($sql);
              }
            }
        }
      }
        foreach ($_POST as $key => $value)
        {
          if(preg_match("/title/",$key)){
            if($value != ''){
              $value = htmlspecialchars($value);
              $sql = "UPDATE posts SET title = '$value' WHERE id = $id;";
              $conn->query($sql);
            }
          }
          if(preg_match("/author/",$key)){
            if($value != ''){
              $value = htmlspecialchars($value);
              $sql = "UPDATE posts SET author = '$value' WHERE id = $id;";
              $conn->query($sql);
            }          
          }
         
          if(preg_match("/body/",$key)){
            if($body != ''){
              $sql = "UPDATE posts SET body = '$body' WHERE id = $id;";
              $conn->query($sql);
            }           
          }
          if(preg_match("/topic/",$key)){
            if($value != ''){
              $value = htmlspecialchars($value);
              $sql = "UPDATE posts SET topic = '$value' WHERE id = $id;";
            $conn->query($sql);
            }
            
          }
        
        }
        header("location: ../blog/manage.php");
        exit();
    }

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $sql = "UPDATE posts SET deleted=1 WHERE id = $id;";
        $conn->query($sql);
    }

    if(isset($_GET['publish_id'])){
        $id = $_GET['publish_id'];
        $sql = "UPDATE posts SET published=1 WHERE id = $id;";
        $conn->query($sql);
    }