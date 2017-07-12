<!DOCTYPE html>

<?php
$successContact = "";
$errContact = "";
if(isset($_POST['form_submit'])) {

    $email_to = "support@mobbingbali.com";

    // Validate fields
    if(!isset($_POST['form_name']) ||
        !isset($_POST['form_email']) ||
        !isset($_POST['form_subject']) ||
        !isset($_POST['form_message'])) {
        $errContact .= 'Please include a name, email, subject and message. <br />';
    }

    $form_name = $_POST['form_name'];
    $form_email = $_POST['form_email'];
    $form_subject = $_POST['form_subject'];
    $form_number = $_POST['form_number'];
    $form_message = $_POST['form_message'];

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp, $form_email)) {
        $errContact .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    if(strlen($form_message) < 2) {
        $errContact .= 'The message you entered does not appear to be valid.<br />';
    }

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message = "";
    $email_message .= "Name: ".clean_string($form_name)."\n";
    $email_message .= "Email: ".clean_string($form_email)."\n";
    if(isset($_POST['form_number'])){
        $email_message .= "Phone: ".clean_string($form_number)."\n";
    }
    $email_message .= "Subject: ".clean_string($form_subject)."\n\n";
    $email_message .= clean_string($form_message)."\n";

    if(empty($errContact)){
        // Format email
        $headers = 'From: '.$form_email."\r\n".
        'Reply-To: '.$form_email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $email_subject = "Contact Form Submission: ".$form_subject;
        // Send and notify of success
        @mail($email_to, $email_subject, $email_message, $headers);
        $successContact = "Thank you for contacting us. We will respond shortly.";
    }
}
?>

