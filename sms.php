<?php
    $to="0719795901@sms.mobitel.lk" ;
    $from="" ;
    $message="This is a text message.\nNew line.";
    $headers="From: $from\n";
    mail($to. '', $message, $headers);

?>