<?php
    $user_name = $user_message = "";

    if(isset($_POST['submit'])) {

        $user_name = test_name($_POST['User_name']);
        $user_message = test_message($_POST['User_message']);
    }

    function test_name($data) {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    function test_message($data) { 
        $data = trim($data);
        $data = stripslashes($data);
        $data = nl2br($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Password hash will be in has variable, name shouldn't be present
    $hash = password_hash("name", PASSWORD_DEFAULT);

    // checking if password is correct or not
    if(password_verify("password", $hash)) {
        header("location to webpage"); 
    } else {
        ?><span><?php echo "Please fill correct details!"; ?></span><?php 
    }

    // storing user messege into a file if it's value isn't empty
    if(!empty($user_message)) {
        $myfile = fopen("filename.txt", "a") or die("Unable to open file!");
        $page_heading = "Login page user message\r\n\n";
        $page_footer = "Page ends.\r\n\n\n\n\n\n\n\n\n\n";

        fwrite($myfile, $page_heading);
        fwrite($myfile, $message);
        fwrite($myfile, $page_footer);
        fclose($myfile);
    }
?>




