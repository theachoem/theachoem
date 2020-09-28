<?php include('./function.php') ?>
<?php include('./function_portfolio.php') ?>
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
    <link href="../styles/jquery-ui.css" rel="stylesheet" />

    <style>
    * {
        color: white;
    }
    </style>
</head>

<body>
    <?php if(isLoggedIn()) : ?>
    <a onclick="showAdmin();" style="position: absolute; top: 10px; right: 10px;"><img style="transform: rotate(45deg);"
            src="../assets/graphics/close.svg" alt=""></a>
    <div id="admin-testimonial">
        <div class="container-testimonial" id="popupWin">
            <div class="top">
                <p>thea@dev:~</p>
                <a href="#" class="close" onclick="hideAdmin()">
                    <img src="..\assets\graphics\close.svg" alt=""></a>
            </div>

            <form method="post" enctype="multipart/form-data" class="bottom">
                <input type="text" class="input half" id="name" name="name" placeholder="name">
                <input type="text" class="input half" id="idpath" name="idpath" placeholder="id">

                <input type="text" class="input" id="techs" name="techs" placeholder="techs">
                <textarea name="description" id="recommend" cols="20" rows="5" placeholder="description"></textarea>

                <input type="text" class="input half" id="git" name="git" placeholder="github">
                <input type="text" class="input half" id="dribble" name="dribble" placeholder="dribble">
                <input type="text" class="input half" id="live" name="live" placeholder="live-preview">

                <br>
                <label
                    style="font-family: 'Quicksand'; font-size: 14px; padding-left: 2px; margin-top: 10px; color: white;"
                    for="image[]">Images</label>
                <input type="file" name="images[]" id="image-input" multiple="multiple">
                <label
                    style="font-family: 'Quicksand'; font-size: 14px; padding-left: 2px; margin-top: 10px; color: white;"
                    for="image[]">Thumbnail</label>
                <input type="file" name="thumb" id="image-input">
                <hr style="width: 70%;">
                <input type="text" id="datepicker" name="builtdate" placeholder="Date"
                    style=" border: none; padding-left: 8px; border-radius: 5px;">
                <select id="category" name="category">
                    <option value="mobile">mobile</option>
                    <option value="web">web</option>
                    <option value="ui">ui</option>
                </select>
                <hr style="width: 70%;">
                <div style="display: inline;" class="btn">
                    <input id="uploadtesti" class="bg-blue" type="submit" name="uploadtesti" value="Upload">
                    <input id="uploadtesti" class="bg-red" type="submit" name="deletetesti" value="Delete">
                    <input id="uploadtesti" class="bg-green" type="submit" name="updatetesti" value="Update">
                </div>
            </form>
            <div class="right-side"
                style="overflow-y: scroll; overflow-x: hidden; position: absolute; width: 200px; height: 250px; background: transparent; right: 0; bottom: 0;">
                <p>ID: </p>
                <?php
                    for($i = 0; $i<count($allID); $i++){
                        echo '<p>'.$allID[$i].' ('.$allCate[$i].')</p><br>';
                    }
                ?>
            </div>
        </div>
    </div>
    <?php endif ?>
    <h1 id="header">Portfolio</h1>
    <div class="wrapper portfolio">
        <div class="viewer-container" style="display: none;">
            <div class="top">
                <p>thea@dev:~</p>
                <a href="#" class="close" onclick="closeViewer()">
                    <img src="../assets/graphics/close.svg" alt="">
                </a>
            </div>
            <iframe src="" name="viewer" id="view-web" frameborder="0" class="portfolio-view" height="100%"
                width="100%"></iframe>
        </div>
        <div class="popup" id="popup">
            <div class="container" id="windows">
                <div class="top">
                    <p>thea@dev:~</p>
                    <a href="#" class="close" onclick="hidePopUp()">
                        <img src="../assets/graphics/close.svg" alt="">
                    </a>
                </div>
                <div class="bottom">
                    <div class="left-side">
                        <h1 id="portfolio-title" style="display: block;">Empty</h1>
                        <div class="tech" id="tech-parent"></div>
                        <hr>
                        <p>Finished date: <span id="portfolio-date">Empty</span></p>
                        <p id="portfolio-des" style="margin: 5px 0;">Empty</p>
                        <a href="#" target="_blank" id="git" class="button">🛠 GitHub</a>
                        <a href="#" target="_blank" id="dribble" class="button orange">✒️ Dribble</a>
                        <a href="#" target="viewer" onclick="showViewer();" id="live" class="button green">🔎 View more</a>
                    </div>
                    <div class="right-side">
                        <img src="../assets/graphics/Imacoustic.png" id="portfolio-img" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="category hide-c">
            <a class="cate hide-c active" id="all" onclick="addActiveClass('all', 1)">All</a>
            <?php
                $categoryBtn = array('mobile', 'ui', 'web');
                if(count($mobileID) > 0)
                    echo '<a class="cate hide-c" id="mobile" onclick="addActiveClass(\''.$categoryBtn[0].'\', 2)">Mobile Application</a>';
                if(count($uiID) > 0)
                    echo '<a class="cate hide-c" id="ui" onclick="addActiveClass(\''.$categoryBtn[1].'\', 3)">UI Design</a>';
                if(count($webID) > 0)
                    echo '<a class="cate hide-c" id="web" onclick="addActiveClass(\''.$categoryBtn[2].'\', 4)">Website</a>';
            ?>
        </div>
        <div class="slider">
            <?php
            echo '<div class="all post" id="slide1">';
                for($i = 0 ; $i < count($allID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$allID[$i].'\', \''.$allName[$i].'\', \''.$allDes[$i].'\', \''.$allDate[$i].'\', \''.$allGit[$i].'\', \''.$allDribble[$i].'\', \''.$allLive[$i].'\', \''.$allTech[$i].'\')"><img loading="lazy" src="../assets/portfolio/thumb/'.$allID[$i].'.png" alt="'.$allID[$i].'.png"></a>';
                }
            echo '</div>';
            if(count($mobileID) > 0){
                echo '<div class="mobile post" id="slide2">';
                for($i = 0 ; $i < count($mobileID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$mobileID[$i].'\', \''.$mobileName[$i].'\', \''.$mobileDes[$i].'\', \''.$mobileDate[$i].'\', \''.$mobileGit[$i].'\', \''.$mobileDribble[$i].'\', \''.$mobileLive[$i].'\', \''.$mobileTech[$i].'\')"><img loading="lazy" src="../assets/portfolio/thumb/'.$mobileID[$i].'.png" alt="'.$mobileID[$i].'.png"></a>';
                }
                echo '</div>';
            }
            if(count($uiID) > 0){
                echo '<div class="ui post" id="slide3">';
                for($i = 0 ; $i < count($uiID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$uiID[$i].'\', \''.$uiName[$i].'\', \''.$uiDes[$i].'\', \''.$uiDate[$i].'\', \''.$uiGit[$i].'\', \''.$uiDribble[$i].'\', \''.$uiLive[$i].'\', \''.$uiTech[$i].'\')"><img loading="lazy" src="../assets/portfolio/thumb/'.$uiID[$i].'.png" alt="'.$uiID[$i].'.png"></a>';
                }
                echo '</div>';
            }
            if(count($webID) > 0){            
                echo '<div class="web post" id="slide4">';
                for($i = 0 ; $i < count($webID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$webID[$i].'\', \''.$webName[$i].'\', \''.$webDes[$i].'\', \''.$webDate[$i].'\', \''.$uiGit[$i].'\', \''.$uiDribble[$i].'\', \''.$uiLive[$i].'\', \''.$webTech[$i].'\')"><img loading="lazy" src="../assets/portfolio/thumb/'.$webID[$i].'.png" alt="'.$webID[$i].'.png"></a>';
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.min.js"></script>

    <script>
    //hide admin
    function showAdmin() {
        $('#admin-testimonial').show()
    }
    //show admin
    function hideAdmin() {
        $('#admin-testimonial').hide()
    }

    $(function() {
        $("#datepicker").datepicker();
    });

    $('#datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        altField: '#datepicker',
        altFormat: 'yy-mm-dd'
    });
    //add active class
    function addActiveClass(name, thispage) {
        $('#' + name).addClass('active').siblings().removeClass('active');
        hidewithout(thispage);
    }

    //hide pages
    function hidewithout(thispage) {
        $("#slide" + thispage).fadeIn({
            queue: false,
            duration: 'fast'
        }, function() {
            $(this).show();
        });
        for (var i = 1; i < 5; i++) {
            if (i != thispage) {
                $("#slide" + i).fadeOut("fast", function() {
                    $(this).hide();
                });
            }
        }
    }
    
    //show pop up windows
    function showPopUp(id, name, description, date, git, dribble, live, tech) {
        document.getElementById("portfolio-title").innerHTML = name;
        document.getElementById("portfolio-img").src = "../assets/portfolio/thumb/" + id + '.png';
        document.getElementById("portfolio-des").innerHTML = description;
        document.getElementById("portfolio-date").innerHTML = date;

        var techs = tech.split(" ");;
        for (var i = 0; i < techs.length; i++) {
            var tech_tmp = techs[i]
            techs[i] = techs[i].replace('_', ' ');

            var parent = document.getElementById("tech-parent");
            var newElement = document.createElement("p");
            newElement.setAttribute('id', "tech");
            newElement.innerHTML = techs[i];
            parent.appendChild(newElement);
        }


        $("#git").attr("href", git);
        $("#dribble").attr("href", dribble);
        $("#live").attr("href", live);

        if (git.length < 2) $('#git').hide();
        else $("#git").show();

        if (dribble.length < 2) $('#dribble').hide();
        else $("#dribble").show();

        if (live.length < 2) $('#live').hide();
        else $("#live").show();

        $("#popup").fadeIn("fast", function() {
            $(this).show();
        });

        setTimeout(function() {
            $("#popup").scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            // $('.construction').addClass('top');
        }, 200);
    }

    function showViewer() {
        $(".viewer-container").fadeIn("slow", function() {
            $(this).show();
        });
    }

    function closeViewer() {
        $(".viewer-container").fadeIn("slow", function() {
            $(this).hide();
        });
        document.getElementById("view-web").src = "#"
    }

    function hidePopUp() {
        $("#popup").fadeOut("fast", function() {
            $(this).hide();
        });

        setTimeout(function() {
            var parent = document.getElementById("tech-parent");
            while (parent.lastElementChild) {
                parent.removeChild(parent.lastElementChild);
            }
        }, 100);
    }

    $(document).ready(function() {
        $('#admin-testimonial').hide()
        $("#popup").hide();
        $("#blocker").fadeOut("slow", function() {
            $(this).remove();
        });
        hidewithout(1);
    })
    </script>

</body>

</html>