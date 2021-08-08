<?php
$res = mysqli_query($db, "SELECT * FROM `testimonial`");
$names = array();
$profile_id = array();
$recommend = array();
$from = array();

while ($row = mysqli_fetch_array($res)) {
    array_push($names, $row['name']);
    array_push($profile_id, $row['profile_id']);
    array_push($recommend, $row['recommend']);
    array_push($from, $row['from']);
}

//CHECK IF NOT EMPTY
function isnonempty($profile_id, $name, $from, $recommend)
{
    if (!empty($profile_id) and !empty($name) and !empty($from) and !empty($recommend)) {
        return true;
    } else {
        echo '<script>alert("Empty Input");</script>';
        return false;
    }
}

//DELETE QUERY
if (isset($_POST['delete-testimonial'])) {
    $profile_id = $_POST['profile_id'];
    $from = $_POST['from'];
    if (!empty($profile_id)) {
        $sql = "DELETE FROM `testimonial` WHERE `testimonial`.`profile_id` = '$profile_id' AND `testimonial`.`from` = '$from'";
        try {
            mysqli_query($db, $sql);
        } catch (Exception  $e) {
            echo '<script language="javascript">';
            echo 'alert("Caught exception")';
            echo '</script>';
        }

        $result = mysqli_query($db, "SELECT * FROM `testimonial` WHERE `testimonial`.`profile_id` = '$profile_id'");
        if (mysqli_num_rows($result) == 0) echo '<script>alert("Delete!");</script>';
        else echo '<script>alert("wrong input!");</script>';

    }
}

//UPDATE QUERY
if (isset($_POST['update-testimonial'])) {
    $profile_id = $_POST['profile_id'];
    $from = $_POST['from'];
    $recommend = $_POST['recommend'];
    $name = $_POST['name'];

    if (!empty($profile_id)) {
        $sql = "UPDATE `testimonial` SET ";
        if (!empty($recommend)) $sql = $sql . " `recommend` = '$recommend', ";
        if (!empty($name)) $sql = $sql . "`name` = '$name'";
        if (!empty($from)) $sql = $sql . " `from` = '$from' ";
        $sql = $sql . " WHERE `testimonial`.`profile_id` = '$profile_id'";
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

//UPLOAD TO QUERY
if (isset($_POST['upload-testimonial'])) {
    $profile_id = $_POST['profile_id'];
    $from = $_POST['from'];
    $recommend = $_POST['recommend'];
    $name = $_POST['name'];

    if (isnonempty($profile_id, $name, $from, $recommend)) {
        $sql = "INSERT INTO `testimonial` (`from`, `name`, `recommend`, `profile_id`) VALUES ('$from', '$name','$recommend', '$profile_id')";
        try {
            mysqli_query($db, $sql);
        } catch (Exception  $e) {
            echo '<script language="javascript">';
            echo 'alert("Caught exception")';
            echo '</script>';
        }

        $result = mysqli_query($db, "SELECT * FROM `testimonial` WHERE `testimonial`.`profile_id` = '$profile_id' AND `testimonial`.`from` = '$from'");
        if (mysqli_num_rows($result) != 0) echo '<script>alert("Uploaded!");</script>';
        else echo '<script>alert("wrong input!");</script>';
    }
}
?>