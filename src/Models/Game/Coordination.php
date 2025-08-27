<?php
namespace src\Models\Game;
class Coordination 
{
    
    public int $X;
    public int $Y;
    public function __construct(int $x,int $y) {
        $this->X = $x;
        $this->Y = $y;
    }
    static public function sum(Coordination $coord1,Coordination $coord2) : Coordination
    {
        return new Coordination($coord1->X+$coord2->X,$coord1->Y+$coord2->Y);
    }
    static public function negative(Coordination $coord) : Coordination
    {
        return new Coordination($coord->X*-1,$coord->Y*-1);
    }
    static public function multiplication(Coordination $cords,int $num) : Coordination
    {
        return new Coordination($cords->X*$num,$cords->Y*$num);
    }
}
?>

