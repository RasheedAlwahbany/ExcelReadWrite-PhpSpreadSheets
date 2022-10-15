<?php 
if(!empty($_POST['Controller'])){
   function GetUserLogIn( $email, $pwd)
    {
        global $connection;
        $query = $connection->prepare("SELECT * FROM `users_addresses_v_permissions_view` WHERE  `user_email`=:email AND `user_account_type`='Admin'");
        $query->bindParam(":email", $email);
        if ($query->execute()) {
            if ($row = $query->fetchObject()) {
                $user=array();
                if (!o_check($pwd, $row->user_password))
                    return false;
                else {
                    // do{
                        if (!empty($row->user_image)) {

                        if (file_exists("../Images/Accounts/" . $row->user_image)) {
                            $array = array();
                            foreach ($row as $key => $value)
                                $array[$key] = $value;
                            $array["user_image_file"] = base64_encode(file_get_contents("../Images/Accounts/" . $row->user_image));
                            $user[] = $row;
                        }else
                            $user[] = $row;
                    }else
                        $user[] = $row;
                    $_SESSION['USERINFO'] = $user;
                // }while($row = $query->fetchObject());
                    return true;
                }
            }
        }
        return false;
    }


    if ($_POST['Controller'] == "LogIn") {
        $search = false;
        if (!empty($_POST['UserPWD'])) {
            if (!empty($_POST['UserEmail'])) {
                    $search = GetUserLogIn( $_POST['UserEmail'], $_POST['UserPWD']);

            }else
                $search = false;
        }else
            $search = false;

        if ($search) {
            echo "<script>alert('Welcome bro');
            document.location='http://localhost:8000/';
            </script>";
        } else {
            $response_type = "Oparation Error";
            $response_json_array = array("respnose_type" => "Oparation Error");
        }
    }
}


?>