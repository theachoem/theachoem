<?php include('./pages/function.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="strict-origin" />
    <title>Portfolio</title>
    <link rel="shortcut icon" href="assets/graphics/imacoustic.ico" type="image/x-icon">

    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/home/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <style>
    * {
        color: white;
    }
    </style>
</head>

<body onload="afterload()">
    <!-- <div class="construction top">
        <img src="./assets/graphics/warning" alt="">
        <p>This site is under construction!</p>
    </div> -->
    <div id="blocker"><img class="none" id="img" style="height: calc(50px + 10vw); display: inline;"
            src="./assets/profile/imacoustic-logo.svg" alt=""></div>
    <?php
        if(isLoggedIn()) echo '<a href="#" style="position: absolute; right: 10px; top: 10px; z-index: 100000000;" onclick="openFileAdmin()"><img src="./assets/graphics/close.svg" alt=""></a>
            <iframe style="display:none; position: fixed; z-index: 10000; margin-top: -15px;" id="adminfile" width="100%" height="100%" src="./pages/ignore/admin.php"></iframe>'
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
                ?>><i id="thank-message"></i></a>
                <img class="profile blur" id="profile" src="./assets/beforeload/profile/myprofile.png" alt="profile">
                <div class="lds-ring absolute" id="image-loding">
                    <div></div>
                    <div></div>
                    <div></div>
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
        <div class="side-bar">
            <a class="sidebar active" id="aboutme" onclick="addActiveClass('aboutme', 0)" href="#0"><i
                    class="fas fa-user-graduate"></i></a>
            <a class="sidebar" id="portfolio" onclick="addActiveClass('portfolio', 1)" href="#1"><i
                    class="fas fa-clipboard-check"></i></a>
            <a class="sidebar" id="testimonial" onclick="addActiveClass('testimonial', 2)" href="#2"><i
                    class="fas fa-comment-alt"></i></a>
            <a class="sidebar" id="contact" onclick="addActiveClass('contact', 3)" href="#3"><i
                    class="fas fa-id-card-alt"></i></a>
        </div>
        <div class="right-side">
            <iframe class="page" id="page0" src="./pages/aboutme.php"></iframe>
            <iframe class="page" id="page1" src="./pages/portfolio.php"></iframe>
            <iframe class="page" id="page3" src="./pages/contact.php"></iframe>
            <iframe class="page" id="page2" src="./pages/testimonial.php"></iframe>
        </div>
    </div>
    <div id="copyright">
        <!-- <p>Copyright &copy; 2020 Thea Choem</p> -->
    </div>
    <div class="blocker-loading">
        <div class="loading-download none" id="loading-downloading">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <p id="downloading-p">Loading contents . . .</p>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>

    <!-- SCRIPT -->
    <script>
    var current_page = 0;
    $('.construction').removeClass('top');

    function addActiveClass(name, index) {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        $('#' + name).addClass('active').siblings().removeClass('active');
        $('#' + name + 2).addClass('active').siblings().removeClass('active');
        hidewithout(index);
        current_page = index;
    };

    //on page is ready 
    $(document).ready(function() {
        var current;
        var pageURL = String($(location).attr("href"));
        current = pageURL[pageURL.length - 1];

        if (current === '1' || current === '2' || current === '3') {
            current_page = current.charCodeAt(0) - 48;
            var name;
            if (current === '1') name = "portfolio";
            if (current === '2') name = "testimonial";
            if (current === '3') name = "contact";

            $('#' + name).addClass('active').siblings().removeClass('active');
            $('#' + name + 2).addClass('active').siblings().removeClass('active');
        }

        setTimeout(function() {
            $("#blocker").fadeOut("slow", function() {
                $(this).remove();
            });
        }, 1000);

        setTimeout(function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            // $('.construction').addClass('top');
        }, 800);
    })


    function hidewithout(thispage) {
        $("#page" + thispage).fadeIn({
            queue: false,
            duration: 'fast'
        }, function() {
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
        //current != '0' && current != '1' && current != '2' && current != '3'
        //if not contain anchor link (hide all execept page0)
        hidewithout(current_page);

        setTimeout(function() {
            $(".blocker-loading").fadeOut("slow", function() {
                $(this).remove();
            });
        }, 500);

        // setTimeout(function() {
        //     $('.construction').removeClass('top');
        // }, 3000);
    }

    ////////////////////////
    //on page resize
    $(window).resize(function() {
        //hide page on resize
        for (var i = 0; i < 4; i++) {
            if (i != current_page) $("#page" + i).hide();
        }
    });

    //splash screen(hide and show it with transition)
    document.getElementById('img').classList.remove('none');
    setTimeout(function() {
        document.getElementById('loading-downloading').classList.remove('none');
    }, 100);

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
    </script>
    <!-- /SCRIPT -->
</body>

</html>