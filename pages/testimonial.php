<?php include('./function.php') ?>
<?php include('./function_testimonial.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/pages/pages.css">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
    * {
        color: white;
    }
    .admin-btn{
        transition: all .5s ease;
    }
    .admin-btn:hover{
        transition: all .5s ease;
        transform: rotate(360deg);
    }
    </style>
</head>

<body>
    <?php if(isLoggedIn()) : ?>
    <a onclick="showAdmin();" style="position: absolute; top: 10px; right: 10px;"><img class="admin-btn"
            style="transform: rotate(45deg);" src="../assets/graphics/close.svg" alt=""></a>
    <a onclick="window.location.href = window.location.href;"
        style="z-index: 10000; position: absolute; top: 10px; right: 50px;"><img class="admin-btn"
            src="../assets/graphics/refresh.svg" style="width: 25px; height: 25px" alt=""></a>
    <div id="admin-container" style="display: none;">
        <div class="top">
            <p>thea@dev:~</p>
            <a href="#" class="close" onclick="hideAdmin()">
                <img src="../assets/graphics/close.svg" alt=""></a>
        </div>
        <div class="admin-editor">
            <div class="table-container">
                <table id="data">
                    <tr>
                        <th>name</th>
                        <th>profile_id</th>
                        <th>from</th>
                        <th>recommend</th>
                    </tr>
                    <?php
                    for($i=0; $i < count($names) ; $i++){               
                        echo '<tr><td>'.$names[$i].'</td>';
                        echo '<td>'.$profile_id[$i].'</td>';
                        echo '<td>'.$from[$i].'</td>';
                        echo '<td>'.$recommend[$i].'</td>';
                    }
                ?>
                </table>
            </div>
            <form method="post" enctype="multipart/form-data" class="bottom">
                <div class="row">
                    <div class="col-50">
                        <input type="text" id="profile_id" name="profile_id" placeholder="profile_id">
                    </div>
                    <div class="col-50">
                        <select id="from" name="from">
                            <option value="Fiverr">Fiverr</option>
                            <option value="Volunteer">Volunteer</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" id="name" name="name" placeholder="name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <textarea id="recommend" name="recommend" placeholder="recommend"
                            style="height:150px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <input class="button-admin bg-blue" class="button-admin bg-blue" type="submit"
                        name="upload-testimonial" value="Upload">
                    <input class="button-admin bg-orange" type="submit" name="delete-testimonial" value="Delete">
                    <input class="button-admin bg-red" type="submit" name="update-testimonial" value="Update">
                </div>
            </form>
        </div>
    </div>
    <?php endif ?>
    <div class="wrapper testimonial">
        <h1>What they said</h1>
        <p>My testimonials will be given from my clients on Fiverr, and also working as a Volunteer. <br>Thier
            recommendation will be put here only if they allowed.</p>
        
        <?php if(count($names) == 0) echo '<p style="cursor: default !important; margin-top: 10px;">No testimonial yet!</p>';?>
        <!-- 🤦‍♂️ -->
        <div class="testi-wrapper">
            <?php
                    echo '<div class="card-container hide-c">';
                    echo '<div class="profile"><img src="../assets/graphics/fiver.svg" alt=""></div>';
                    echo '<p style="margin-top: 10px; color: #4b4b4b;">Please give me a chance to get your works done<br>Currently, I have 2 active services such as Design modern website and<br>Design mobile app UI.</p>';
                    echo '<a href="https://www.fiverr.com/theachoem" target="_blank">Get a quote</a>';
                    echo '</div>';

                    echo '<div class="card-container overflow hide-c">';
                    echo '<div class="profile"><img src="../assets/graphics/volunteer.svg" alt=""></div>';
                    echo '<p style="margin-bottom: 10px; margin-top: 10px; color: #4b4b4b;">For Open Source Projects:<br>If you are creating Open source or non-profit project and need web or mobile UI design, please DM or send a message to theacheng@gmail.com. Just use "Open Source" or "non-profit" in the subject.</p>';
                    echo '</div>';

                if(count($names) != 0){
                    $notfound = "../assets/graphics/notfound_round.png";
                    for($x = 0 ; $x < count($names); $x++){
                        echo '<div class="card-container hide-c">';
                        echo '<div class="profile"><img id="img'.($x).'" src="../assets/testiminial/'.($profile_id[$x]).'.png" alt="" onerror="this.src=\''.$notfound.'\'"></div>';
                        echo '<h3>'.$names[$x].'</h3>';
                        echo '<p>'.$recommend[$x].'</p>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>
    <div id="outerContainer">
        <div id="ps-container">
            <div class="item">
                <p>👆</p>
            </div>
            <div class="circle" style="animation-delay: -3s"></div>
            <div class="circle" style="animation-delay: -2s"></div>
            <div class="circle" style="animation-delay: -1s"></div>
            <div class="circle" style="animation-delay: 0s"></div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script>
    //show admin
    function showAdmin() {
        $('#admin-container').show()
    }

    //hide admin
    function hideAdmin() {
        $('#admin-container').hide()
    }

    //init slick
    function slickCarousel() {
        $('.testi-wrapper').slick({
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: false,
            infinite: false,
            prevArrow: false,
            nextArrow: false,
            responsive: [{
                    breakpoint: 786,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        }).on('setPosition', function(event, slick) {
            slick.$slides.css('height', slick.$slideTrack.height() + 'px');
        });
    }

    //ready function
    $(document).ready(function() {
        slickCarousel();
    });
    </script>

</body>

</html>