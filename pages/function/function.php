<?php 
    include("ignore/file.php");
    session_start();

    $password = PASSWORD; 
    $username = USERNAME;
    $db = mysqli_connect('us-cdbr-east-02.cleardb.com', $username, $password, 'heroku_0d22f250ec9246f');

    //C:/Users/theac/.gitconfig
    //rm -rf .git && git init && git add . && git commit -m "init" && git remote add origin https://github.com/theacheng/theacheng.git && git push --mirror --force

    //git config --add --global alias.ph "echo ' ' > .gitignore && git add . && git commit -m '$1' && shift && git push heroku master && echo 'pages/ignore/' > .gitignore && git rm -r --cached . && git add . && git commit -m '$1' && git push origin master"
    //echo "" > .gitignore && git add . && git commit --amend --no-edit && git push heroku main -f && echo 'pages/function/ignore/' > .gitignore && git rm -r --cached . && git add . && git commit --amend --no-edit && git push origin main -f
   
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

    //counter
    $counter_res = mysqli_query($db, "SELECT * FROM `counter`");

    function getIPAddress() {
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }
        //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    //add new visitor
    $visitor_user_agent = $_SERVER['HTTP_USER_AGENT'];
    $visitor_ip = getIPAddress();

    //check unique
    $check_res = mysqli_query($db, "SELECT * FROM `counter` WHERE `ip_address` = '$visitor_ip' and `user_agent` = '$visitor_user_agent'");
    if(mysqli_num_rows($check_res) < 1){
        mysqli_query($db, "INSERT INTO counter(ip_address, user_agent) VALUES('$visitor_ip', '$visitor_user_agent')");
    }

    $vistitors = mysqli_num_rows($counter_res);
    $all_visitor = mysqli_query($db, "SELECT * FROM `counter`");

    $id = array();
    $user_agent = array();
    $ip_address = array();
    $visit_date = array();

    $uniqueRes = mysqli_query($db, "SELECT DISTINCT `ip_address` from `counter`");
    $uniqueIP = array();
    while($row = mysqli_fetch_array($all_visitor)){
        array_push($id, $row['id']);
        array_push($user_agent, $row['user_agent']);
        array_push($ip_address, $row['ip_address']);
        array_push($visit_date, $row['visit_date']);
    }

    while($row = mysqli_fetch_array($uniqueRes)){
        array_push($uniqueIP, $row['ip_address']);
    }
?>