<?php
namespace src\Models\Game;
use src\Models\Game\Coordination;
use src\Models\Game\Item;

class Bunker{
    public $storage=[];
    public $Rooms=[];
    public int $food;
    public int $people;
    public int $PeopleInStorage;
    public Coordination $coordinates;
    function __construct(int $people, int $food, Coordination $cord,array $storage,array $Rooms){
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
            if($this->storage[$item->Name]->Value==0)unset($this->storage[$item->Name]);
        }
        else
        {
            $this->storage[$item->Name]=$item;
        }
    }
    public function HaveCountItem(string $NameItem,int $count):bool
    {
        return $this->HaveItem($NameItem)&& $this->storage[$NameItem]->Value>=$count;
    }
    public function AddRome(Room $room)
    {
        $this->Rooms[]=$room;
    }
    public function WorkInStorage()
    {
        $this->food+=$this->PeopleInStorage*2;
        
    }
    public function EatFood()
    {
        $this->food-=$this->people;
    }
    public function Step()
    {
        $this->WorkInStorage();
        $this->EatFood();
    }
}
?>