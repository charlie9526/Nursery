<?php
//decides the type of My Account
class Session{

    public function decideSession(){
       						
            if($_SESSION['u_type'] == 1){
                
                echo"	
                        
                        <a href='childstuff.php' class='btn btn-outline-success button-sm'>My Account</a>
                        
                    
                "	;

            }else if($_SESSION['u_type'] == 2){
                
                echo"	
                    
                        <a href='teacherstuff.php' class='btn btn-outline-success button-sm'>My Account</a>
                
                    
                ";	

            }else if($_SESSION['u_type'] == 3){
                echo"
                    
                    
                        <a href='financestuff.php' class='btn btn-outline-success button-sm'>My Account</a>
                    
                "	;
                    

            }else if($_SESSION['u_type'] == 4){
                
                echo"	
                        <a href='healthstuff.php' class='btn btn-outline-success button-sm'>My Account</a>
                    
                ";	

            }else if($_SESSION['u_type'] == 5){
                
                echo"	
                        <a href='adminstuff.php' class='btn btn-outline-success button-sm'>My Account</a>
                ";
        
            }
            
            echo "
            <form action='includes/logout.inc.php' method='POST' style='float:right'>
            
            <button class='btn btn-outline-success button-sm ' style='top:10px;float:left'  type='submit' name='submit'>Log out</button></form></ul>";
            
        }
    
}

?>