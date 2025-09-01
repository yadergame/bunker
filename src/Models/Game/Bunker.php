<?php

use src\Models\Game\Coordination;
use src\Models\Game\Item;

class Bunker{
    public Item $storage=[];
    public $Roomstorage=[];
    public int $food;
    public int $people;
    public Coordination $coordinates;
    function __construct(int $people, int $food, Coordination $cord){
        $this->people=$people;
        $this->coordinates=$cord;
    }
    //функции для работы с хранилищем
    public function HaveItem(string $NameItem):bool
    {
        foreach($this->storage as $item)
        {
            if($item->Name==$NameItem)
            {
                return true;
            }
        }
        return false;
    }
    public function addItem(Item $item)
    {
        if($this->HaveItem($item->Name))
        {
            $this->storage[$item->Name]=Item::Sum($this->storage[$item->Name],$item);
        }
        else
        {
            $this->storage[$item->Name]=$item;
        }
    }
    

    

}




?>