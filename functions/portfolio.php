<?php
$mobileID = array();
$webID = array();
$uiID = array();

$mobileCate = array();
$webCate = array();
$uiCate = array();

$mobileName = array();
$webName = array();
$uiName = array();

$mobileDes = array();
$webDes = array();
$uiDes = array();

$mobileDate = array();
$webDate = array();
$uiDate = array();

$mobileGit = array();
$webGit = array();
$uiGit = array();

$mobileDribble = array();
$webDribble = array();
$uiDribble = array();

$mobileTech = array();
$webTech = array();
$uiTech = array();

$webRes = mysqli_query($db, "SELECT * FROM `works` WHERE category = 'web'");
$uiRes = mysqli_query($db, "SELECT * FROM `works` WHERE category = 'ui'");
$mobileRes = mysqli_query($db, "SELECT * FROM `works` WHERE category = 'mobile'");

while ($row = mysqli_fetch_array($mobileRes)) {
    array_push($mobileID, $row['project_id']);
    array_push($mobileDes, $row['description']);
    array_push($mobileName, $row['name']);
    array_push($mobileCate, $row['category']);
    array_push($mobileDate, $row['date']);

    array_push($mobileGit, $row['github']);
    array_push($mobileDribble, $row['dribble']);
    array_push($mobileTech, $row['techs']);
}

while ($row = mysqli_fetch_array($uiRes)) {
    array_push($uiID, $row['project_id']);
    array_push($uiDes, $row['description']);
    array_push($uiName, $row['name']);
    array_push($uiCate, $row['category']);
    array_push($uiDate, $row['date']);

    array_push($uiGit, $row['github']);
    array_push($uiDribble, $row['dribble']);
    array_push($uiTech, $row['techs']);
}

while ($row = mysqli_fetch_array($webRes)) {
    array_push($webID, $row['project_id']);
    array_push($webDes, $row['description']);
    array_push($webName, $row['name']);
    array_push($webCate, $row['category']);
    array_push($webDate, $row['date']);

    array_push($webGit, $row['github']);
    array_push($webDribble, $row['dribble']);
    array_push($webTech, $row['techs']);
}

$allID = array_merge($mobileID, array_merge($webID, $uiID));
$allDes = array_merge($mobileDes, array_merge($webDes, $uiDes));
$allName = array_merge($mobileName, array_merge($webName, $uiName));
$allCate = array_merge($mobileCate, array_merge($webCate, $uiCate));
$allDate = array_merge($mobileDate, array_merge($webDate, $uiDate));
$allGit = array_merge($mobileGit, array_merge($webGit, $uiGit));
$allDribble = array_merge($mobileDribble, array_merge($webDribble, $uiDribble));
$allTech = array_merge($mobileTech, array_merge($webTech, $uiTech));

//CHECK IF NOT EMPTY
function isnonempty($project_id, $name, $description, $techs)
{
    if (!empty($project_id) and !empty($name) and !empty($description) and !empty($techs)) {
        return true;
    } else {
        echo '<script>alert("Has empty Input!");</script>';
        return false;
    }
}

//DELETE QUERY
if (isset($_POST['delete-portfolio'])) {
    $project_id = $_POST['project_id'];
    $category = $_POST['category'];
    if (!empty($project_id)) {
        $sql = "DELETE FROM `works` WHERE `works`.`project_id` = '$project_id' AND `works`.`category` = '$category'";
        try {
            mysqli_query($db, $sql);
        } catch (Exception $e) {
            echo '<script language="javascript">';
            echo 'alert("Caught exception")';
            echo '</script>';
        }
        $result = mysqli_query($db, "SELECT * FROM `works` WHERE category = '$category' AND `project_id` = '$project_id'");
        if (mysqli_num_rows($result) == 0) echo '<script>alert("Delete!");</script>';
        else echo '<script>alert("wrong input!");</script>';
    }
}

//UPDATE QUERY
if (isset($_POST['update-portfolio'])) {
    $project_id = $_POST['project_id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $techs = $_POST['techs'];
    $git = $_POST['git'];
    $dribble = $_POST['dribble'];
    $dd = $_POST['dd'];
    $mm = $_POST['mm'];
    $yy = $_POST['yy'];

    $sql = "";
    if (!empty($project_id)) {
        $sql = "UPDATE `works` SET ";
        if (!empty($name)) $sql = $sql . " `name` = '$name', ";
        if (!empty($description)) $sql = $sql . "`description` = '$description', ";
        if (!empty($techs)) $sql = $sql . "`techs` = '$techs', ";
        if (!empty($git)) $sql = $sql . "`github` = '$git', ";
        if (!empty($dribble)) $sql = $sql . "`dribble` = '$dribble', ";
        if (!empty($dd) and !empty($mm) and !empty($yy)) $sql = $sql . "`date` = '$yy-$mm-$dd', ";
        if (!empty($category)) $sql = $sql . " `category` = '$category' ";
        $sql = $sql . " WHERE `works`.`project_id` = '$project_id'";
    }
    try {
        mysqli_query($db, $sql);
        echo '<script>alert("' . $sql . '");</script>';
    } catch (Exception $e) {
        echo '<script language="javascript">';
        echo 'alert("Caught exception")';
        echo '</script>';
    }
}
//name, description, image, category
//UPLOAD TO QUERY
if (isset($_POST['upload-portfolio'])) {
    $project_id = $_POST['project_id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $techs = $_POST['techs'];
    $git = $_POST['git'];
    $dribble = $_POST['dribble'];
    $dd = $_POST['dd'];
    $mm = $_POST['mm'];
    $yy = $_POST['yy'];

    if (isnonempty($project_id, $name, $description, $techs) and !empty($dd) and !empty($mm) and !empty($yy)) {
        $sql = "INSERT INTO `works` (`techs`, `project_id`, `category`, `name`, `description`, `date`, `github`, `dribble`) VALUES ('$techs', '$project_id', '$category', '$name', '$description', '$yy-$mm-$dd', '$git', '$dribble')";
        try {
            mysqli_query($db, $sql);

            $result = mysqli_query($db, "SELECT * FROM `works` WHERE category = '$category' AND `project_id` = '$project_id'");
            if (mysqli_num_rows($result) != 0) echo '<script>alert("Upload!");</script>';
            else echo '<script>alert("Upload fail!");</script>';
        } catch (Exception $e) {
            echo '<script language="javascript">';
            echo 'alert("Caught exception")';
            echo '</script>';
        }
    }
}
?>