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
    </style>
</head>

<body>
    <?php 
        if(isLoggedIn())
            echo '<a onclick="showAdmin();" style="position: absolute; top: 10px; right: 10px;"><img style="transform: rotate(45deg);" src="../assets/graphics/close.svg" alt=""></a>';      
    ?>
    <?php if(isLoggedIn()) : ?>
    <div id="admin-testimonial">
        <div class="container-testimonial" id="popupWin">
            <div class="top">
                <p>thea@dev:~</p>
                <a href="#" class="close" onclick="hideAdmin()">
                    <img src="..\assets\graphics\close.svg" alt=""></a>
            </div>
            <form method="post" enctype="multipart/form-data" class="bottom">
                <input type="text" id="name" name="name" placeholder="name">
                <input type="text" id="idpath" name="idpath" placeholder="id">
                <textarea name="recommend" id="recommend" cols="30" rows="10" placeholder="recommend"></textarea>
                <input type="file" name="image" id="image-input">
                <div style="display: inline;" class="btn">
                    <input id="uploadtesti" class="bg-blue" type="submit" name="uploadtesti" value="Upload">
                    <input id="uploadtesti" class="bg-red" type="submit" name="deletetesti" value="Delete">
                    <input id="uploadtesti" class="bg-green" type="submit" name="updatetesti" value="Update">
                </div>
            </form>
            <div class="right-side"
                style="overflow-y: scroll; overflow-x: hidden; position: absolute; width: 200px; height: 250px; background: transparent; right: 0; bottom: 0;">
                <p>ID: </p><br>
                <?php
                     while($row = mysqli_fetch_array($res)){
                        echo '<p>'.$row['image'].'</p><br>';
                    }
                ?>
            </div>
        </div>
    </div>
    <?php endif ?>
    <div class="wrapper testimonial">
        <h1>What they said</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, vitae libero. Ullam expedita totam enim
            perferendis doloribus assumenda minima, sequi soluta nisi minus cumque est cum illo. Hic, labore veniam?</p>

        <div class="testi-slider">
            <div class="testi-wrapper">
                <?php
                $res = mysqli_query($db, "SELECT * FROM `testimonial`");
                $names = array();
                $images = array();
                $describe = array();
                
                while($row = mysqli_fetch_array($res)){
                    array_push($names, $row['name']);
                    array_push($images, $row['image']);
                    array_push($describe, $row['recommend']);
                }
                
                for($x = 0 ; $x < count($names); $x++){
                    echo '<div class="card-container">';
                    echo '<div class="profile"><img id="img'.($x).'" src="../assets/testiminial/'.($images[$x]).'.png" alt=""></div>';
                    echo '<h3>'.$names[$x].'</h3>';
                    echo '<p>'.$describe[$x].'</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script>
    //show admin
    function showAdmin() {
        $('#admin-testimonial').show()
    }

    //hide admin
    function hideAdmin() {
        $('#admin-testimonial').hide()
    }

    //init slick
    function slickCarousel() {
        $('.testi-wrapper').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
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
        })
    }

    //ready function
    $(document).ready(function() {
        slickCarousel();
        hideAdmin();
    });
    </script>

</body>

</html>