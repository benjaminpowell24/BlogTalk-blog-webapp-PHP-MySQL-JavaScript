<?php
    require($_SERVER['DOCUMENT_ROOT'] . '/database/db.php');

    $postTitle = 'Recent Posts';

    if(isset($_GET['t_id'])){
        $tid = $_GET['t_id'];
        $tname = $_GET['name'];
        $postTitle = "Searched for posts under '".$tname."'";
        $search = "SELECT * FROM posts WHERE deleted=0 AND published=1 AND topic='$tname';";
        $record = mysqli_query($conn, $search);
        
    }
    else if(isset($_POST['search-term'])){
        $postTitle = "Searched for '".$_POST['search-term']."'";
        $term = '%'.$_POST['search-term'].'%';
        $search = "SELECT * FROM posts WHERE published=1 AND title LIKE '$term' OR body LIKE '$term'";
        $record = mysqli_query($conn, $search);
        unset($_POST['search-term']);
    } else{
        $postTitle = 'Recent Posts';
        $search = "SELECT * FROM posts WHERE deleted=0 AND published=1 ORDER BY id DESC LIMIT 5";
        $record = mysqli_query($conn, $search);      
    }

    