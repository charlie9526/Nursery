
<?php

                            if(isset($_GET['upload'])){
                                  $check=$_GET['upload'] ;
                                  if($check == 'emptypaymentnumber!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    Please Enter A Valid Payment Number !
                                    </div> '; 
                                  }else if($check == 'bigfile!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    File is too big !
                                    </div>' ; 
                                  }else if($check == 'fileerror!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    Error occured in uploading the file !
                                    </div> '; 
                                  } else if($check == 'nosuchpaymentexists!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                     Invalid Payment Number!
                                    </div> '; 
                                  } else if($check == 'invalidfiletype!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                     Invalid File Type!
                                    </div> '; 
                                  }else if($check == 'uploadedsuccessfully!') {
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                     Successfully Uploaded!
                                    </div> '; 
                                    
                                  }if($check == 'emptyhomeworknumber!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    Please Enter A Valid Homework Number !
                                    </div> '; 
                                  
                                  } else if($check == 'nosuchhomeworkexists!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                     Invalid Homework Number!
                                    </div> '; 
                                  }   else if($check == 'nofileuploaded!'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                 Please Select a File  !
                                  </div> '; 
                                }                            
                              
                            }else if(isset($_GET['login'])){
                                $check=$_GET['login'] ;
                                if($check == 'empty'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                  Please Fill the fields !
                                  </div> '; 
                                }else if($check == 'fromgreaterthanto'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                  From date Exceeded To date !
                                  </div> '; 
                                } else if($check == 'exceededcurrentdate'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    To date exceeded Current date !
                                    </div> '; 
                                }if($check == 'successful'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    Successfully Changed Your Password !
                                    </div> '; 
                                  }else if($check == 'incorrectcurrentpwd'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                    Current Password Does Not Match With The Existing !
                                    </div> '; 
                                  } else if($check == 'confirmationmismatch'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                      Confirmed Password Does Not Match With New Password !
                                      </div> '; 
                                }else if($check == 'uidmismatch'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                  Incorrect Username !
                                  </div> '; 
                                } else if($check == 'pwdmismatch'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                 Incorrect Password !
                                  </div> '; 
                                }else if($check == 'nohomeworkgiven'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                 No Homework is Available Currently !
                                  </div> '; 
                                }else if($check == 'noduepayments'){
                                    echo '
                                    <div class="alert">
                                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                                 No Payments Are Due Currently !
                                  </div> '; 
                                } else if($check == 'noreport'){
                                  echo '
                                  <div class="alert">
                                  <span class="closebtn" onclick="this.parentElement.style.display=\'none\'; ">&times;</span>
                               No Reports Are Available Currently !
                                </div> '; 
                              }   
                            } 
                        ?>	