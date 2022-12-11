<?php
    require ('db.php');

    $id = '';
    $name = '';
    $description = '';

    if(isset($_POST['add-topic'])){
        unset($_POST['add-topic']);
        $name = $_POST['name'];
        $description = $_POST['description'];
        $sql = "INSERT INTO topics (tname, tdescription) VALUES ('$name', '$description')";
        $conn->query($sql);
        header("location: ../topics/manage.php");
        exit();
    }

    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM topics WHERE id = $id and deleted=0;";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
            $id = $row["id"];
            $name = $row["tname"];
            $description = $row["tdescription"];
        
    }

    if(isset($_POST['update-topic'])){
        unset($_POST['update-topic']);
        $id = $_POST["id"];
        
        foreach ($_POST as $key => $value)
        {
          if(preg_match("/name/",$key)){
            if($value != ''){
              $value = htmlspecialchars($value);
              $sql = "UPDATE topics SET tname = '$value' WHERE id = $id;";
              $conn->query($sql);
            }
          }
          if(preg_match("/description/",$key)){
            $sql = "UPDATE topics SET tdescription = '$value' WHERE id = $id;";
            $conn->query($sql);
          }
        
        }
        header("location: ../topics/manage.php");
        exit();
    }

    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $sql = "UPDATE topics SET deleted=1 WHERE id = $id;";
        $conn->query($sql);
    }