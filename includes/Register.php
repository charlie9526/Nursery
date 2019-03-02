<?php
include "dbh.php";
include "Redirect.php";
session_start();
class Register{
 
    // database connection and table name
    private $conn;
 

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    public function child_register(){
        if ($_SESSION["count"]!=0 ) {
                $f_name = $_POST["f_name"];
                $l_name = $_POST["l_name"];
                $adress = $_POST['adress'];
                $tpn    = $_POST['tp'];
                $email  = $_POST['e_mail'];
                $Birthday=$_POST['day'];
                $sql = 'SELECT u_index FROM childinfo ORDER BY u_index DESC';
                $res = $this->conn->query($sql);
                
                $R = $res->fetch_array(MYSQLI_NUM);

                if(!$R){$id=0;}
                else{$id = ((int)$R[0])+$_SESSION["count"];}

                $id = $f_name.(string)$id;

                $password=$_POST['password'];
                $sql = "INSERT INTO childinfo (user_first,user_last,user_address,user_email,user_dob,user_tp,user_uid,user_pwd) VALUES ('$f_name','$l_name','$adress','$email','$Birthday','$tpn','$id','$password')";

                $res = $this->conn->prepare($sql);
                $res->execute();

                
                if($_SESSION["count"]<=1){
                header("Location:../adminstuff.php");}
                else{header("Location:../register_form.php");}

                $_SESSION["count"]=$_SESSION["count"]-1;
            }
            elseif($_SESSION["count"]==0){
                header("Location:../adminstuff.php");
            }
                
    }
        public function teacher_register(){
        if ($_SESSION["count"]!=0 ) {
                $f_name = $_POST["f_name"];
                $l_name = $_POST["l_name"];
                $adress = $_POST['adress'];
                $tpn    = $_POST['tp'];
                $email  = $_POST['e_mail'];
                $Birthday=$_POST['day'];
                $sql = 'SELECT u_index FROM teacherinfo ORDER BY u_index DESC';
                $res = $this->conn->query($sql);
                
                $R = $res->fetch_array(MYSQLI_NUM);

                if(!$R){$id=0;}
                else{$id = ((int)$R[0])+$_SESSION["count"];}
                $id = $f_name.(string)$id;

                $password=$_POST['password'];
                $sql = "INSERT INTO teacherinfo (user_first,user_last,user_address,user_email,user_dob,user_tp,user_uid,user_pwd) VALUES ('$f_name','$l_name','$adress','$email','$Birthday','$tpn','$id','$password')";

                $res = $this->conn->prepare($sql);
                $res->execute();

                if($_SESSION["count"]<=1){
                    header("Location:../adminstuff.php");}
                else{header("Location:../t_register_form.php");}

                $_SESSION["count"]=$_SESSION["count"]-1;
            }
            elseif($_SESSION["count"]==0){
                header("Location:../adminstuff.php");
            }
                
    }
    public function finance_register(){
        if ($_SESSION["count"]!=0 ) {
                $f_name = $_POST["f_name"];
                $l_name = $_POST["l_name"];
                $adress = $_POST['adress'];
                $tpn    = $_POST['tp'];
                $email  = $_POST['e_mail'];
                $Birthday=$_POST['day'];
                $sql = 'SELECT u_index FROM financedinfo ORDER BY u_index DESC';
                $res = $this->conn->query($sql);
                
                $R = $res->fetch_array(MYSQLI_NUM);

                if(!$R){$id=0;}
                else{$id = ((int)$R[0])+$_SESSION["count"];}
                $id = $f_name.(string)$id;

                $password=$_POST['password'];
                $sql = "INSERT INTO financedinfo (user_first,user_last,user_address,user_email,user_dob,user_tp,user_uid,user_pwd) VALUES ('$f_name','$l_name','$adress','$email','$Birthday','$tpn','$id','$password')";

                $res = $this->conn->prepare($sql);
                $res->execute();

                if($_SESSION["count"]<=1){
                    header("Location:../adminstuff.php");}
                else{header("Location:../f_register_form.php");}

                $_SESSION["count"]=$_SESSION["count"]-1;
            }
            elseif($_SESSION["count"]==0){
                header("Location:../adminstuff.php");
            }
        }
        public function health_register(){
        if ($_SESSION["count"]!=0 ) {
                $f_name = $_POST["f_name"];
                $l_name = $_POST["l_name"];
                $adress = $_POST['adress'];
                $tpn    = $_POST['tp'];
                $email  = $_POST['e_mail'];
                $Birthday=$_POST['day'];
                $sql = 'SELECT u_index FROM healthdinfo ORDER BY u_index DESC';
                $res = $this->conn->query($sql);
                
                $R = $res->fetch_array(MYSQLI_NUM);

                if(!$R){$id=0;}
                else{$id = ((int)$R[0])+$_SESSION["count"];}
                $id = $f_name.(string)$id;

                $password=$_POST['password'];
                $sql = "INSERT INTO healthdinfo (user_first,user_last,user_address,user_email,user_dob,user_tp,user_uid,user_pwd) VALUES ('$f_name','$l_name','$adress','$email','$Birthday','$tpn','$id','$password')";

                $res = $this->conn->prepare($sql);
                $res->execute();

                if($_SESSION["count"]<=1){
                    header("Location:../adminstuff.php");}
                else{header("Location:../h_register_form.php");}

                $_SESSION["count"]=$_SESSION["count"]-1;
            }
            elseif($_SESSION["count"]==0){
                header("Location:../adminstuff.php");
            }
        }
    
}

$db = new Dbh();
$s = new Register($db->connect());

if(isset($_POST["child_register"])){
    $s->child_register();
}
elseif(isset($_POST["teacher_submit"])){
    $s->teacher_register();   
}
elseif(isset($_POST["finance_submit"])){
    $s->finance_register();   
}
elseif(isset($_POST["health_submit"])){
    $s->health_register();   
}


