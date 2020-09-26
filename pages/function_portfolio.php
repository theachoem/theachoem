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

$mobileLive = array();
$webLive = array();
$uiLive = array();

$mobileTech = array();
$webTech = array();
$uiTech = array();

$webRes = mysqli_query($db, "SELECT * FROM `works` WHERE category = 'web'");
$uiRes = mysqli_query($db, "SELECT * FROM `works` WHERE category = 'ui'");
$mobileRes = mysqli_query($db, "SELECT * FROM `works` WHERE category = 'mobile'");

while ($row = mysqli_fetch_array($mobileRes))
{
    array_push($mobileID, $row['project_id']);
    array_push($mobileDes, $row['description']);
    array_push($mobileName, $row['name']);
    array_push($mobileCate, $row['category']);
    array_push($mobileDate, $row['date']);

    array_push($mobileGit, $row['github']);
    array_push($mobileDribble, $row['dribble']);
    array_push($mobileLive, $row['live-review']);

    array_push($mobileTech, $row['techs']);
}

while ($row = mysqli_fetch_array($uiRes))
{
    array_push($uiID, $row['project_id']);
    array_push($uiDes, $row['description']);
    array_push($uiName, $row['name']);
    array_push($uiCate, $row['category']);
    array_push($uiDate, $row['techs']);

    array_push($uiGit, $row['dribble']);
    array_push($uiDribble, $row['dribble']);
    array_push($uiLive, $row['dribble']);

    array_push($uiTech, $row['techs']);
}

while ($row = mysqli_fetch_array($webRes))
{
    array_push($webID, $row['project_id']);
    array_push($webDes, $row['description']);
    array_push($webName, $row['name']);
    array_push($webCate, $row['category']);
    array_push($webDate, $row['date']);

    array_push($webGit, $row['github']);
    array_push($webDribble, $row['dribble']);
    array_push($webLive, $row['live-review']);

    array_push($webTech, $row['techs']);
}

$allID = array_merge($mobileID, array_merge($webID, $uiID));
$allDes = array_merge($mobileDes, array_merge($webDes, $uiDes));
$allName = array_merge($mobileName, array_merge($webName, $uiName));
$allCate = array_merge($mobileCate, array_merge($webCate, $uiCate));
$allDate = array_merge($mobileDate, array_merge($webDate, $uiDate));
$allGit = array_merge($mobileGit, array_merge($webGit, $uiGit));
$allDribble = array_merge($mobileDribble, array_merge($webDribble, $uiDribble));
$allLive = array_merge($mobileLive, array_merge($webLive, $uiLive));
$allTech = array_merge($mobileTech, array_merge($webTech, $uiTech));
//CHECK IF NOT EMPTY
function isnonempty($id, $description, $name, $category, $total, $thumbPath)
{
    if (!empty($id) and !empty($description) and !empty($name) and !empty($category) and $total > 0 and !empty($thumbPath))
    {
        return true;
    }
    else
    {
        echo '<script>alert("Empty Input");</script>';
        return false;
    }
}
//DELETE QUERY
if (isset($_POST['deletetesti']))
{
    $id = $_POST['idpath'];
    $category = $_POST['category'];
    $target = "../assets/portfolio/$category/$id/";
    $thumbPath = "../assets/portfolio/thumb/$id.png";
    if (!empty($id) and !empty($category))
    {
        $sql = "DELETE FROM `works` WHERE `works`.`project_id` = '$id'";
        try
        {
            unlink($thumbPath);
            delete_files($target);
            mysqli_query($db, $sql);
            echo '<script>alert("DELETE!");</script>';
        }
        catch(Exception $e)
        {
            echo '<script language="javascript">';
            echo 'alert("Caught exception")';
            echo '</script>';
        }
    }
}

//UPDATE QUERY
if (isset($_POST['updatetesti']))
{
    $id = $_POST['idpath'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $total = count($_FILES['images']['name']);
    $thumbPath = $_FILES['thumb']['name'];
    $builddate = $_POST['builtdate'];

    $sql = "";
    if (!empty($id))
    {
        $sql = "UPDATE `works` SET ";
        if (!empty($description))
        {
            $sql = $sql . "`description` = '$description' ";
        }
        if (!empty($name)) $sql = $sql . " `name` = '$name', ";
        if (!empty($builddate)) $sql = $sql . "`date` = '$builddate', ";
        if (!empty($category)) $sql = $sql . " `category` = '$category' ";
        if (!empty($thumbPath))
        {
            $tmpthumbPath = $_FILES['thumb']['tmp_name'];
            $targetthumb = "../assets/portfolio/thumb/$id.png";
            move_uploaded_file($tmpthumbPath, $targetthumb);
        }
        $sql = $sql . " WHERE `works`.`project_id` = '$id'";
    }

    try
    {
        mysqli_query($db, $sql);
        echo '<script>alert("' . $sql . '");</script>';
    }
    catch(Exception $e)
    {
        echo '<script language="javascript">';
        echo 'alert("Caught exception")';
        echo '</script>';
    }
}
//name, description, image, category
//UPLOAD TO QUERY
if (isset($_POST['uploadtesti']))
{
    $id = $_POST['idpath'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $total = count($_FILES['images']['name']);
    $thumbPath = $_FILES['thumb']['name'];
    $builddate = $_POST['builtdate'];

    echo '<script language="javascript">';
    echo 'alert("' . $builddate . '")';
    echo '</script>';

    if (!file_exists('../assets/portfolio/' . $category . '/' . $id)) mkdir("../assets/portfolio/$category/" . $id);

    if (isnonempty($id, $description, $name, $category, $total, $thumbPath))
    {

        $sql = "INSERT INTO `works` (`project_id`, `category`, `name`, `description`, `count_image`, `date`) VALUES ('$id', '$category', '$name ', '$description', '$total', '$builddate')";
        try
        {
            mysqli_query($db, $sql);
        }
        catch(Exception $e)
        {
            echo '<script language="javascript">';
            echo 'alert("Caught exception")';
            echo '</script>';
        }

        $tmpthumbPath = $_FILES['thumb']['tmp_name'];
        $targetthumb = "../assets/portfolio/thumb/$id.png";
        move_uploaded_file($tmpthumbPath, $targetthumb);

        for ($i = 0;$i < $total;$i++)
        {
            //Get the temp file path
            $tmpFilePath = $_FILES['images']['tmp_name'][$i];
            $target = "../assets/portfolio/$category/$id/$id$i.png";

            //Make sure we have a file path
            if ($tmpFilePath != "")
            {
                //Upload the file into the temp dir
                move_uploaded_file($tmpFilePath, $target);
                echo '<script>console.log("' . $i . '");</script>';
            }
            else
            {
                echo '<script>console.log("last");</script>';
            }
        }
    }
}
//IS LOG IN
$res = mysqli_query($db, "SELECT * FROM `testimonial`");
?>
