<?php 
    include("ignore/file.php");
    session_start();

    $password = PASSWORD; 
    $username = USERNAME;
    $db = mysqli_connect('us-cdbr-east-02.cleardb.com', $username, $password, 'heroku_0d22f250ec9246f');

    //C:/Users/theac/.gitconfig
    //git config --add --global alias.ph "echo '' > .gitignore && git add . && git commit -m '$1' && shift && git push heroku master && echo 'pages/ignore/' > .gitignore && git rm -r --cached . && git add . && git commit -m '$1' && git push origin master"
    //echo "" > .gitignore && git add . && git commit -m 'test' && git push heroku master && echo 'pages/ignore/' > .gitignore && git rm -r --cached . && git add . && git commit -m 'test' && git push origin master
    
    //ALTER TABLE `works` ADD `date` DATE NOT NULL AFTER `description`; 
    //variable declaration
    $error = 0;
    $password = "";
    $email = "";

    if (isset($_POST['submit'])) { 
        $email = e($_POST['email']);
        $password = e($_POST['password']);
    
        if(empty($email) || empty($password)){
            echo "<script language='javascript'>"; 
            echo "alert('Empty string!')"; 
            echo "</script>";
            $error = $error + 1;
        }
        if($error == 0){
            $password = md5($password);
            $queryPass = mysqli_query($db, "SELECT password FROM `user` WHERE email='$email'");
            $verifyPass = '0';
            while ($row = mysqli_fetch_array($queryPass)) {
                $verifyPass = $row["password"];
            }
            if ($password == $verifyPass) {
				$_SESSION['success']  = "You are now logged in";
				header('location: index.php');
            }
        }
    }

    function e($val){
        global $db;
        return mysqli_real_escape_string($db, trim($val));
    }
    function isLoggedIn(){
		if (isset($_SESSION['success'])) {
			return true;
		}else{
			return false;
		}
    }
    
    if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: index.php");
    }
    
    function delete_files($target) {
        if(is_dir($target)){
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
    
            foreach( $files as $file ){
                delete_files( $file );      
            }
            rmdir( $target );
        } else if(is_file($target)) {
            unlink( $target );  
        }
    }
?>