<?php
    namespace Test;
    use PHPUnit\Framework\TestCase;
    use src\Models\Game\Item;
    class ItemTest extends TestCase
    {
        public function testSum():void
        {
            $Item1=new Item(1,"Железо",10);
            $Item2=new Item(1,"Железо",20);
            $this->assertEquals(new Item(1,"Железо",30),Item::Sum($Item1,$Item2));
        }
    }
?>