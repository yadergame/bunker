<?php
namespace src\Models\Game;

use Exception;

class Item
{
    public int $ID;
    public string $Name;
    public int $Value;
    public function __construct(int $id,string $name,int $value)
    {
        $this->ID = $id;
        $this->Name = $name;
        $this->Value = $value;
    }
    static public function Sum(Item $item1,Item $item2):Item
    {
        if($item1->ID == $item2->ID)
            return new Item($item1->ID,$item1->Name,$item1->Value+$item2->Value);
        else
            throw new Exception("Сложение разных вещей невозможно");
    }
}
?>