<?php
session_start();
class MainClass {
    private $username;
    private $password;
    public function __construct($username, $password) {
      $this->username = $username;
      $this->password = $password;
    }
    public function user(){
        return $this->username;
    }
    public function login(){
        if(empty($this->username) || empty($this->password)){
        
        }else{
    
            if($this->username == "admin" && $this->password == "admin"){
    
                $_SESSION['user'] = "admin";
                $_SESSION['status'] = "valid";
    
    
                echo "<script>
                        alert('Logged In Successfully!')
                        window.location.href = 'dashboard.php'
                    </script>";
    
            }else{
                require('connection.php');

                $sql_get = "SELECT * FROM `users` WHERE `username`='{$this->username}' AND `password`= '{$this->password}'";
                $sql_get_con = mysqli_query($conn, $sql_get);
    
                if(mysqli_num_rows($sql_get_con) > 0){
                    
                    $_SESSION['status'] = "valid";
    
                    echo "<script>
                        alert('Logged In Successfully!')
                        window.location.href = 'dashboard.php'
                    </script>";
                }else{
                    $_SESSION['status'] = "invalid";
                    echo "<script>
                        alert('Invalid Credentials! Please try again.')
                    </script>";
                    
                }
            }        
        }
    }
  }

  class MainExtends extends MainClass{
    public function logout(){
        if($_SESSION['status'] == "invalid" || $_SESSION['status'] == ""){
            echo "<script>
                window.location.href = 'index.php'
            </script>";
        }else{
            $_SESSION['status'] == "valid";
        }
    }
}
?>