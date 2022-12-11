<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/database/db.php');
require ($_SERVER['DOCUMENT_ROOT'] . '/database/topics.php');


if ($_SESSION['admin_sid'] == session_id()) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Manage Posts</title>
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
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

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
                        <div class="content">
                            <h2 class="text-center pb-4">Manage Topics</h2>
                            <table>
                                <thead>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th colspan="2">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                     $query = "SELECT * FROM topics WHERE deleted=0;";
                                     $result = mysqli_query($conn, $query);
                                     while($row = mysqli_fetch_array($result)){?>
                                        <tr>
                                            <td><?php echo $row["id"]?></td>
                                            <td><?php echo $row["tname"]?></td>
                                            <td><a href="edit.php?id=<?php echo $row["id"];?>" class="edit">edit</a></td>
                                            <td><a href="manage.php?del_id=<?php echo $row["id"];?>" class="delete">delete</a></td>
                                        </tr>';    
                                     <?php
                                     }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $(function() {

                setTimeout(function() {
                    $('body').addClass('loaded');
                }, 3000);

            });
        </script>
    </body>

    </html>

<?php
} else {

    header("location:-ad-access.php");
}
?>