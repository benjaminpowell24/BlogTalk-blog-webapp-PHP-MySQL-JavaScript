<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/database/bg.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BlogTalk</title>
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
	<link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
</head>

<body>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div>
    <header>
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="images/logo.jpg"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse"
					aria-controls="nvbCollapse">
					<span class="navbar-toggler-icon"><i class="fa fa-navicon"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="nvbCollapse">
					<ul class="navbar-nav ml-auto">
						<li class="navbar-item pl-2">
							<a class="nav-link text-black-50" href="home.php">Home</a>
						</li>
						<li class="navbar-item pl-2">
							<a class="nav-link text-black-50" href="#">Login</a>
						</li>

						<form action="#" method="POST">
							<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog"
								aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header text-center">
											<h4 class="modal-title w-100 font-weight-bold">Sign up</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body mx-3">
											<div class="md-form form-group">
												<i class="fas fa-user prefix grey-text"></i>
												<input type="text" id="orangeForm-name" class="form-control validate">
												<label data-error="wrong" data-success="right" for="orangeForm-name"
													class="col-form-label-sm">Full name</label>
											</div>
											<div class="md-form form-group">
												<i class="fas fa-envelope prefix grey-text"></i>
												<input type="email" id="orangeForm-email" class="form-control validate">
												<label data-error="wrong" data-success="right" for="orangeForm-email"
													class="col-form-label-sm">Email</label>
											</div>

											<div class="md-form form-group">
												<i class="fas fa-lock prefix grey-text"></i>
												<input type="password" id="orangeForm-pass"
													class="form-control validate">
												<label data-error="wrong" data-success="right" for="orangeForm-pass"
													class="col-form-label-sm">Password</label>
											</div>

										</div>
										<div class="modal-footer d-flex justify-content-center">
											<button class="btn btn-deep-orange">Sign up</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<li class="navbar-item pl-2 bl">
							<a href="" class="nav-link text-black-50" data-toggle="modal"
								data-target="#modalRegisterForm">Get Started</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
        <!-- <section id="">
            <div class="container pb-4">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">Trending Posts</h2>
                    </div>
                </div>
            </div>
        </section> -->
        <div class="text-center">
		<div class="fontsample">Experience the world</div>
		<div class="fontsample2">with a touch.</div>
	</div>
        <div class="page-wrapper py-5">
            <!--Post Slider-->
            <div class="post-slider">
                <i class="fas fa-chevron-left prev"></i>
                <i class="fas fa-chevron-right next"></i>

                <div class="post-wrapper">
                    <?php
                    $query = "SELECT * FROM posts WHERE deleted=0 AND published=1 ORDER BY id DESC LIMIT 5;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        $im_id = $row['image_id'];
                        $im_query = "SELECT * FROM images WHERE id=$im_id";
                        $im_result = mysqli_query($conn, $im_query);
                        while ($imrow = mysqli_fetch_array($im_result)) {

                    ?>
                            <div class="post">
                                <img src="<?php echo '/uploads/' . $imrow['_filename'] ?>" class="slider-image">
                                <div class="post-info">
                                    <h4><a href="single.php?id=<?php echo $row['id'] ?>" class="text-decoration-none"><?php echo $row['title'] ?></a></h4>
                                    <i class="fas fa-signature"><?php echo $row['author'] ?></i>
                                    &nbsp;
                                    <i class="far fa-calendar-alt"> <?php echo date('F j, Y', strtotime($row['date'])) ?></i>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!--CONTENT-->
            <div class="content clearfix">
                <!--MAIN CONTENT-->
                <div class="main-content py-5">
                    <h1 class="Recent-post-title"><?php echo $postTitle; ?></h1>
                    <?php
                    if (mysqli_num_rows($record) >= 1) {
                        while ($row = mysqli_fetch_array($record)) {
                            $im_id = $row['image_id'];
                            $im_query = "SELECT * FROM images WHERE id=$im_id";
                            $im_result = mysqli_query($conn, $im_query);
                            while ($imrow = mysqli_fetch_array($im_result)) {
                    ?>
                                <div class="post clearfix">
                                    <img src="<?php echo '/uploads/' . $imrow['_filename'] ?>" alt="" class="post-image">
                                    <div class="post-preview">
                                        <h2><a class="text-decoration-none" href="single.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
                                        <i class="fas fa-signature"><?php echo $row['author'] ?></i>
                                        &nbsp;
                                        <i class="far fa-calendar-alt"> <?php echo date('F j, Y', strtotime($row['date'])); ?></i>
                                        <p class="preview-text"><?php echo html_entity_decode(substr($row['body'], 0, 150) . '...'); ?></p>
                                        <a href="single.html" class="btn read-more"> Read More</a>
                                    </div>
                                </div>
                        <?php }
                        }
                    } else {
                        ?>
                        <div>
                            <h2>No results available</h2>
                        </div>
                    <?php
                    }
                    ?>
                </div>



                <div class="sidebar">

                    <div class="section search">
                        <h3>Search</h3>
                        <form action="blog.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="search...">
                        </form>
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
                        <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 12 345 6789</p>
                        <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 12 345 6789</p>
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
                                    <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 12 345 6789</p>
                                </li>
                                <li>
                                    <p class="pl-2 "><i class="fa fa-phone fa-img mr-1"></i>+233 (0) 12 345 6789</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-4 card border-0 bg-about">
                <div class="widget hidden-xs-down text-center">
                    <h6 class="card-title"><b>ABOUT US</b></h6>
                    <div class="card-body">
                        <div><a class="nav-link text-reset" href="#">Who We Are</a></div>
                        <div><a class="nav-link text-reset" href="#">Careers</a></div>
                        <div><a class="nav-link text-reset" href="#">Privacy Policy</a></div>
                        <div><a class="nav-link text-reset" href="#">FAQ</a></div>

                    </div>
                </div>
                <div role="tablist" class="widget hidden-sm-up">
                    <a href="#collapseTwo" class="accordion card-header border-0 py-3 d-flex justify-content-between">
                        <span class="justify-content-start">ABOUT US</span>
                        <span class="justify-content-end"></span>
                    </a>
                    <div class="panel" role="tabpanel">
                        <div class="card-block">
                            <ul class="widget-list list-unstyled">
                                <li><a class="nav-link text-reset" href="#">Who We Are</a></li>
                                <li><a class="nav-link text-reset" href="#">Careers</a></li>
                                <li><a class="nav-link text-reset" href="#">Privacy Policy</a></li>
                                <li><a class="nav-link text-reset" href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xl-4 card border-0 bg-about">
                <div class="widget hidden-xs-down text-center">
                    <h6 class="card-title"><b>COMPANY</b></h6>
                    <div class="card-body">
                        <div><a class="nav-link text-reset">Help</a></div>
                        <div><a class="nav-link text-reset"></a>Legal</div>
                        <div><a class="nav-link text-reset">Apps</a></div>
                        <div><a class="nav-link text-reset">Developer</a></div>

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
                                <li><a class="nav-link text-reset">Help</a>
                                </li>
                                <li><a class="nav-link text-reset">Legal</a></li>
                                <li><a class="nav-link text-reset">Apps</a></li>
                                <li><a class="nav-link text-reset">Developer</a></li>

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