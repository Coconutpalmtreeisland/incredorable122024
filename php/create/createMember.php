<?php
    include "../connect/connect.php";

    $squl = "create table members(";
    $squl .= " memberID int(10) unsigned auto_increment,";
    $squl .= "youEmail varchar(40) NOT NULL,";
    $squl .= "youName varchar(10) NOT NULL,";
    $squl .= "youPass varchar(50) NOT NULL,";
    $squl .= "youPhone varchar(20) NOT NULL,";
    $squl .= "regTime int(40) NOT NULL,";
    $squl .= "PRIMARY KEY(memberID)";
    $squl .= ") charset=utf8;";

    $connect -> query($squl);        
       
    if($result){
        echo "Create Tables Complete";
    } else {
        echo "Create Tables False";
    }
        
        
        
    

?>