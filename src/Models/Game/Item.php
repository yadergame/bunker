<?php
namespace src\Models\Game;

use Exception;

class Item
{
    public int $ID;
    public string $Name;
    public int $Valeu;
    public function __construct(int $id,string $name,int $value)
    {
        $this->ID = $id;
        $this->Name = $name;
        if($value>=0)$this->Valeu = $value;
        else throw new Exception("Количество не может быть отрицательным");
    }
    static public function Sum(Item $item1,Item $item2):Item
    {
        if($item1->ID == $item2->ID)
        return new Item($item1->ID,$item1->Name,$item1->Valeu+$item2->Valeu);
        else throw new Exception("Сложение разных вещей невозможно");
    }
}

?>