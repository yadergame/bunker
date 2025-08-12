<?php
function Logic(){
    include_once 'LogicBunker.php';
    $Peolpe=(int)GetDateBunker("People");
    if(isset($_POST['storage']))$Storage=(int)$_POST['storage'];
    else $Storage=0;
    if(isset($_POST['exit']))$Exit=(int)$_POST['exit'];
    else $Exit=0;
    if(isset($_POST['relax']))$Relax=(int)$_POST['relax'];
    else $Relax=0;
    if($Storage+$Exit+$Relax>$Peolpe)print_r("Нехер наёбывать меня :)");
    else 
    {
        SetDateBunker("metal",GetDateBunker("metal")+$Storage*3);
        print_r($Storage."<br>");
        SetDateBunker("food",GetDateBunker("food")+$Storage*3);
        print_r($Storage."<br>");
        SetDateBunker("food",GetDateBunker("food")-$Peolpe*2);
        print_r($Peolpe."<br>");
    }
}
?>