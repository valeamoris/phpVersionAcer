<?php
class Acer
{
    private $_hasGirlFriend = false;

    private $_hasHouse = false;

    private $_hasCar = false;

    private $_hasMoney = false;

    private static $instance = null;

    public function __construct()
    {
        self::$instance = $this;
        echo "There is an acer".PHP_EOL;
        $this->searchForGirlFriend();
    }

    protected function searchForGirlFriend()
    {
        $girls = new GirlFactory();
        while(!$this->_hasGirlFriend){
            $girl = $girls->foundAGirl();
            $this->_hasGirlFriend = $girl->result(self::$instance);
        }
        echo "Finally acer find a girlfriend".PHP_EOL;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}

class GirlFactory
{
    private $_count = 0;

    public function foundAGirl()
    {
        echo "Acer find a girl".PHP_EOL;
        if ($this->_count < 10) {
            $this->_count++;
            return new NormalGirl();
        } else {
            return new BitchGirl();
        }
    }
}

interface Girl
{
    public function result($man);
}

class NormalGirl implements  Girl
{
    public function result($man)
    {
        if(!$man->_hasHouse && !$man->_hasCar && !$man->_hasMoney){
            echo "Sorry, you looks ugly".PHP_EOL;
            return false;
        }else{
            return true;
        }
    }
}

class BitchGirl implements  Girl
{
    public function result($man)
    {
        echo "Zhu Yun knows that though this man is simple, conservative, even unromantic, but honest, couldn't be better to be a husband".PHP_EOL;
        return true;
    }
}

$acer = new Acer();