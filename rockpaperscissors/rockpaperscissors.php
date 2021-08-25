<?php



$choose = array('rock', 'paper', 'scissors');
$pcRandom = array_rand($choose);
$pc = $choose[$pcRandom];
//$r = 'rock' || 'r';
//$p = 'paper' || 'p';
//$s = 'scissors' || 's';

$user = strtolower(readline("Enter a word: rock/r, paper/p, scissors/s: ")) . PHP_EOL;


if ($user === 'rock' && $pc === 'paper'){
    echo 'PC wins with paper';
}else if ($user === 'paper' && $pc === 'rock'){
    echo 'User wins with paper';
}else if ($user === 'scissors' && $pc === 'paper'){
    echo 'User wins with scissors';
}else if ($user === 'paper' && $pc === 'scissors'){
    echo 'PC wins with scissors';
}else if($user === 'rock' && $pc === 'scissors'){
    echo 'User wins with rock';
}else if ($user === 'scissors' && $pc === 'rock'){
    echo 'PC wins with rock';
}else if ($user === 'rock' && $pc === 'rock'){
    echo 'Its a tie';
}else if ($user === 'paper' && $pc === 'paper'){
    echo 'Its a tie';
}else if ($user === 'scissors' && $pc === 'scissors'){
    echo 'Its a tie';
}


