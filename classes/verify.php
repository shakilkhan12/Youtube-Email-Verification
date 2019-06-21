<?php

class verify extends queries {

  public function emailVerify(){

    if(isset($_GET['confirmation'])){
        $code = $_GET['confirmation'];
        $status = 1;
        if($this->query("SELECT * FROM users WHERE code = ? ", [$code])){
            if($this->count() == 1){

                $row = $this->fetch();
                $userId = $row->id;
                if($this->query("UPDATE users SET status = ? WHERE id = ? ", [$status, $userId])){

                    $_SESSION['emailVerified'] = "Your account has been verified successfully please login";
                    header("location:login.php");

                }

            }
        }
    }

  }

}


?>