<?php
require($_SERVER['DOCUMENT_ROOT'] . '/database/db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE deleted=0 AND published=1 AND id=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {


?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <title><?php echo $row['title']; ?> | Softcodes-GH</title>
            <link rel="stylesheet" href="css/Index.css">
            <link rel="stylesheet" href="css/index.scss">
            <link rel="stylesheet" href="css/navbar.css">
            <link rel="stylesheet" href="css/page-loader.css" media="screen,projection">
            <link rel="stylesheet" href="css/animate.min.css">
            <link rel="stylesheet" href="css/animate.css">
            <link rel="stylesheet" href="css/hover-min.css">
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/style-new.css">
            <script src="https://kit.fontawesome.com/052b040ca3.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
            <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="css/blog.css">
            <link rel="shortcut icon" href="images/softcodes.png">
        </head>

        <body>
            <div id="loader-wrapper">
                <div id="loader"></div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
            <div>
                <header>
                    <nav class="navbar navbar-expand-lg py-1">
                        <div class="container">
                            <a class="navbar-brand" href="/"><img class="navbar__logo" src="images/softcodes.png"></a>
                            <a class="text-black-50 brand__header" href="/">Softcodes-Ghana</a>
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse" aria-expanded="false">
                                <span class="navbar-toggler-icon"><i class="fa fa-navicon"></i></span>
                            </button>
                            <div class="collapse navbar-collapse" id="nvbCollapse">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item pl-2"><a href="/" class="nav-link text-black-50">Home</a></li>
                                    <li class="nav-item pl-2"><a href="/products" class="nav-link text-black-50">Products</a></li>
                                    <li class="nav-item pl-2"><a class="nav-link text-black-50" href="/services">Services</a></li>
                                    <li class="nav-item pl-2"><a class="nav-link text-black-50" href="/blog">Blog</a></li>
                                    <li class="nav-item pl-2"><a class="nav-link text-black-50" href="/about">About Us</a>
                                    </li>
                                    <li class="nav-item pl-2"><a class="nav-link text-black-50" href="/contact">Contact
                                            Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                <section id="inner-headline">
                    <div class="container pb-4">
                        <div class="row">
                            <div class="col-lg-12">
                            </div>
                        </div>
                    </div>
                </section>
                <div class="page-wrapper py-5">

                    <!--CONTENT-->
                    <div class="content clearfix mb-5">
                        <!--MAIN CONTENT-->
                        <div class="main-content pb-5">
                            <h1 class="Recent-post-title text-center"><?php echo $row['title']; ?></h1>


                            <div class="post clearfix mb-5">
                                <?php echo html_entity_decode($row["body"]); ?>
                            </div>

                        </div>


                        <!--MAIN CONTENT FINISH HERE-->


                        <div class="sidebar">
                            <div class="section posts">
                                <h2 class="section-title">Popular</h2>
                                <ul>
                                    <?php
                                    $query = "SELECT * FROM posts WHERE deleted=0 AND published=1 ORDER BY id DESC LIMIT 5;";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $im_id = $row['image_id'];
                                        $im_query = "SELECT * FROM images WHERE id=$im_id";
                                        $im_result = mysqli_query($conn, $im_query);
                                        while ($imrow = mysqli_fetch_array($im_result)) {
                                    ?>
                                            <div class="row align-items-center post clearfix">
                                                <img src="<?php echo '/uploads/' . $imrow['_filename'] ?>" style="width: 60px; height: 60px;" class="mr-3">
                                                <a href="single.php?id=<?php echo $row['id'] ?>" class="text-decoration-none">
                                                    <h4><?php echo $row['title'] ?></h4>
                                                </a>
                                            </div>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                            <div class="section topics">
                                <h2 class="section-title">Topics</h2>
                                <ul>
                                    <?php
                                    $query = "SELECT * FROM topics WHERE deleted=0;";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="<?php echo 'blog.php?t_id=' . $row['id'] . '&name=' . $row['tname']; ?>" class="text-decoration-none"><?php echo $row['tname'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer-collapse container-fluid bg-about text-white">
                <br><br>
                <div class="row">
                    <div class="col-sm-4 col-xl-4 bg-about">
                        <div class="widget hidden-xs-down text-center">
                            <h6><b>CALL US</b></h6>
                            <div class="card-body">
                                <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 26 624 0704</p>
                                <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 30 278 9378</p>
                            </div>
                        </div>
                        <div role="tablist" class="widget hidden-sm-up">
                            <a href="#collapseOne" class="accordion card-header border-0 py-3 d-flex justify-content-between">
                                <span class="justify-content-start">Call Us</span>
                                <span class="justify-content-end"></span>
                            </a>
                            <div class="panel" role="tabpanel">
                                <div class="card-block">
                                    <ul class="widget-list list-unstyled p-0">
                                        <li>
                                            <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 26 624 0704</p>
                                        </li>
                                        <li>
                                            <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 30 278 9378</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xl-4 card border-0 bg-about">
                        <div class="widget hidden-xs-down text-center">
                            <h6 class="card-title"><b>COMPANY</b></h6>
                            <div class="card-body">
                                <div><a class="nav-link text-reset" href="/about">About Us</a></div>
                                <div><a class="nav-link text-reset" href="/sage">Sage</a></div>
                                <div><a class="nav-link text-reset">Investors</a></div>
                                <div><a class="nav-link text-reset">Privacy Policy</a></div>
                                <div><a class="nav-link text-reset" href="/faq">FAQ</a></div>
                            </div>
                        </div>
                        <div role="tablist" class="widget hidden-sm-up">
                            <a href="#collapseTwo" class="accordion card-header border-0 py-3 d-flex justify-content-between">
                                <span class="justify-content-start">Company</span>
                                <span class="justify-content-end"></span>
                            </a>
                            <div class="panel" role="tabpanel">
                                <div class="card-block">
                                    <ul class="widget-list list-unstyled">
                                        <li><a class="nav-link text-reset" href="/about">About Us</a></li>
                                        <li><a class="nav-link text-reset" href="/sage">Sage</a></li>
                                        <li><a class="nav-link text-reset">Investors</a></li>
                                        <li><a class="nav-link text-reset">Privacy Policy</a></li>
                                        <li><a class="nav-link text-reset" href="/faq">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xl-4 card border-0 bg-about">
                        <div class="widget hidden-xs-down text-center">
                            <h6 class="card-title"><b>PRODUCTS</b></h6>
                            <div class="card-body">
                                <div><a class="nav-link text-reset">Sage Evolution ERP</a></div>
                                <div><a class="nav-link text-reset">Sage Pastel Partner</a>
                                </div>
                                <div><a class="nav-link text-reset">Sage 300</a></div>
                                <div><a class="nav-link text-reset">Sage 300 People</a></div>
                                <div><a class="nav-link text-reset">Sage X3</a></div>

                            </div>
                        </div>
                        <div role="tablist" class="widget hidden-sm-up">
                            <a href="#collapseThree" class="accordion card-header border-0 py-3 d-flex justify-content-between">
                                <span class="justify-content-start">Products</span>
                                <span class="justify-content-end"></span>
                            </a>
                            <div class="panel" role="tabpanel">
                                <div class="card-block">
                                    <ul class="widget-list list-unstyled p-0">
                                        <li><a class="nav-link text-reset">Sage Evolution ERP</a>
                                        </li>
                                        <li><a class="nav-link text-reset">Sage Pastel
                                                Partner</a></li>
                                        <li><a class="nav-link text-reset">Sage 300</a></li>
                                        <li><a class="nav-link text-reset">Sage 300 People</a></li>
                                        <li><a class="nav-link text-reset">Sage X3</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <div class="mx-auto row index__row">
                        <a href="https://www.linkedin.com/company/softcodesnigeria/" class="nav-link text-reset"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a href="https://www.facebook.com/softcodesinternational" class="nav-link text-reset"><i class="fa fa-facebook-square fa-lg"></i></a>
                        <a href="https://www.twitter.com/softcodeGh" class="nav-link text-reset"><i class="fa fa-twitter-square fa-lg"></i></a>
                    </div>
                </div>

                <br>
                <div>
                    <p class="text-center pb-2"><i class="fa fa-copyright"></i> Softcodes-Ghana 2020</p>
                </div>

            </footer>
            <script src="js/main.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/isotope.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

            <script src="js/custom.js"></script>
            <script src="js/custom-script.js"></script>

            <script>
                if ($('.smart-scroll').length > 0) {
                    var last_scroll_top = 0;
                    $(window).on('scroll', function() {
                        scroll_top = $(this).scrollTop();
                        if (scroll_top > 250) {
                            if (scroll_top < last_scroll_top) {
                                $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
                            } else {
                                $('.smart-scroll').removeClass('scrolled-up').addClass('scrolled-down');
                            }
                            last_scroll_top = scroll_top;
                        } else {
                            $('.smart-scroll').removeClass('scrolled-down').addClass('scrolled-up');
                        }
                    });
                }
            </script>
            <script>
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight) {
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                    });
                }
            </script>
            <script>
                $(function() {

                    setTimeout(function() {
                        $('body').addClass('loaded');
                    }, 3000);

                });
            </script>
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>
        </body>

        </html>

<?php }
} ?>