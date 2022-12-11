<?php
session_start();
require ($_SERVER['DOCUMENT_ROOT'] . '/database/db.php');
require ($_SERVER['DOCUMENT_ROOT'] . '/database/topics.php');




if ($_SESSION['admin_sid'] == session_id()) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Edit Topics</title>
        <link rel="icon" href="/images/softcodes.png">

        <link rel="stylesheet" href="/css/page-loader.css" media="screen,projection">


        <link href="/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link href="/css/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

        <link href="/css/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
        <link rel="stylesheet" href="/css/navbar.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    </head>

    <body>

        <header id="header" class="page-topbar">
            <div class="navbar-fixed">
                <nav class="navbar-color">
                    <div class="container">
                    </div>
                </nav>
            </div>
        </header>

        <div id="main">
            <div class="wrapper">

                <aside id="left-sidebar-nav">
                    <ul id="slide-out" class="side-nav fixed leftside-navigation">
                        <li class="user-details cyan darken-2">
                            <div class="row">
                                <div class="col col s4 m4 l4">
                                    <img src="/images/avatar.jpg" alt="" class="circle valign profile-image" height="70px!important">
                                </div>
                                <div class="col col s8 m8 l8">
                                    <p class="text-white mt-4">Admin</p>
                                </div>
                            </div>

                        </li>
                        <li class="bold active"><a href="../products/manage.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i>Manage products</a>
                        </li>

                        <li class="bold"><a href="../blog/manage.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i>Manage blogs</a>

                        <li class="bold"><a href="../topics/manage.php" class="waves-effect waves-cyan"><i class="mdi-communication-chat"></i>Manage Topics</a>
                        </li>
                        <li class="bold"><a href="/logout.php" class="waves-effect waves-cyan"><i class="mdi-action-lock"></i>Logout</a></li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
                </aside>
                <section class="container">
                    <div class="admin-content">
                        <div class="row pt-5 pb-2">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-right">
                                            <a href="create.php" class="btn btn-big">Add topic</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <a href="manage.php" class="btn btn-big">Manage topic</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h2 class="text-center">Edit Topic</h2>
                            <form action="create.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <div>
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="<?php echo $name;?>" class="text-input">
                                </div>
                                <div>
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description"><?php echo $description;?></textarea>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" name="update-topic" class="btn btn-big">Update topic</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script> 
        <script src="/js/form.js"></script>       
       
    </body>

    </html>
    <?php
} else {

    header("location:/-ad-access.php");
}
?>