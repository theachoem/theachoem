<?php
        //CHECK IF NOT EMPTY
        function isnonempty($name, $recommend, $id){
            if(!empty($name) and !empty($recommend) and !empty($id)){
                return true;
            }
            else{
                echo '<script>alert("Empty Input");</script>';
                return false;
            }
        }

        //DELETE QUERY
        if(isset($_POST['deletetesti'])){
            $id = $_POST['idpath'];
            $target = "../assets/testiminial/$id.png";
            if(isnonempty($id, $target, 'com')){
                $sql = "DELETE FROM `testimonial` WHERE `testimonial`.`image` = '$id'";
                try{
                    unlink($target);
                    mysqli_query($db, $sql);
                    echo '<script>alert("DELETE!");</script>';
                } catch(Exception  $e){
                    echo '<script language="javascript">';
                    echo 'alert("Caught exception")';  
                    echo '</script>';
                }
 
            }
        }

        //UPDATE QUERY
        if(isset($_POST['updatetesti'])){
            $id = $_POST['idpath'];
            $target = "../assets/testiminial/$id.png";
            $recommend = $_POST['recommend'];
            $name = $_POST['name'];
            if (empty($_FILES['image']['size'])){
                $sql = "UPDATE `testimonial` SET `name` = '$name', `recommend` = '$recommend' WHERE `testimonial`.`image` = '$id'";
                try{
                    mysqli_query($db, $sql);
                    echo '<script>alert("UPDATED!");</script>';
                } catch(Exception  $e){
                    echo '<script language="javascript">';
                    echo 'alert("Caught exception")';  
                    echo '</script>';
                }
            }
            else{
                $target = "../assets/testiminial/$id.png";
                unlink($target);
                $sql = "UPDATE `testimonial` SET `name` = '$name', `recommend` = '$recommend', `image` = '$id' WHERE `testimonial`.`image` = '$id'";
                try{
                    mysqli_query($db, $sql);
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    echo '<script>alert("UPDATED!");</script>';
                }catch(Exception  $e){
                    echo '<script language="javascript">';
                    echo 'alert("Caught exception")';
                    echo '</script>';
                }
            }
        }

        //UPLOAD TO QUERY
        if(isset($_POST['uploadtesti'])){
            $id = $_POST['idpath'];
            $target = "../assets/testiminial/$id.png";
            // $image = $_FILES['image']['name'];
            $recommend = $_POST['recommend'];
            $name = $_POST['name'];

            if(isnonempty($name, $recommend, $id)){
                $sql = "INSERT INTO `testimonial` (`name`, `recommend`, `image`) VALUES ('$name', '$recommend', '$id')";
                try{
                    mysqli_query($db, $sql);
                }catch(Exception  $e){
                    echo '<script language="javascript">';
                    echo 'alert("Caught exception")';  
                    echo '</script>';
                }
                try{
                    mysqli_query($db, $sql);
                    //MOVE IMAGE
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                    echo '<script>alert("UPLOADED!");</script>';
                }catch(Exception  $e){
                    echo '<script language="javascript">';
                    echo 'alert("Caught exception")';  
                    echo '</script>';
                }
            }
        }        

        $res = mysqli_query($db, "SELECT * FROM `testimonial`");
?>