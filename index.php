<?php include('pages/function/function.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin" />
    <meta property="og:image" content="https://theacheng.herokuapp.com/assets/profile/web.jpg">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://theacheng.herokuapp.com/" />
    <meta property="og:title" content="Hi there👋" />
    <meta name="author" content="Thea Choem">
    <meta name="description" property="og:description"
        content="Please check it out my personal portfolio. I am a CS student, currently learning and working on building mobile apps with Flutter. I love both coding and designing, if I am not doing it, you will find me playing Guitar ^^ To be a tech guy, there are no limit stuff to learn, but I'm ready to join this journey!" />

    <title>Portfolio</title>
    <link rel="shortcut icon" href="assets/graphics/imacoustic.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/home/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
    * {
        color: white;
    }
    </style>
</head>

<body onload="afterload()">
    <div class="body-loader"></div>
    <div id="blocker" class="bg-texture"><img class="none" id="img" style="height: calc(50px + 10vw); display: inline;"
            src="./assets/profile/imacoustic-logo.svg" alt=""></div>
    <?php
        if(isLoggedIn()) echo '<a href="#" style="position: absolute; right: 10px; top: 10px; z-index: 100000000;" onclick="openFileAdmin()"><img src="./assets/graphics/close.svg" alt=""></a>
            <iframe style="display:none; position: fixed; z-index: 10000; width: 100%; height: 100%;" id="adminfile" src="./pages/function/ignore/admin.php"></iframe>'
    ?>
    <form action="index.php" method="post" id="log-in" style="display: none;">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Password">
        <?php
            if (!isLoggedIn()) echo '<input type="submit" name="submit" id="submit" value="Log In"></form>';
            else echo '<a id="submit" style="padding: 7px 10px; text-align: center; font-size: 14px;" href="index.php?logout=\'1\'">Log out</a>';
        ?>
    </form>
    <div class="card" id="card">
        <div class="left-side">
            <div class="profile-container">
                <a class="view" <?php  
                    if(isLoggedIn()) echo 'onclick="openFileAdmin()" href="#"';
                    else echo 'href="https://github.com/theacheng" target="_blank"';
                ?> aria-label="view"><i class="thank-message"></i></a>
                <img class="profile blur" id="profile" src="./assets/beforeload/profile/myprofile.png"
                    alt="./assets/beforeload/profile/myprofile.png">
                <div class="lds-ring absolute" id="image-loding">
                    <div>
                        <!---->
                    </div>
                    <div>
                        <!---->
                    </div>
                    <div>
                        <!---->
                    </div>
                </div>
            </div>
            <h1>CHOEM THEA</h1>
            <div style="height: 5px"></div>
            <p>Computer Science Student</p>
            <div class="sec-btn-container">
                <div class="sec-btn active" id="aboutme2">
                    <a onclick="addActiveClass('aboutme', 0)" href="#0">About Me</a>
                </div>
                <div class="sec-btn" id="portfolio2">
                    <a onclick="addActiveClass('portfolio', 1)" href="#1">Portfolio</a>
                </div>
                <div class="sec-btn" id="testimonial2">
                    <a onclick="addActiveClass('testimonial', 2)" href="#2">Testimonial</a>
                </div>
                <div class="sec-btn" id="contact2">
                    <a onclick="addActiveClass('contact', 3)" href="#3">Contact</a>
                </div>
            </div>
        </div>
        <div class="side-bar bg-texture">
            <div class="viewer-2">
                <div id="ps-container">
                    <div class="item">
                        <p>👋</p>
                    </div>
                    <div class="circle" style="animation-delay: -3s"></div>
                    <div class="circle" style="animation-delay: -2s"></div>
                    <div class="circle" style="animation-delay: -1s"></div>
                    <div class="circle" style="animation-delay: 0s"></div>
                </div>
            </div>
            <a class="sidebar fas fa-user-graduate active" id="aboutme" onclick="addActiveClass('aboutme', 0)" href="#0"
                aria-label="link"></a>
            <a class="sidebar fas fa-clipboard-check" id="portfolio" onclick="addActiveClass('portfolio', 1)" href="#1"
                aria-label="link"></a>
            <a class="sidebar fas fa-comment-alt" id="testimonial" onclick="addActiveClass('testimonial', 2)" href="#2"
                aria-label="link"></a>
            <a class="sidebar fas fa-id-card-alt" id="contact" onclick="addActiveClass('contact', 3)" href="#3"
                aria-label="link"></a>
        </div>
        <div class="right-side">
            <iframe class="page" id="page0" src="./pages/aboutme.php">
                <!---->
            </iframe>
            <iframe class="page" id="page1" src="./pages/portfolio.php">
                <!---->
            </iframe>
            <iframe class="page" id="page3" src="./pages/contact.php">
                <!---->
            </iframe>
            <iframe class="page" id="page2" src="./pages/testimonial.php">
                <!---->
            </iframe>
        </div>
    </div>
    <div id="copyright"></div>
    <!-- <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- SCRIPT -->
    <script>
    var current_page = 0;

    function addActiveClass(name, index) {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        $('#' + name).addClass('active').siblings().removeClass('active');
        $('#' + name + 2).addClass('active').siblings().removeClass('active');
        isPage2(index);
        hidewithout(index);
        current_page = index;
    };

    function isPage2(current_page) {
        if (current_page === 2) {
            addPleaseSwap();
            $(".circle").fadeIn('slow', function() {
                $(this).show();
            });
        } else {
            addCounter();
            $(".circle").fadeOut('slow', function() {
                $(this).hide();
            });
        }

    }

    function url_num() {
        var pageURL = String($(location).attr("href"));
        url_number = pageURL[pageURL.length - 1];
        return url_number;
    }

    //on page is ready 
    $(document).ready(function() {
        $('.body-loader').addClass('edge');

        var current;
        current = url_num();

        if (current === '1' || current === '2' || current === '3') {
            current_page = current.charCodeAt(0) - 48;
            var name;
            if (current === '1') name = "portfolio";
            if (current === '2') name = "testimonial";
            if (current === '3') name = "contact";

            $('#' + name).addClass('active').siblings().removeClass('active');
            $('#' + name + 2).addClass('active').siblings().removeClass('active');
        }

        addCounter();
        setTimeout(function() {
            $("#blocker").fadeOut("slow", function() {
                $(this).remove();
            });
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }, 1000);
    })

    function hidewithout(thispage) {
        $("#page" + thispage).fadeIn('fast', function() {
            $(this).show();
        });
        for (var i = 0; i < 4; i++) {
            if (i != thispage && i != 2) {
                $("#page" + i).hide();
            }
        }
    }
    //on body is ready and load
    function afterload() {
        $('.body-loader').addClass('one');
        //current != '0' && current != '1' && current != '2' && current != '3'
        //if not contain anchor link (hide all execept page0)
        hidewithout(current_page);
        setTimeout(function() {
            $('.body-loader').addClass('none');
        }, 1000);
        isPage2(current_page);
    }

    ////////////////////////
    //on page resize
    $(window).resize(function() {
        current = url_num();
        if (current == "2") {
            document.getElementById('aboutme').click();
        }

        //hide page on resize
        for (var i = 0; i < 4; i++) {
            if (i != current_page) $("#page" + i).hide();
        }
    });

    //splash screen(hide and show it with transition)
    document.getElementById('img').classList.remove('none');

    //on key press
    document.addEventListener('keydown', (event) => {
        if (event.keyCode == 36) {
            if ($("#log-in").is(":visible")) {
                $("#log-in").hide();
            } else {
                $("#log-in").fadeIn("slow", function() {
                    $(this).show();
                })
            }
        }
    });

    //on loaded a better profile
    var img = new Image();
    img.addEventListener('load', imageload, false);
    img.src = './assets/profile/myprofile.png';

    function imageload() {
        var photo = document.getElementById('profile');
        photo.classList.remove('blur');
        photo.src = img.src;
        $("#image-loding").fadeOut("slow", function() {
            $(this).remove();
        });
    }

    //open file admin only
    function openFileAdmin() {
        if ($("#adminfile").is(":visible")) $('#adminfile').hide();
        else $("#adminfile").show();
    }

    function addPleaseSwap() {
        if(window.innerWidth < 1000) $(".viewer-2").attr('data-before',
            'Please swap on card for more!'); //anything is the 'content' value
    }

    function addCounter() {
        //do something with the callback
        $(".thank-message").attr('data-before',
            '👋 Thanks for being one of <?php echo $vistitors ?> '); //anything is the 'content' value
        $(".viewer-2").attr('data-before',
            'Thanks for being one of <?php echo $vistitors ?> '); //anything is the 'content' value
    }
    </script>
    <!-- /SCRIPT -->
</body>

</html>