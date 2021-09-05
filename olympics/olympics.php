<?php

class Sportist{
public $symbol;
public $location = 0;
public function __construct(string $symbol)
{
$this->symbol = $symbol;
}

public function getSportist()
    {
        return $this->symbol;
    }

public function move()
    {
        $this->location+=rand(1,2);
    }


}


class Game {

public $lanes;
public $sportists;
public $places = [];
public $laneLength = 10;
public $time = 0;

public function __construct($sportists, int $laneLength)
    {
        $this->laneLength = $laneLength;
        $this->sportists = $sportists;
    }

public function GameStart()
{
        if($this->isFinished())
         {
        $this->listPlaces();
        exit;
         }

$this->setLines();
$this->printLines();
$this->sportistsMove();
$this->time++;

}

public function setLines()
{
    foreach ($this->sportists as $key => $sportist)
        {
            $this->lanes[$key] = str_repeat('_', $this->laneLength - ($this->laneLength - $sportist->location))
            . $sportist->symbol . str_repeat('_', $this->laneLength - $sportist->location);
        }
}


public function printLines()
{
    foreach ($this->lanes as $lane)
    {
        echo $lane . PHP_EOL;
    }
}


public function sportistsMove()
{
    foreach ($this->sportists as $sportist)
    {
        if(!in_array($sportist, $this->places))
        {
            $sportist->move();
            if($sportist->location >= $this->laneLength)
            {
                    $sportist->location = $this->laneLength;
                array_push($this->places, $sportist);
                    $sportist->timeFinished = $this->time;
            }
        }
    }
}


public function isFinished(): bool
{
    foreach($this->sportists as $key => $sportist)
    {
        if(!in_array($sportist ,$this->places))
        {
            return false;
        }
    }
    return true;
}

public function listPlaces()
{
    $n = 1;
    foreach ($this->places as $key => $place)
    {
        if($place->timeFinished < @$this->places[$key +1 ]->timeFinished)
        {
            echo $n . " place: Sportsman NO." . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
            $n++;
        }
        else
        {
            echo $n . " place: Sportsman NO." . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
        }
    }
}
}


$sportists = [
new Sportist('1'),
new Sportist('2'),
new Sportist('3'),
new Sportist('4'),
new Sportist('5'),
new Sportist('6'),
new Sportist('7'),
new Sportist('8'),
new Sportist('9'),

];

$game = new Game($sportists, 20);
while(true){
system('clear');
$game->GameStart();
usleep(300000);
}