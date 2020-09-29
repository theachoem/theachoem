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

    .admin-btn {
        transition: all .5s ease;
    }

    .admin-btn:hover {
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
                <img src="..\assets\graphics\close.svg" alt=""></a>
        </div>
        <div class="admin-editor">
            <div class="table-container">
                <table id="data">
                    <tr>
                        <th>project_id</th>
                        <th>category</th>
                        <th>name</th>
                        <th>date</th>
                    </tr>
                    <?php
                    for($i=0; $i < count($allID) ; $i ++){               
                        echo '<tr><td>'.$allID[$i].'</td>';
                        echo '<td>'.$allCate[$i].'</td>';
                        echo '<td>'.$allName[$i].'</td>';
                        echo '<td>'.$allDate[$i].'.</td></tr>';
                    }
                ?>
                </table>
            </div>
            <form method="post" enctype="multipart/form-data" class="bottom">
                <div class="row">
                    <div class="col-50">
                        <input type="text" id="project_id" name="project_id" placeholder="project_id">
                    </div>
                    <div class="col-50">
                        <select id="category" name="category">
                            <option value="web">web</option>
                            <option value="mobile">mobile</option>
                            <option value="ui">ui</option>
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
                        <textarea id="description" name="description" placeholder="description"
                            style="height:150px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-50">
                        <input type="text" id="techs" name="techs" placeholder="techs">
                    </div>
                    <div class="col-50">
                        <input type="text" class="date" name="dd" placeholder="day">
                        <input type="text" class="date" name="mm" placeholder="month">
                        <input type="text" class="date" name="yy" placeholder="year">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" id="git" name="git" placeholder="git">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" id="dribble" name="dribble" placeholder="dribble">
                    </div>
                </div>
                <div class="row">
                    <input class="button-admin bg-blue" class="button-admin bg-blue" type="submit"
                        name="upload-portfolio" value="Upload">
                    <input class="button-admin bg-orange" type="submit" name="delete-portfolio" value="Delete">
                    <input class="button-admin bg-red" type="submit" name="update-portfolio" value="Update">
                </div>
            </form>
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
        <div class="popup" id="popup" style="display: none;">
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
                        <a href="#" target="viewer" onclick="showViewer();" id="live" class="button green">🔎 View
                            more</a>
                    </div>
                    <div class="right-side">
                        <img src="../assets/graphics/Imacoustic.png" id="portfolio-img" alt=""
                            onerror="this.src='../assets/graphics/notfound.png'">
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
            $notfound = "../assets/graphics/notfound.png";
            echo '<div class="all post" id="slide1">';
                for($i = 0 ; $i < count($allID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$allID[$i].'\', \''.$allName[$i].'\', \''.$allDes[$i].'\', \''.$allDate[$i].'\', \''.$allGit[$i].'\', \''.$allDribble[$i].'\', \''.$allTech[$i].'\')"><img loading="lazy" style="animation-duration: calc('.$i.'s * 0.2 + 0.3s);" src="../assets/portfolio/thumb/'.$allID[$i].'.png" alt="'.$allID[$i].'.png" onerror="this.src=\''.$notfound.'\'"></a>';
                }
            echo '</div>';
            if(count($mobileID) > 0){
                echo '<div class="mobile post" id="slide2">';
                for($i = 0 ; $i < count($mobileID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$mobileID[$i].'\', \''.$mobileName[$i].'\', \''.$mobileDes[$i].'\', \''.$mobileDate[$i].'\', \''.$mobileGit[$i].'\', \''.$mobileDribble[$i].'\', \''.$mobileTech[$i].'\')"><img loading="lazy" style="animation-duration: calc('.$i.'s * 0.2 + 0.3s);" src="../assets/portfolio/thumb/'.$mobileID[$i].'.png" alt="'.$mobileID[$i].'.png" onerror="this.src=\''.$notfound.'\'"></a>';
                }
                echo '</div>';
            }
            if(count($uiID) > 0){
                echo '<div class="ui post" id="slide3">';
                for($i = 0 ; $i < count($uiID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$uiID[$i].'\', \''.$uiName[$i].'\', \''.$uiDes[$i].'\', \''.$uiDate[$i].'\', \''.$uiGit[$i].'\', \''.$uiDribble[$i].'\', \''.$uiTech[$i].'\')"><img style="animation-duration: calc('.$i.'s * 0.2 + 0.3s);" loading="lazy" src="../assets/portfolio/thumb/'.$uiID[$i].'.png" alt="'.$uiID[$i].'.png" onerror="this.src=\''.$notfound.'\'"></a>';
                }
                echo '</div>';
            }
            if(count($webID) > 0){            
                echo '<div class="web post" id="slide4">';
                for($i = 0 ; $i < count($webID); $i++){
                    echo '<a href="#" class="portfolio hide-c" onclick="showPopUp(\''.$webID[$i].'\', \''.$webName[$i].'\', \''.$webDes[$i].'\', \''.$webDate[$i].'\', \''.$webGit[$i].'\', \''.$webDribble[$i].'\', \''.$webTech[$i].'\')"><img style="animation-duration: calc('.$i.'s * 0.2 + 0.3s);" loading="lazy" src="../assets/portfolio/thumb/'.$webID[$i].'.png" alt="'.$webID[$i].'.png" onerror="this.src=\''.$notfound.'\'"></a>';
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
        $('#admin-container').fadeIn("fast", function() {
            $(this).show();
        });
    }
    //show admin
    function hideAdmin() {

        $('#admin-container').fadeOut("fast", function() {
            $(this).hide();
        });
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
    function showPopUp(id, name, description, date, git, dribble, tech) {
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
        $("#live").attr("href", "https://theacheng.github.io/theacheng/docs/" + id);

        if (git.length < 2) $('#git').hide();
        else $("#git").show();

        if (dribble.length < 2) $('#dribble').hide();
        else $("#dribble").show();

        $("#live").show();

        $(".category").fadeOut("fast", function() {
            $(this).hide();
        });

        $(".slider").fadeOut("fast", function() {
            $(this).hide();
        });

        $("#popup").fadeIn("fast", function() {
            $(this).show();
        });
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
        $(".category").show();
        $(".slider").show();

        $("#popup").fadeOut("fast", function() {
            $(this)
        });

        setTimeout(function() {
            var parent = document.getElementById("tech-parent");
            while (parent.lastElementChild) {
                parent.removeChild(parent.lastElementChild);
            }
            document.getElementById('windows').scrollTo(0, 0);
        }, 100);
    }

    $(document).ready(function() {
        $("#blocker").fadeOut("slow", function() {
            $(this).remove();
        });
        hidewithout(1);
    })
    </script>

</body>

</html>