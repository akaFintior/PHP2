<?php

class Guest
{
    protected $name;
    protected $date;

    public function __construct($name = null, $date = null){
        $this->name = $name;
        $this->date = date("Y-m-d, H:i:s");
    }

    public function leaveMessage($text) {
        echo "<h1>{$this->name}</h1><p>{$text}</p>";
        echo "<p>Message left: {$this->date}</p>";
    }
}

class Member extends Guest
{
    private $regDate;
    
    public function __construct($name = null, $date = null, $regDate = null){
        parent::__construct($name, $date);
        $this->regDate;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setRegDate($regDate){
        $this->regDate = $regDate;
    }

    public function leaveMessage($text) {
        parent::leaveMessage($text);
        echo "<p>Registered: {$this->regDate}</p>";
    }
}

$guest = new Guest("Guest");

$guest->leaveMessage("Hello!");

$member = new Member("member");
$member->setName("John");
$member->setRegDate("2001-2-3");

$member->leaveMessage("Hello World!");
// var_dump($guest);