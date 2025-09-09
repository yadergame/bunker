<?php
    namespace src\Models\Game;
    abstract class Room
    {
        public int $ID;
        public string $Name;
        public int $MaxPeople;
        public int $WorkPeople;
    }
?>