<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobbing Bali</title>
    <meta name="description" content="Indie-rock band based in Cape Town, South Africa.">
    <meta name="keywords" content="mobbing bali, cape town indie, indie rock, band">
    <meta name="author" content="Jenn, ThemeForces.com. Dave Gilmour, Jared Murphy">

    <!-- Favicons
    ================================================== -->
    <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.2.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">


    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Off Canvas Navigation
    ================================================== -->
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas"> <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <span class="fa fa-close"></span>
        </div>
        <div class="add-margin"></div>
        <ul class="nav navmenu-nav"> <!--- Menu -->
            <li><a href="#home" class="page-scroll">Home</a></li>
            <li><a href="#meet-us" class="page-scroll">More About Us</a></li>
            <li><a href="#videos" class="page-scroll">Videos</a></li>
            <li><a href="#stuff" class="page-scroll">Things we've done</a></li>
            <li><a href="#music" class="page-scroll">Music</a></li>
            <li><a href="#gigs" class="page-scroll">Gigs</a></li>
            <li><a href="#contact" class="page-scroll">Bookings</a></li>
        </ul><!--- End Menu -->
    </div> <!--- End Off Canvas Side Menu -->


    <span id="socials" class="nav navbar-nav navbar-right">
        <a href="https://www.facebook.com/MobbingBali/" class="fa fa-facebook"></a>
        <a href="https://www.instagram.com/mobbingbali/" class="fa fa-instagram"></a>
        <a href="https://www.youtube.com/channel/UCnwic-zkdOJlWOIq2zT2DlQ" class="fa fa-youtube"></a>
        <a href="https://twitter.com/mobbingbali" class="fa fa-twitter"></a>
    </span>

    <!-- Home Section -->
    <div id="home">
        <div class="container text-center">
            <!-- Navigation -->
            <nav id="menu" data-toggle="offcanvas" data-target=".navmenu">
                <span id="menu-icon" class="fa fa-bars nav-dark"/>
            </nav>


            <div class="content">
                <h2 class="name-font">Mobbing Bali</h2>
                <hr>
                <div class="header-text btn">
                    <h1><span id="head-title"></span></h1>
                </div>
            </div>

            <a href="#meet-us" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>


    <!-- Meet Us Section -->
    <div id="meet-us">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Here's the whole thing</h2>
                        <hr>
                    </div>
                    <p>There are four of us. One sings and complains. One shreds harder than a cheese grater. Another one just bangs things. There's one more but he has two less strings than the other guys. Except for the guy who bangs things. He doesn't use any strings. None.</p>
                    <a href="#stuff" class="down-btn page-scroll">
                        <span class="fa fa-angle-down"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Overview Video Section -->
    <div id="videos">
        <div class="overlay">
            <div class="container">
                <div class="section-title">
                    <h2 style="color:white"> We play Live too! <h2>
                    <hr>
                </div>
                <a href="#">
                  <iframe width=90% height="350" src="https://www.youtube.com/embed/wUqsBN-c1co" frameborder="0" allowfullscreen></iframe>
                </a>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="stuff">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Some stuff we've done</h2>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="space"></div>

            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <a href="#music" class="page-scroll undecorated-link" style="hover: none; text-decoration: none">
                        <div class="service">

                            <span class="fa icon-music fa-3x"></span>
                            <h4>Music</h4>
                            <p>The band has released two EPs, showcasing a unique blend of indie, rock, fusion and pop. The lyrics mean what they say, and the instruments say what they want.
                                We've got busy times ahead, with music being written constantly and recording happening whenever possible.</p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4">
                    <a href="#gigs" class="page-scroll undecorated-link" style="hover: none; text-decoration: none">
                        <div class="service">
                            <span class="fa icon-live fa-3x"></span>
                            <h4>Gigs</h4>
                            <p>Mobbing Bali regularly plays popular venues in Cape Town and Stellenbosch, and have been featured on South African TV shows "Expresso" and "Hectic Nine-9". The band hopes to tour soon and are booked for festivals late in the year.<br><br/></p>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4">
                    <a href="#store" class="page-scroll undecorated-link" style="hover: none; text-decoration: none">
                        <div class="service">
                            <span class="fa icon-merch fa-3x"></span>
                            <h4>Merch</h4>
                            <p>We plan to put our mark on some beanies, coffee cups, hats and all thing wearable. <br><br/> T-Shirts have arrived ... Contact us if you would like one, or pick one up at the next gig!<br><br/></p>
                        </div>
                    </a>
                </div>
            </div>
            <a href="#music" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>

    <!-- Call-to-Action Section -->
    <div id="cta">
        <div class="container text-center">
            <h2 style="color:white;">"Writing whistful lyrics doesn't bring me luck" - Coffee</h2>
        </div>
    </div>

    <!-- Portfolio Section -->
    <div id="music">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title">
                        <h2>Our Latest Projects</h2>
                        <hr>
                    </div>
                    <p>Find us on:</p>
                    <p>
                        <a href="http://www.deezer.com/artist/11405330" target="_blank" class="btn go-to-btn">Deezer</a>
                        <a href="https://play.spotify.com/artist/1YzjhzbKVvGzQYTsh9ofUs?play=true&utm_source=open.spotify.com&utm_medium=open" target="_blank" class="btn go-to-btn">Spotify</a>
                        <a href="https://itunes.apple.com/za/album/credo-ep/id1178484196" target="_blank" class="btn go-to-btn">iTunes<a>
                        <a href="https://itun.es/za/K3Jpgb" target="_blank" class="btn go-to-btn">Apple Music</a>
                    </p>
                </div>
            </div>
            <div class="space"></div>
        </div>
        <div class="container-fluid">
            <div class="row row-centered">
                <div class="col-md-2 col-sm-1 col-lg-2 col-centered"></div>
                <div class="col-md-4 col-sm-5 col-lg-4 col-centered">
                    <div class="portfolio-item">
                        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/279096778&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 col-lg-4 col-centered">
                    <div class="portfolio-item">
                        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/309456153&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
                    </div>
                </div>
                <div class="col-md-2 col-sm-1 col-lg-2 col-centered"></div>
                <!-- <div class="col-md-3 col-sm-6 nopadding">
                    <div class="portfolio-item">
                        <div class="">
                            <a href="#">

                            </a>
                            <iframe src="//tools.applemusic.com/embed/v1/album/1178484196?country=za" height="500px" width="100%" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 nopadding">
                    <div class="portfolio-item">
                        <div class="">
                            <a href="#">
                            </a>
                            <iframe scrolling="no" frameborder="0" allowTransparency="true" src="https://www.deezer.com/plugins/player?format=classic&autoplay=false&playlist=true&width=700&height=350&color=007FEB&layout=dark&size=medium&type=album&id=14612310&app_id=1" width="700" height="350"></iframe>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="space"></div>
        <div class="text-center">
            <a href="https://soundcloud.com/mobbing-bali" target="_blank" class="btn read-more-btn">Soundcloud, even</a>
            <br>
            <a href="#about-us" class="down-btn page-scroll"><span class="fa fa-angle-down"></span></a>
        </div>
        <div class="space"></div>
    </div>

    <!-- Gigs Section -->
    <div id="gigs">
        <div class="overlay">
            <div class="container text-center">
                <div class="section-title">
                    <h2>Gigs</h2>
                    <hr>
                </div>
                <div data-tockify-component="calendar" data-tockify-calendar="mobbinggigs"></div>
                <script data-cfasync="false" data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>
                <!--<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1Ai1qKtHKtswDs15UIBm2Xos4W8U" width="640" height="480"></iframe>-->
            </div>
        </div>
    </div>

        <!-- Testimonial Section -->
    <div id="testimonials">
        <div class="overlay">
            <div class="container">
                <div class="section-title">
                    <h2>Who's talking about us</h2>
                    <hr>
                </div>

                <div id="testimonial" class="owl-carousel owl-theme">
                  <div class="item">
                    <h3>"Spearheaded by possibly one of the most underrated vocalists on the scene, Warren Vernon-Driscoll,  <br>there is a distinctive classical edge to their sound,  <br>placing them in their own chalked-circle entirely." </h3>
                    <br>
                    <h6><a id="test_link" href="http://texxandthecity.com/2016/11/mobbing-bali-credo-ep/" target="_blank">Texx and the City</a></h6>
                  </div>

                  <div class="item">
                    <h3>"Now the vocals are a tad obscure and, at times, can be a bit too dissenting, <br> but it does make for something different. <br> And in the local indie-rock scene, <br> that can only be a good thing." </h3>
                    <br>
                    <h6><a id="test_link" href="http://10and5.com/2016/12/01/have-you-heard-new-south-african-music-volume-4/" target="_blank" color="white">Between 10 and 5</a></h6>
                  </div>

                  <div class="item">
                    <h3>"I must say I usually struggle to invest real time to learn more about bands who submit,<br> but when Mobbing Bali sent their email… <br>I had to take notice"</h3>
                    <br>
                    <h6><a id="test_link" href="http://samusicscene.co.za/wp/mobbing-bali-coffee/" target="_blank">SA Music Scene</a></h6>
                  </div>

                  <div class="item">
                    <h3>"In my humble opinion, Mobbing Bali has hit a stride with their music and creative style. <br> That’s not to say a lot of work cannot be done to improve,<br> but the band is at a point where they can safely push the boundaries <br> of themselves to create a truly spectacular album in the nearest future."</h3>
                    <br>
                    <h6><a id="test_link" href="http://www.audioinferno.com/2017/05/04/ep-review-red-bull-ep-mobbing-bali/" target="_blank">Audio Inferno</a></h6>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contact Us</h2>
                <hr>
            </div>
            <div class="space"></div>

            <div class="row">
                <div class="col-md-3">
                    <address>
                        <strong>Bookings</strong><br>
                        <br>
                        Email: <br><a class="undecorated-link" href="mailto:bookings@mobbingbali.com">bookings@mobbingbali.com</a><br>
                        Phone: <br>Becky - 082 070 7061
                        <ul class="social">
                            <li><a href="https://www.facebook.com/MobbingBali/"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="https://twitter.com/mobbingbali"><span class="fa fa-twitter"></span></a></li>
                          </ul>
                    </address>
                </div>

                <div class="col-md-9">
                    <form autocomplete="off" role="form" method="post" action="index.php?#contact">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="form_name" name="form_name" type="text" class="form-control" placeholder="Your Name" required>
                                <input id="form_number" name="form_number" type="tel" class="form-control" placeholder="Phone No.">
                            </div>
                            <div class="col-md-6">
                                <input id="form_email" name="form_email" type="email" class="form-control" placeholder="Email" required>
                                <input id="form_subject" name="form_subject" type="text" class="form-control" placeholder="Subject" required>
                            </div>
                        </div>
                        <textarea name="form_message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <div class="text-right">
                            <!--<a href="#" class="btn send-btn">Send</a>-->
                            <input id="form_submit" name="form_submit" type="submit" value="Send" class="btn send-btn">
                        </div>
                        <?php if(!empty($errContact)) echo "<p class='text-danger'>$errContact</p>";?>
                        <?php if(!empty($successContact)) echo "<p class='text-success'>$successContact</p>";?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <nav id="footer">
        <div class="container">

            <div class="pull-right">
                <a href="#home" class="page-scroll">Back to Top <span class="fa fa-angle-up"></span></a>
            </div>
        </div>
    </nav>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>

    <script src="js/owl.carousel.js"></script>
    <script src="js/typed.js"></script>
    <script>
      $(function(){
          $("#head-title").typed({
            strings: ["There are four of us.^1000", "One sings and complains^1000" ,"One shreds harder than a cheese grater^1000","Another one just bangs things^1000","There's one more^1000", "but he has two less strings than the other guys^1000", "Except for the guy who bangs things", "He doesn't use any strings^1000","None.^1000"],
            typeSpeed: 35,
            loop: true,
            startDelay: 100
          });
      });
    </script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>
