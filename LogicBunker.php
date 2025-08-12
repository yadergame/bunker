<?php

function GetDateBunker($Date):int
{
    $DataBase= new PDO("mysql:host=localhost;dbname=bunker","asupb","1234");
    $SQL="SELECT $Date FROM user_bunkers" ;
    return (int)$DataBase->query($SQL)->fetch(PDO::FETCH_ASSOC)[$Date];
}
function SetDateBunker($Date, $Value)
{
    $DataBase= new PDO("mysql:host=localhost;dbname=bunker","asupb","1234");
    $sql="UPDATE user_bunkers SET $Date=$Value";
    print_r($sql."<br>");
    $DataBase->query($sql);
}
?>