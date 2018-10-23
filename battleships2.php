<?php

if(!defined("MAIN_SET")) { die(); }

if(!empty($user['battleships_progress'])) {
if(isset($_POST['do'])) {

$progress = explode("||", $user['battleships_progress']);
$data = explode("||", $user['battleships_data']);

if($progress[5] == "5") {
$v="festning";
$l=true;
} elseif($progress[5] == "6") {
$v="borg";
$l=true;
} elseif($progress[5] == "8") {
$v="landsby";
$l=true;
} elseif($progress[5] == "-1") {
$v="slott";
$l=true;
} elseif($progress[5] == "-2") {
$v="villa";
$l=true;
} else {
$v="skip";
}

if($progress[5] != "-3") {

if($_POST['do'] == "ball") {

if($user['credits'] >= 1 || $progress[5] == 0) {

//$progress[6]++;

$c = mt_rand(1,9);

if($c < 7) {
$dam=mt_rand(3,7);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}


if($progress[5] > 0) {
$cashused = $progress[2]+1;

 $x=$user['credits'];
 $user['credits'] = $x-1;
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}

$tru = true;

}



} elseif($_POST['do'] == "egg" && ($progress[5] == "-1" || $progress[5] == "-2")) {
if($progress[5] == "-1") {

if($progress[6] >= 350) {
$c = mt_rand(1,5);
$cf = 3;
} elseif($progress[6] >= 315) {
$c = mt_rand(1,6);
$cf = 4;
} elseif($progress[6] >= 275) {
$c = mt_rand(1,7);
$cf = 5;
} elseif($progress[6] >= 235) {
$c = mt_rand(1,8);
$cf = 6;
} elseif($progress[6] >= 195) {
$c = mt_rand(1,9);
$cf = 7;
} elseif($progress[6] >= 155) {
$c = mt_rand(1,10);
$cf = 8;
} elseif($progress[6] >= 115) {
$c = mt_rand(1,11);
$cf = 9;
} elseif($progress[6] >= 75) {
$c = mt_rand(1,12);
$cf = 10;
} elseif($progress[6] >= 35) {
$c = mt_rand(1,13);
$cf = 11;
} elseif($progress[6] >= 15) {
$c = mt_rand(1,14);
$cf = 12;
} else {
$c = mt_rand(1,14);
$cf = 12;
}


} else {
$c = mt_rand(1,8);
$cf = 6;
}

if($c < $cf) {
$dam=mt_rand(10,30);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}

$tru = true;


} elseif($_POST['do'] == "fire" && ($progress[5] == "-1" || $progress[5] == "-2")) {
if($progress[5] == "-1") {
if($progress[6] >= 350) {
$c = mt_rand(1,4);
$cf = 2;
} elseif($progress[6] >= 315) {
$c = mt_rand(1,5);
$cf = 3;
} elseif($progress[6] >= 275) {
$c = mt_rand(1,6);
$cf = 4;
} elseif($progress[6] >= 235) {
$c = mt_rand(1,7);
$cf = 5;
} elseif($progress[6] >= 195) {
$c = mt_rand(1,8);
$cf = 6;
} elseif($progress[6] >= 155) {
$c = mt_rand(1,9);
$cf = 7;
} elseif($progress[6] >= 115) {
$c = mt_rand(1,10);
$cf = 8;
} elseif($progress[6] >= 75) {
$c = mt_rand(1,11);
$cf = 9;
} elseif($progress[6] >= 35) {
$c = mt_rand(1,12);
$cf = 10;
} elseif($progress[6] >= 15) {
$c = mt_rand(1,13);
$cf = 11;
} else {
$c = mt_rand(1,13);
$cf = 11;
}

} else {
$c = mt_rand(1,8);
$cf = 6;
}

if($c < $cf) {
$dam=mt_rand(20,40);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}

$tru = true;



} elseif($_POST['do'] == "bun" && $progress[5] == "-2") {

$c = mt_rand(1,8);

if($c < 4) {
$dam=mt_rand(30,60);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}

$tru = true;



} elseif($_POST['do'] == "bomb") {



if($progress[5] > 1) {
if($user['credits'] >= 3) {

$c = mt_rand(1,8);

if($c < 6) {
$dam=mt_rand(7,14);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}


if($progress[5] > 0) {
$cashused = $progress[2]+3;

 $x=$user['credits'];
 $user['credits'] = $x-3;
 
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}

$tru = true;
}

}

} elseif($_POST['do'] == "splints") {



if(in_array("bs_splints", $user['itemsx']) && $progress[5] > 1) {
if($user['credits'] >= 5) {

$c = mt_rand(1,7);

if($c < 5) {
$dam=mt_rand(9,23);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}


if($progress[5] > 0) {
$cashused = $progress[2]+5;

 $x=$user['credits'];
 $user['credits'] = $x-5;
 
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}

$tru = true;
}

}

} elseif($_POST['do'] == "can") {

if($user['credits'] >= 2 || $progress[5] == 0) {

//$progress[7]++;

$c = mt_rand(1,8);

if($c < 6) {
$dam=mt_rand(5,10);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}


if($progress[5] > 0) {
$cashused = $progress[2]+2;

 $x=$user['credits'];
 $user['credits'] = $x-2;
 
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}

$tru = true;
}

} elseif($_POST['do'] == "deathbomb") {


if($progress[5] > 2) {

if($user['credits'] >= 4) {
$c = mt_rand(1,8);

if($c < 6) {
$dam=mt_rand(12,19);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}


if($progress[5] > 0) {
$cashused = $progress[2]+4;

 $x=$user['credits'];
 $user['credits'] = $x-4;
 
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;

}


}



} elseif($_POST['do'] == "zero") {


if(in_array("bs_zero", $user['itemsx']) && $progress[5] > 2) {

if($user['credits'] >= 6) {
$c = mt_rand(1,8);

if($c < 7) {
$dam=mt_rand(5,30);
$comhp = $progress[1]-$dam;
$turns = $progress[3]+1;
$hit = true;

} else {
$comhp = $progress[1];
$turns = $progress[3]+1;
}


if($progress[5] > 0) {
$cashused = $progress[2]+6;

 $x=$user['credits'];
 $user['credits'] = $x-6;


mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;

}


}











} elseif($_POST['do'] == "defence") {
if($data[0] >= 1) {
$comhp = $progress[1];
$turns = $progress[3]+1;
$defend = true;
$cashused = $progress[2];
$tru = true;

$data[0]--;
}

} elseif($_POST['do'] == "defenceup") {
if($progress[5] > 0) {
if($data[1] == 0 && $data[0] >= 15) {
$comhp = $progress[1];
$turns = $progress[3]+1;
$tactic = true;
$cashused = $progress[2];
$tru = true;

$data[0] = $data[0]-15;
$gotdefenceup=true;
}
}

} elseif($_POST['do'] == "attackup") {
if($progress[5] > 1) {
if($data[2] == 0 && $data[0] >= 20) {
$comhp = $progress[1];
$turns = $progress[3]+1;
$tactic = true;
$cashused = $progress[2];
$tru = true;

$data[0] = $data[0]-20;
$gotattackup=true;
}
}


} elseif($_POST['do'] == "poison") {
if($progress[5] > 3) {
if($data[3] == 0 && $data[0] >= 35) {
$comhp = $progress[1];
$turns = $progress[3]+1;
$tactic = true;
$cashused = $progress[2];
$tru = true;

$data[0] = $data[0]-35;
$gotpoison=true;

}
}

} elseif($_POST['do'] == "stun") {
if($progress[5] > 4) {
if($data[4] == 0 && $data[0] >= 40) {
$comhp = $progress[1];
$turns = $progress[3]+1;
$tactic = true;
$cashused = $progress[2];
$tru = true;

$data[0] = $data[0]-40;
$gotstun=true;
}
}

} elseif($_POST['do'] == "moresp") {
if($progress[5] > 0) {
if($data[0] != 100 && $user['credits'] >= 13) {
$comhp = $progress[1];
$turns = $progress[3]+1;
$moresp = true;
$data[0] = $data[0]+50;

$cashused = $progress[2]+13;

 $x=$user['credits'];
 $user['credits'] = $x-13;

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");

$tru = true;
}
}




} elseif($_POST['do'] == "heal") {

if($progress[5] > 1) { 
if($user['credits'] >= 8) {

$dam=mt_rand(7,13);
$userhp = $progress[0]+$dam;
$comhp = $progress[1];
$turns = $progress[3]+1;
$heal = true;


if($progress[5] > 0) {
$cashused = $progress[2]+8;

 $x=$user['credits'];
 $user['credits'] = $x-8;
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;
}
}
} elseif($_POST['do'] == "mhel") {

if($progress[5] > 3) {

if($user['credits'] >= 12) {

$dam=mt_rand(12,20);
$userhp = $progress[0]+$dam;
$comhp = $progress[1];
$turns = $progress[3]+1;
$heal = true;


if($progress[5] > 0) {
$cashused = $progress[2]+12;

 $x=$user['credits'];
 $user['credits'] = $x-12;
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;

}
}
} elseif($_POST['do'] == "bhel") {

if($progress[5] > 4) {

if($user['credits'] >= 13) {

$dam=mt_rand(15,24);
$userhp = $progress[0]+$dam;
$comhp = $progress[1];
$turns = $progress[3]+1;
$heal = true;


if($progress[5] > 0) {
$cashused = $progress[2]+13;

 $x=$user['credits'];
 $user['credits'] = $x-13;
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;

}
}
} elseif($_POST['do'] == "ghel") {

if($progress[5] > 5) {

if($user['credits'] >= 15) {

$dam=mt_rand(18,28);
$userhp = $progress[0]+$dam;
$comhp = $progress[1];
$turns = $progress[3]+1;
$heal = true;


if($progress[5] > 0) {
$cashused = $progress[2]+5;

 $x=$user['credits'];
 $user['credits'] = $x-15;
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;

}
}


} elseif($_POST['do'] == "choco") {

if($progress[5] == "-1" || $progress[5] == "-2") {

$dam=mt_rand(6,12);
$userhp = $progress[0]+$dam;
$comhp = $progress[1];
$turns = $progress[3]+1;
$heal = true;

$tru = true;

}



} elseif($_POST['do'] == "shel") {


if($user['credits'] >= 5 || $progress[5] == 0) {

$dam=mt_rand(4,10);
$userhp = $progress[0]+$dam;
$comhp = $progress[1];
$turns = $progress[3]+1;
$heal = true;


if($progress[5] > 0) {
$cashused = $progress[2]+5;

 $x=$user['credits'];
 $user['credits'] = $x-5;
 

mysql_query("UPDATE usersystem SET credits = '".$user['credits']."' WHERE username='".$user['name']."'");
}
$tru = true;

}




} else {
}

if($tru) {

if(isset($userhp)) {
$userhp = $userhp;
} else {
$userhp = $progress[0];
}


if($progress[5] >= 4 || $progress[5] == "-1" || $progress[5] == "-2") {
if($progress[5] == 5){

if($progress[1] <= 100) {
$tk=mt_rand(1,6);
} elseif($progress[1] <= 50) {
$tk=mt_rand(1,4);
}

} elseif($progress[5] == 6){

if($progress[1] <= 150) {
$tk=mt_rand(1,7);
} elseif($progress[1] <= 75) {
$tk=mt_rand(1,4);
}
} elseif($progress[5] == 7){

if($progress[1] <= 80) {
$tk=mt_rand(1,3);
} elseif($progress[1] <= 45) {
$tk=mt_rand(1,2);
}
} elseif($progress[5] == 8){

if($progress[1] <= 50) {
$tk=mt_rand(1,5);
} elseif($progress[1] <= 30) {
$tk=mt_rand(1,4);
}
} elseif($progress[5] == 4){

if($progress[1] <= 50) {
$tk=mt_rand(1,6);
} elseif($progress[1] <= 30) {
$tk=mt_rand(1,4);
}
} elseif($progress[5] == "-2"){

if($progress[1] <= 250) {
$tk=mt_rand(1,4);
} elseif($progress[1] <= 125) {
$tk=mt_rand(1,4);
}
} elseif($progress[5] == "-1"){

if($progress[1] <= 200) {
$tk=mt_rand(1,4);
} elseif($progress[1] <= 100) {
$tk=mt_rand(1,4);
}
}
}

if($data[4] > 0 && !isset($gotstun)) {
$comattack=5;
} else {
$comattack=mt_rand(1,7);
}
if($_POST['defence'] != $comattack)  {
if($progress[4] == "Hertug Maztizo") {
$k1=1; $k2=8; $k3=4; $k4=10; $k5=6;
} else {

if($progress[5] == "-1") {





if($progress[6] >= 350) {
$k1=1; $k2=5; $k3=5; $k4=15; $k5=3;
} elseif($progress[6] >= 315) {
$k1=1; $k2=6; $k3=5; $k4=15; $k5=4;
} elseif($progress[6] >= 275) {
$k1=1; $k2=7; $k3=5; $k4=15; $k5=5;
} elseif($progress[6] >= 235) {
$k1=1; $k2=8; $k3=5; $k4=15; $k5=6;
} elseif($progress[6] >= 195) {
$k1=1; $k2=9; $k3=5; $k4=15; $k5=7;
} elseif($progress[6] >= 155) {
$k1=1; $k2=10; $k3=5; $k4=15; $k5=8;
} elseif($progress[6] >= 115) {
$k1=1; $k2=11; $k3=5; $k4=15; $k5=9;
} elseif($progress[6] >= 75) {
$k1=1; $k2=12; $k3=5; $k4=15; $k5=10;
} elseif($progress[6] >= 35) {
$k1=1; $k2=13; $k3=5; $k4=15; $k5=11;
} elseif($progress[6] >= 15) {
$k1=1; $k2=14; $k3=5; $k4=15; $k5=12;
} else {
$k1=1; $k2=14; $k3=5; $k4=15; $k5=12;
}





} elseif($progress[5] == "-2") {
$k1=1; $k2=9; $k3=6; $k4=17; $k5=7;
}elseif($progress[5] == 0) {
$k1=1; $k2=8; $k3=4; $k4=9; $k5=6;
} elseif($progress[5] == 1) {
$k1=1; $k2=8; $k3=3; $k4=8; $k5=6;
} elseif($progress[5] == 2) {
$k1=1; $k2=9; $k3=6; $k4=11; $k5=7;
} elseif($progress[5] == 3) {
$k1=1; $k2=10; $k3=8; $k4=15; $k5=8;
} elseif($progress[5] == 4) {
$k1=1; $k2=11; $k3=11; $k4=19; $k5=9;
} elseif($progress[5] == 5) {
$k1=1; $k2=12; $k3=5; $k4=23; $k5=10;
} elseif($progress[5] == 6) {
$k1=1; $k2=12; $k3=10; $k4=27; $k5=9;
} elseif($progress[5] == 7) {
$k1=1; $k2=12; $k3=7; $k4=33; $k5=11;
} elseif($progress[5] == 8) {
$k1=1; $k2=12; $k3=4; $k4=12; $k5=8;
}
}

if(!isset($heal) && isset($hit)) {

if(in_array("bs_wrath", $user['itemsx']) && is_numeric($_POST['extrahit']) && $_POST['extrahit'] > 0 && $_POST['extrahit'] <= 99 && $user['points'] >= $_POST['extrahit'] && $progress[5] > 0) {

$comhp = $comhp-round($_POST['extrahit']/2.5);
$extrahit=true;
$dam=$dam+round($_POST['extrahit']/2.5);

mysql_query("UPDATE usersystem SET points = '".($user['points']-$_POST['extrahit'])."' WHERE username='".$user['name']."'");

}

}



if($progress[5] == 7) {
$tkg=mt_rand(1,2);
} else {
$tkg=mt_rand(1,4);
}

if($data[4] > 0) {
$stunned=true;
$data[4]--;
$userhp=$progress[0];
} else {

if($heal) {

if($tk != $tkg) {

$c2 = mt_rand($k1,$k2);
if($c2 < $k5) {
$lost=mt_rand($k3,$k4);
$userhp = $userhp-$lost;
$comhit=true;
} else {

}

} else {

if($progress[5] >= 5) {
$got=mt_rand(15,25);
$comhp=$comhp+$got;
$userhp = $userhp;
$comheal=true;
} else {
$got=mt_rand(6,11);
$comhp=$comhp+$got;
$userhp = $userhp;
$comheal=true;
}

}

} else {

if($tk != $tkg) {

$c2 = mt_rand($k1,$k2);
if($c2 < $k5) {
$lost=mt_rand($k3,$k4);
$userhp = $userhp-$lost;
$comhit=true;
} else {
$userhp = $userhp;
}

} else {
if($progress[5] >= 5) {
$got=mt_rand(15,25);
$comhp=$comhp+$got;
$userhp = $userhp;
$comheal=true;
} elseif($progress[5] == 8) {
$got=mt_rand(10,17);
$comhp=$comhp+$got;
$userhp = $userhp;
$comheal=true;
} else {
$got=mt_rand(6,11);
$comhp=$comhp+$got;
$userhp = $userhp;
$comheal=true;
}

}
}
}
} else {
if(isset($userhp)) {
$userhp = $userhp;
} else {
$userhp = $progress[0];
}
$defence=true;
}

if($userhp >= 100) {
$userhp = 100;
}


if($progress[5] < 0) {
$cashused=0;
}


if(isset($defend) && isset($comhit)) {

$gj=mt_rand($k3,$lost);

$userhp = $userhp+$gj;

$lost = $lost-$gj;

}

if(isset($comhit) && $data[1] > 0 && !isset($gotdefenceup)) {
$lost = round($lost*0.7);
$userhp = $userhp+round(($lost*0.75)-$lost);
$data[1]--;
}

if(isset($hit) && $data[2] > 0 && !isset($gotattackup)) {
$dam = round($dam*1.3);
$comhp = $comhp+round(($dam*1.25)-$dam);
$data[2]--;
}

if($data[3] > 0 && !isset($gotpoison)) {
$pos=mt_rand(3,10);
$comhp = $comhp-$pos;
$data[3]--;
$poisoned=true;
}


if($progress[5] == "-1") {
mysql_query("UPDATE usersystem SET battleships_sentence = '".striphtml($_POST['say'])."' WHERE username='".$user['name']."'");
}

if($progress[5] == "-1") {
if($_POST['move'] == 1) {
$r=$progress[6];
} elseif($_POST['move'] == 2) {
$r=$progress[6]-mt_rand(9,14);
} elseif($_POST['move'] == 3) {
$r=$progress[6]+mt_rand(9,14);
} else {
$r=$progress[6];
}

if($r > 350) {
$r=350;
}


if(mt_rand(1,4) >= 3) {
$less=mt_rand(1,10);
$r=$r-$less;
$min=true;
}


if($r <= 0) {
$r=0;
}



mysql_query("UPDATE usersystem SET battleships_progress = '".$userhp."||".$comhp."||".$cashused."||".$turns."||".$progress[4]."||".$progress[5]."||".$r."' WHERE username='".$user['name']."'");

} else {

if($progress[5] == 8 && $comhp <= 0 && $data[5] >= 1) {
$comhp=100;
$draw=true;
}

mysql_query("UPDATE usersystem SET battleships_progress = '".$userhp."||".$comhp."||".$cashused."||".$turns."||".$progress[4]."||".$progress[5]."' WHERE username='".$user['name']."'");
}

if($gotdefenceup == true) {
$data[1] = 3;
}

if($gotattackup == true) {
$data[2] = 3;
}


if($gotpoison == true) {
$data[3] = 4;
}

if($gotstun == true) {
$data[4] = 3;
}

if($data[0] >= 100) {
$data[0] = 100;
}

if(isset($draw) && $data[5] >= 1) {
mysql_query("UPDATE usersystem SET battleships_data = '".$data[0]."||".$data[1]."||".$data[2]."||".$data[3]."||".$data[4]."||".($data[5]-1)."' WHERE username='".$user['name']."'");
$regenerate=true;
} elseif($progress[5] == 8) {
mysql_query("UPDATE usersystem SET battleships_data = '".$data[0]."||".$data[1]."||".$data[2]."||".$data[3]."||".$data[4]."||".$data[5]."' WHERE username='".$user['name']."'");
} else {
mysql_query("UPDATE usersystem SET battleships_data = '".$data[0]."||".$data[1]."||".$data[2]."||".$data[3]."||".$data[4]."' WHERE username='".$user['name']."'");
}

if($progress[0] <= 0) {

} elseif($progress[1] <= 0) {

} else {

if($hit) {
if($extrahit) {
echo"<b>Rhelwag godtar din ofring og gir ditt angrep ekstra styrke.</b><br/>";
}
echo"<b>Du traff ".$progress[4]."s ".$v." og skadet ".$dam." HP!</b><br/><br/>";

} else {
 if($moresp) {
echo"<b>Du ladet opp dine spesialpoeng og fikk 50 SP!</b><br/><br/>";
} else {
 if($heal) {
echo"<b>Du reparerte skipet ditt og fikk ".$dam." HP!</b><br/><br/>";
} else {
 if($defend) {
echo"<b>Du forsvarte skipet ditt!</b><br/><br/>";
} else {
 if($tactic) {
echo"<b>Du brukte en taktikk!</b><br/><br/>";
} else {
echo"<b>Du bommet p&#229; ".$progress[4]."s ".$v."!</b><br/><br/>"; 
}
}
}
}
}

if($poisoned) {
echo"<b>".$progress[4]." er forgiftet og mistet ".$pos." HP!</b><br/>";
}

if($regenerate) {
echo"<b>".$progress[4]."s ".$v." ble renovert og fikk full HP!</b><br/><br/>";
} else {
if($stunned) {
echo"<b>".$progress[4]."s ".$v." er lammet og kan ikke gj&#248;re noe!</b><br/><br/>";
} else {

if($comhit) {
echo"<b>".$progress[4]."s ".$v." traff deg og skadet ".$lost." HP!</b><br/><br/>";
} else {
if($defence) { echo"<b>Du unngikk ".$progress[4]."".$end." angrep!</b><br/><br/>"; 
} else {

if($comheal) {
if($progress[5] == 8) {
 echo"<b>".$progress[4]." ble reparert og fikk ".$got." HP!</b><br/><br/>";
} else {

 echo"<b>".$progress[4]."s ".$v." ble reparert og fikk ".$got." HP!</b><br/><br/>";
}
} else {
echo"<b>".$progress[4]."s ".$v." bommet p&#229; deg!</b><br/><br/>"; }} 
}
}
}
}
}
}


}


if(isset($min)) {
echo"<b>Vannet f&#229;r skipet til &#229; drive $less meter lengre inn mot land!</b><br/><br/>"; 
}

if(isset($_GET['d'])) {

if($_GET['d'] == "exit") {

echo"<br/><b>Seiler inn til land, vennligst vent...</b>";

mysql_query("UPDATE usersystem SET battleships_progress = '' WHERE username='".$user['name']."'");

echo"<meta http-equiv='refresh' content='0; url=center?action=games&name=battleships'>";
}
} else {
$result = mysql_query("SELECT battleships_progress,battleships_data FROM usersystem WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."'");
$d = mysql_fetch_array($result);

$progress = explode("||", $d['battleships_progress']);
$data = explode("||", $d['battleships_data']);

if($progress[5] == "5") {
$v="festning";
$l=true;
} elseif($progress[5] == "6") {
$v="borg";
$l=true;
} elseif($progress[5] == "8") {
$v="landsby";
$l=true;
} elseif($progress[5] == "-1") {
$v="slott";
$l=true;
} elseif($progress[5] == "-2") {
$v="villa";
$l=true;
} else {
$v="skip";
}

if($progress[5] != "-3" && !isset($progress[7])) {
if($progress[0] <= 0 || ($progress[6] <= 0 && $progress[5] == "-1")) {
if($progress[6] <= 0 && $progress[5] == "-1") {
echo"<br/><b>Du kommer for n&#230;rme inn til land og det resulterer i at du kr&#230;sjer!</b><br/><br/>
<img src='uploads/img/battleships_lose.gif'>";
} else {
echo"<br/><b>Skipet ditt ble senket av ".$progress[4]."!</b><br/><br/>
<img src='uploads/img/battleships_lose.gif'>";
}
if($progress[5] > 0) {
$x=$user['points'];
$vari = $x+2;
mysql_query("UPDATE usersystem SET points = '".$vari."'
WHERE username = '".$user['username']."'");
}

mysql_query("UPDATE usersystem SET battleships_progress = '' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET battleships_data = '' WHERE username='".$user['name']."'");

} elseif($progress[1] <= 0) {

if($progress[5] == 1) {
$tt=explode(".", mt_rand(50,65)-($progress[3]/4));
$g=$tt[0];
} elseif($progress[5] == 2) {
$tt=explode(".", mt_rand(60,75)-($progress[3]/4));
$g=$tt[0];
} elseif($progress[5] == 3) {
$tt=explode(".", mt_rand(75,90)-($progress[3]/3));
$g=$tt[0];
} elseif($progress[5] == 4) {
$tt=explode(".", mt_rand(90,105)-($progress[3]/3));
$g=$tt[0];
} elseif($progress[5] == 5) {
$tt=explode(".", mt_rand(175,195)-($progress[3]/2));
$g=$tt[0];
} elseif($progress[5] == 6) {
$tt=explode(".", mt_rand(240,260)-($progress[3]/2));
$g=$tt[0];
} elseif($progress[5] == 7) {
$tt=explode(".", mt_rand(240,260)-($progress[3]/3));
$g=$tt[0];
} elseif($progress[5] == 8) {
$tt=explode(".", mt_rand(260,285)-($progress[3]/2));
$g=$tt[0];
}

if($progress[3] >= 20) {
if(($user['points']-10) <= 0) {
} else {
mysql_query("UPDATE usersystem SET points = '(".$user['points']."-10)' WHERE username='".$user['name']."'");
}
}

if($progress[4] == "Hertug Maztizo" && !in_array("bs_splints", $user['itemsx'])) {
$got2=true;
mysql_query("UPDATE usersystem SET items = '".$user['items']."bs_splints,' WHERE username='".$user['name']."'");
}

if($progress[5] == 5 && !in_array("bs_zero", $user['itemsx'])) {
$got3=true;
mysql_query("UPDATE usersystem SET items = '".$user['items']."bs_zero,' WHERE username='".$user['name']."'");
}

if($progress[5] == 6 && !in_array("bs6", $user['itemsx'])) {
$got4=true;
mysql_query("UPDATE usersystem SET furni = '".$user['furni']."Piratkort,' WHERE username='".$user['name']."'");

}

if($progress[5] == "-1" && !in_array("es_1", $user['itemsx'])) {
$gotes1=true;
mysql_query("UPDATE usersystem SET items = '".$user['items']."es_1,' WHERE username='".$user['name']."'");
}


if($progress[5] == "-2" && !in_array("es_4", $user['itemsx'])) {
$gotes2=true;
mysql_query("UPDATE usersystem SET items = '".$user['items']."es_4,' WHERE username='".$user['name']."'");
}

$user2=mysql_fetch_array(mysql_query("SELECT * FROM usersystem WHERE username = '".$user['name']."'"));

$user2['itemsx'] = explode(",", $user2['items']);
$user2['name'] = $user2['username'];
$user2['badgesx'] = explode(",", $user2['badges']);
$user2['furnix'] = explode(",", $user2['furni']);

if($progress[5] == 1) {
if(!in_array("bs1", $user2['itemsx'])){mysql_query("UPDATE usersystem SET badges = '".$user2['badges']."TE1,' WHERE username='".$user2['name']."'");
mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs1,' WHERE username='".$user2['name']."'");
$got=true;}
} elseif($progress[5] == 2) {
if(!in_array("bs2", $user2['itemsx'])){mysql_query("UPDATE usersystem SET badges = '".$user2['badges']."TE2,' WHERE username='".$user2['name']."'");
mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs2,' WHERE username='".$user2['name']."'");$got=true;}
} elseif($progress[5] == 3) {
if(!in_array("bs3", $user2['itemsx'])){mysql_query("UPDATE usersystem SET badges = '".$user2['badges']."TE3,' WHERE username='".$user2['name']."'");mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs3,' WHERE username='".$user2['name']."'");$got=true;}
} elseif($progress[5] == 4) {
if(!in_array("bs4", $user2['itemsx'])){mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs4,' WHERE username='".$user2['name']."'");}
} elseif($progress[5] == 5) {
if(!in_array("bs5", $user2['itemsx'])){mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs5,' WHERE username='".$user2['name']."'");}
} elseif($progress[5] == 6) {
if(!in_array("bs6", $user2['itemsx'])){mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs6,' WHERE username='".$user2['name']."'");mysql_query("UPDATE usersystem SET badges = '".$user2['badges']."TE4,' WHERE username='".$user2['name']."'");

 $x1=$settings['latestprivatepostid'];
 $vari1 = $x1+1;
mysql_query("UPDATE latestids SET latestprivatepostid='".$vari1."'");

$sql="INSERT INTO post (id, receiver, sender, title, message, date, status) VALUES 
('".$vari1."','".$user['name']."','".$settings['third_bot_name']."'
,'Gratulerer med seieren!','Hei ".$user['name'].". Gratulerer med din seier i Battleships! Ditt nyvunne Piratkort kan bli brukt for &#229; f&#229; tilgang til banen \"Piratkontoret\" p&#229; Battleships. Der vil du finne en overraskelse som kan v&#230;re veldig brukbar dersom du er en del aktiv. Du har ogs&#229; f&#229;tt tilgang til et helt nytt kapittel med flere baner.
<br/><br/>[b]- MVH. Tina/bankdirekt&#248;ren.[/b]','".strftime("%d.%m.%Y - %H:%M")."','unread')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$got=true;}

} elseif($progress[5] == 7) {
if(!in_array("bs7_2", $user2['itemsx'])){mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs7_2,' WHERE username='".$user2['name']."'");}
} elseif($progress[5] == 8) {
if(!in_array("bs8", $user2['itemsx'])){mysql_query("UPDATE usersystem SET items = '".$user2['items']."bs8,' WHERE username='".$user2['name']."'");}
}


if($progress[5] > 0) {
if(!isset($l)) {
echo"<br/><b>Du senket ".$progress[4]."s ".$v." og ble bel&#248;nnet med $g mynter!";
} else {
echo"<br/><b>Du &#248;dela ".$progress[4]."s ".$v." og ble bel&#248;nnet med $g mynter!";
}
} else {
if(!isset($l)) {
echo"<br/><b>Du senket ".$progress[4]."s ".$v."!";
} else {
if($progress[5] == "-1") {
echo"<br/><b>Du beleiret ".$progress[4]."s ".$v."!";
} else {
echo"<br/><b>Du &#248;dela ".$progress[4]."s ".$v."!";
}
}
}
 if($got && $progress[5] != 7) { echo"<br/>Du fikk ett nytt skilt!"; }
 if($got2) { echo"<br/>Du fant ".$progress[4]."s lager med Splinter i skipsvraket og kan n&#229; bruke dem!"; }
 if($got3) { echo"<br/>Skipet ditt seiler inn til den mystiske &#248;ya. Der finner du proviant og noen kasser med m&#248;rkt pulver. Du har funnet Zero og kan n&#229; bruke det!"; }
 if($got4) { echo"<br/>Det lokale piratkontoret har bestemt seg for &#229; gi deg et Piratkort i bel&#248;nning.<br/>Dette gj&#248;r deg til en ekte pirat, men kan det brukes til noe mer?"; }
 if($got5) { echo"<br/>Du klarer &#229; sl&#229; fienden, men du kan ikke &#229;pne level 5 f&#248;r du har klart &#229; sl&#229; Hertug Maztizo! Sjekk ut <a href='page?id=19#credits'>Denne siden</a> for &#229; finne ut mer!"; }
 if($gotes1) { echo"<br/>N&#229;r du styrer skipet inn til land s&#229; kr&#230;sjer skipet og f&#229;r mange hull i skroget. Kaptein Fuse kommer til &#229; bli rasende! Du finner BotaX og befrir ham, men WuBot har flyktet med eggene i behold, hva skal du gj&#248;re n&#229;? Sjekk ut P&#229;skekampen for &#229; finne det ut."; }
 if($gotes2) { echo"<br/>Du seiler inn til den knuste villaen og f&#229;r se WuBot komme krypende ut av ruinene med egget i den ene h&#229;nden. BotaX fanger ham f&#248;r han f&#229;r dratt noen vei og tvinger ham i bakken. Sjekk ut P&#229;skekampen for &#229; motta din bel&#248;nning!"; }
 echo"</b><br/><br/>
<img src='uploads/img/battleships_win.gif'>";


if($progress[5] > 0) {

$x=$user['points'];
$vari = $x+6;

mysql_query("UPDATE usersystem SET points = '".$vari."' WHERE username = '".$user['username']."'");
} else {
$x=$user['points'];
$vari = $x+2;

mysql_query("UPDATE usersystem SET points = '".$vari."' WHERE username = '".$user['username']."'");
}

mysql_query("UPDATE usersystem SET battleships_progress = '' WHERE username='".$user['name']."'");

mysql_query("UPDATE usersystem SET battleships_data = '' WHERE username='".$user['name']."'");

 $x=$user['credits'];
 $vari3 = $x+$g;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");

} else {
if($progress[5] > 0 && $progress[5] != 6 && $progress[5] != 5 && $progress[5] != 8) {
if($progress[1] >= 95) {
$text = "Arh! Et fiendtlig skip i sikte! Det er <b>".$progress[4]."</b>, gj&#248;r s&#229; godt du kan!";
} elseif($progress[1] >= 80) {
$text = "Ahaha, slik skal det gj&#248;res ja, argh!";
} elseif($progress[1] >= 60) {
$text = "Kom igjen matros, snart er vi halvveis!";
} elseif($progress[1] >= 45) {
$text = "Derja! Arr, st&#229; p&#229;, vi kan vinne dette sj&#248;slaget!";
} elseif($progress[1] >= 30) {
$text = "N&#229; er det ikke mye igjen, argh!";
} elseif($progress[1] <= 29) {
$text = "N&#229; har vi ham nesten, gj&#248;r k&#229;l p&#229; skuta hans!";
}
} elseif($progress[5] == 5) {
if($progress[1] >= 190) {
$text = "Arrrgh! Vi blir beskutt! Knus den festningen f&#248;r skuta blir senket!";
} elseif($progress[1] >= 160) {
$text = "Nei! Det er ikke mulig... De bruker et v&#229;pen kalt <b>Zero</b>, det er det kraftigste v&#229;penet som fins!";
} elseif($progress[1] >= 120) {
$text = "Matey, kom igjen, hvis vi klarer dette vil vi bli bel&#248;nnet!";
} elseif($progress[1] >= 90) {
$text = "Ikke f&#229; panikk om han skader mye, bruk ditt kraftigste v&#229;pen og reparer skipet i ny og ne, s&#229; vi kan ta ham!";
} elseif($progress[1] >= 50) {
$text = "Arr, hvis du klarer dette, da har du min respekt...";
} elseif($progress[1] <= 49) {
$text = "Jeg aner ikke hvor p&#229; kartet vi er, denne &#248;ya er helt ukjent for meg.";
}

} elseif($progress[5] == 6) {
if($progress[1] >= 280) {
$text = "Kom igjen n&#229;, dette er det siste slaget f&#248;r vi er usl&#229;elige, gi alt du har!";
} elseif($progress[1] >= 230) {
$text = "Argh, aldri har jeg m&#248;tt noen som er sterkere enn deg...";
} elseif($progress[1] >= 170) {
$text = "Heldigvis g&#229;r det ann &#229; pr&#248;ve p&#229; nytt.";
} elseif($progress[1] >= 130) {
$text = "Ar, de kan ikke ta oss nei!";
} elseif($progress[1] >= 80) {
$text = "Jeg har h&#248;rt at noen vil gi deg en stor bel&#248;nning.";
} elseif($progress[1] <= 79) {
$text = "Gj&#248;r k&#229;l p&#229; dem!";
}

} elseif($progress[5] == 8) {
if($progress[1] >= 280) {
$text = "Argh! De er mektige innen bygging, men en gang s&#229; vil de ikke klare det lenger!";
} elseif($progress[1] >= 230) {
$text = "Det er vel derfor byen kalles \"Noobia\"...";
} elseif($progress[1] >= 170) {
$text = "Muahaha, de er ikke s&#230;rlig offensive, det er et feilsteg!";
} elseif($progress[1] >= 130) {
$text = "At de klarer det!";
} elseif($progress[1] >= 80) {
$text = "Disse nye oppdragene er litt spesielle.";
} elseif($progress[1] <= 79) {
$text = "Ye, n&#229; er de snart knust!";
}

} elseif($progress[5] == "-2") {
if($progress[1] >= 450) {
$text = "Kom igjen n&#229;, det ser ut som at villaen er kraftig, men tro meg det er bare innbildning.";
} elseif($progress[1] >= 400) {
$text = "Som du ser s&#229; er den bygd ganske kjapt og sl&#248;vt...";
} elseif($progress[1] >= 300) {
$text = "Hohohoho *host* dette minner meg om gamle dager!";
} elseif($progress[1] >= 200) {
$text = "Arr, la oss gj&#248;re ferdig dette, s&#229; vi kan f&#229; levert eggene tilbake!";
} elseif($progress[1] >= 100) {
$text = "H&#229;per WuBot gir seg snart...";
} elseif($progress[1] <= 99) {
$text = "*host, hark* huff, jeg begynner &#229; bli litt for gammel for dette.";
}

} else {
if($progress[1] >= 95) {
$text = "Arh! Velkommmen til treningsmodus. P&#229; trening betaler du ingenting, men du vil heller ikke kunne vinne noe.";
} elseif($progress[1] >= 80) {
$text = "Slik skal det gj&#248;res! Du kan bli mektigere enn Jataro, han er forel&#248;pig den mektigste...";
} elseif($progress[1] >= 60) {
$text = "Husk &#229; reparere skipet ditt hvis din HP blir for lav.";
} elseif($progress[1] >= 45) {
$text = "Etterhvert som du spiller p&#229; h&#248;yere level, kan du ogs&#229; bruke flere v&#229;pen.";
} elseif($progress[1] >= 30) {
$text = "Husk at det fins hemmeligheter i dette spillet, som venter p&#229; &#229; bli oppdaget!";
} elseif($progress[1] <= 29) {
$text = "Kom igjen, du har snart senket skuta!";
}
}
if($progress[5] == 4) {
if($progress[0] >= 95) {
$text2 = "Argh! Hva gj&#248;r du i mitt land uten tillatelse!?";
} elseif($progress[0] >= 80) {
$text2 = "Bom, bom, bom! Jeg lever av &#229; bombadere!";
} elseif($progress[0] >= 60) {
$text2 = "Arr, du kan ikke st&#229; imot mine sumobomber!";
} elseif($progress[0] >= 45) {
$text2 = "Argh, etterp&#229; skal vi feire p&#229; \"Den Gylne Tann\"!";
} elseif($progress[0] >= 30) {
$text2 = "Du er sterk, men du er fortsatt for svak...";
} elseif($progress[0] >= 16) {
$text2 = "N&#229;, har du noen siste ord?";
} elseif($progress[1] <= 15) {
$text2 = "Hwahahahaha...";
}

} elseif($progress[5] == "-2") {
if($progress[0] >= 95) {
$text2 = "Muahahahaha! S&#229; dere tror dere kan fange meg? Der tar dere feil!";
} elseif($progress[0] >= 80) {
$text2 = "Egget er mitt og jeg gir det ikke fra meg!";
} elseif($progress[0] >= 60) {
$text2 = "ARGH, du skal f&#229; betale for dette...";
} elseif($progress[0] >= 45) {
$text2 = "Villaen er veldig solid bygd, du har ikke en sjanse!";
} elseif($progress[0] >= 30) {
$text2 = "Kan vi ikke heller sette oss ned og nyte p&#229;sken?";
} elseif($progress[0] >= 16) {
$text2 = "P&#229;skefeiringen er herved over fra n&#229; av!";
} elseif($progress[0] <= 15) {
$text2 = "Gj&#248;r deg klar, jeg skal seire!";
}

} elseif($progress[5] == "-1") {
if($progress[0] >= 95) {
$text2 = "S&#229; du vil redde vennen din? Den g&#229;r nok ikke nei!";
} elseif($progress[0] >= 80) {
$text2 = "Denne p&#229;sken skal bli styrt av meg.";
} elseif($progress[0] >= 60) {
$text2 = "Fra mitt slott skal jeg skue ut over mitt nye imperium!";
} elseif($progress[0] >= 45) {
$text2 = "Landet her er snart under min kontroll, med hjelp av Eggene!";
} elseif($progress[0] >= 30) {
$text2 = "Arr, hverken du eller BotaX skal f&#229; stoppe meg...";
} elseif($progress[0] >= 16) {
$text2 = "Bah! Du kan ikke stanse meg uansett, ingen kan det.";
} elseif($progress[0] <= 15) {
$text2 = "Jeg skal knuse deg!";
}


} elseif($progress[4] == "Hertug Maztizo") {
if($progress[0] >= 95) {
$text2 = "Velvel, hvem har vi her mon tro?";
} elseif($progress[0] >= 80) {
$text2 = "Uff, du er sterk, men vi vil kjempe til siste slutt!";
} elseif($progress[0] >= 60) {
$text2 = "Ouch, Vi er p&#229; vei for &#229; handle med Keiser Krisster, men vi skal avslutte dette f&#248;rst!";
} elseif($progress[0] >= 45) {
$text2 = "V&#229;r spesialitet er splinter, de er n&#229;del&#248;se.";
} elseif($progress[0] >= 30) {
$text2 = "Argh! Huff, jeg begynner &#229; ligne en pirat!";
} elseif($progress[0] >= 16) {
$text2 = "Hva var det?";
} elseif($progress[1] <= 15) {
$text2 = "Hehehe...";
}



} else {
if($progress[0] > 95) {
$text2 = "Grrr... Jeg skal senke skipet ditt om det er det siste jeg gj&#248;r!";
} elseif($progress[0] >= 80) {
$text2 = "Arr! Vi er sterkere enn vi ser ut!";
} elseif($progress[0] >= 60) {
$text2 = "Pass deg n&#229; landkrabbe, vi gir oss ikke, argh!";
} elseif($progress[0] >= 45) {
$text2 = "Mwahahaha, vi tar deg, bare vent og se!";
} elseif($progress[0] >= 30) {
$text2 = "Hiv og hoi, snart er skatten v&#229;r!";
} elseif($progress[0] >= 16) {
$text2 = "Mehehe... Du klarer ikke &#229; st&#229; imot oss mye lengre!";
} elseif($progress[1] <= 15) {
if($progress[4] == "Chong Lee-t") {
$text2="1337";
} else {
$text2 = "Har du noe du vil si f&#248;r jeg &#248;delegger deg?";
}
}
}
echo"<form method='post'>";
if($progress[5] == "-2") {
echo"<fieldset><legend><b>Kaptein BotaX:</b></legend><div style='text-align:left;'>".$text."</div></fieldset><br/>";
} elseif($progress[5] == "-1") {
$go=mysql_fetch_array(mysql_query("SELECT battleships_sentence FROM usersystem WHERE username = '".$user['name']."' LIMIT 1"));
echo"<fieldset><legend><b>Kaptein ".$user['name'].":</b></legend><div style='text-align:left;'>";

echo"<input type='text' id='textinput' style='width:480px;' name='say' value='".$go['battleships_sentence']."' />"; echo"</div></fieldset><br/>";


} else {
echo"<fieldset><legend><b>Kaptein Fuse:</b></legend><div style='text-align:left;'>".$text."</div></fieldset><br/>";
}
if($progress[5] != 0 && $progress[5] < 5) {
/*if($progress[5] == 5) {
echo"<fieldset><legend><b>".$progress[4].":</b></legend><div style='text-align:left; background-color:#000000;'>".$text2."</div></fieldset><br/>";
} else {*/
echo"<fieldset><legend><b>".$progress[4].":</b></legend><div style='text-align:left;'>".$text2."</div></fieldset><br/>";
//}
}

if($progress[5] == "-2") {
$t=$progress[1]/5;
} elseif($progress[5] == "-1") {
$t=$progress[1]/4;
} elseif($progress[5] == "5") {
$t=$progress[1]/2;
} elseif($progress[5] == "6") {
$t=$progress[1]/3;
} elseif($progress[5] == "7") {
$t=$progress[1]/1.2;
} else {
$t=$progress[1];
}

if($progress[5] == "-2") {
$w=500;
} elseif($progress[5] == "-1") {
$w=420;
} elseif($progress[5] == "5") {
$w=260;
} elseif($progress[5] == "6") {
$w=340;
} elseif($progress[5] == "7") {
$w=195;
} else {
$w=180;
}

 echo"


<b>Mitt skip:</b><div style='border: 1px solid #474747; height: 13px; background: #F5F5F5; width:180px; text-align:left;'>
<div style='height: 13px; background: "; if($progress[0] <= 25) {echo"rgb(255, 0, 0)";} elseif($progress[0] <= 50) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";} echo"; width: ".$progress[0]."%;' align='left'>&nbsp;".$progress[0]."%&nbsp;HP</div></div><br/>

<div style='border: 1px solid #474747; height: 13px; background: #F5F5F5; width:180px; text-align:left;'>
<div style='height: 13px; background: rgb(0,178,238); width: ".$data[0]."%;' align='left'>&nbsp;".$data[0]."%&nbsp;SP</div></div><br/>


<b>".$progress[4]."s ".$v.":</b><div style='border: 1px solid #474747; height: 13px; background: #F5F5F5; width:".$w."px; text-align:left;'>
<div style='height: 13px; background: ";

if($progress[5] == "-2") {
 if($progress[1] <= 125) {echo"rgb(255, 0, 0)";} elseif($progress[1] <= 250) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";}
} elseif($progress[5] == "-1") {
 if($progress[1] <= 100) {echo"rgb(255, 0, 0)";} elseif($progress[1] <= 200) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";}
} elseif($progress[5] == "5") {
 if($progress[1] <= 50) {echo"rgb(255, 0, 0)";} elseif($progress[1] <= 100) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";}
} elseif($progress[5] == "6") {
 if($progress[1] <= 75) {echo"rgb(255, 0, 0)";} elseif($progress[1] <= 150) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";}
} elseif($progress[5] == "7") {
 if($progress[1] <= 30) {echo"rgb(255, 0, 0)";} elseif($progress[1] <= 60) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";}
} else {
 if($progress[1] <= 25) {echo"rgb(255, 0, 0)";} elseif($progress[1] <= 50) {echo"rgb(255,215,0)";} else {echo"rgb(0, 153, 0)";}
}
 echo"; width: ".$t."%;' align='left'>&nbsp;".$progress[1]."%&nbsp;HP</div></div><br/>";
if($progress[5] > 0) {
echo"
Du har brukt <b>".$progress[2]."</b> mynter til n&#229;.<br/>"; 
$j=true;
}else{
$j=false;
}
if($progress[5] > 0) {
echo"Du spiller p&#229; level <b>".$progress[5]."</b>.<br/>";
}
if($progress[5] == "-1") {
/*
if($progress[6] == 10) {
$ty=150;
} elseif($progress[6] == 9) {
$ty=170;
} elseif($progress[6] == 8) {
$ty=190;
} elseif($progress[6] == 7) {
$ty=210;
} elseif($progress[6] == 6) {
$ty=230;
} elseif($progress[6] == 5) {
$ty=250;
} elseif($progress[6] == 4) {
$ty=270;
} elseif($progress[6] == 3) {
$ty=290;
} elseif($progress[6] == 2) {
$ty=310;
} elseif($progress[6] == 1) {
$ty=330;
}
*/
echo"Du er <b>".$progress[6]."</b> meter unna m&#229;let.<br/>";
}

echo"Det har g&#229;tt <b>".$progress[3]."</b> trekk.<br/><br/><b>Handling:</b><br/><select name='do' style='font-family: verdana; font-size:12px;' id='textinput' >
";
echo"<optgroup label='&nbsp;[Angrep]' style='font-family: verdana; font-size:12px;'>";

if($progress[5] != "-1" && $progress[5] != "-2") {
 echo"
<option value='ball'>- Kanonkule (skader 3 - 7 HP)"; if($j){echo" (1 mynt)";} echo"</option>
<option value='can'>- Oljet&#248;nne (skader 5 - 10 HP)"; if($j){echo" (2 mynt)";} echo"</option>"; 
} else {
echo"<option value='egg'>- Eggranat (skader 10 - 30 HP)</option>
<option value='fire'>- Gulrotmissil (skader 20 - 40 HP)</option>"; 
if($progress[5] != "-1") {
echo"
<option value='bun'>- Kaninbombe (skader 30 - 60 HP)</option>"; 
}
}
if($progress[5] > 1) {
echo"
<option value='bomb'>- Bombe (skader 7 - 14 HP) (3 mynt)</option>
";
} 

if($progress[5] > 2) {
 echo"<option value='deathbomb'>- D&#248;dsbombe (skader 12 - 19 HP) (4 mynt)</option>";

}
if(in_array("bs_splints", $user['itemsx']) && $progress[5] > 1) {
 echo"<option value='splints'>- Splinter (skader 9 - 23 HP) (5 mynt)</option>";
}
if(in_array("bs_zero", $user['itemsx']) && $progress[5] > 2) {
 echo"<option value='zero'>- Zero (skader 5 - 30 HP) (6 mynt)</option>";
}
echo"</optgroup>";

echo"<optgroup label='&nbsp;[Reparering]' style='font-family: verdana; font-size:12px;'>";

if($progress[5] != "-1" && $progress[5] != "-2") {
echo"<option value='shel'>+ Sm&#229;fiks (helbreder 4 - 10 HP)"; if($j){echo" (5 mynt)";} echo"</option>";
} else {
echo"<option value='choco'>+ Sjokoladeegg (helbreder 6 - 12 HP)</option>";
}
if($progress[5] > 1) { 
echo"<option value='heal'>+ Stabilisering (helbreder 7 - 13 HP) (8 mynt)</option>";
}
if($progress[5] > 3) {
echo"<option value='mhel'>+ Overhaling (helbreder 12 - 20 HP) (12 mynt)</option>"; 
}
if($progress[5] > 4 && in_array("bs_bhel", $user['itemsx'])) {
echo"<option value='bhel'>+ Rehabilitering (helbreder 15 - 24 HP) (13 mynt)</option>"; 
}
if($progress[5] > 5) {
echo"<option value='ghel'>+ Velsignelse (helbreder 18 - 28 HP) (15 mynt)</option>"; 
}
echo"</optgroup>";
echo"<optgroup label='&nbsp;[Taktikk]' style='font-family: verdana; font-size:12px;'>";

echo"<option value='defence'>~ Forsvarelse (1 SP)";

echo"</option>"; 


if($progress[5] > 0) {
echo"<option value='moresp'>~ Spesialmana (lader opp 50 SP) (13 mynt)</option>"; 
}

if($progress[5] > 0) {
echo"<option value='defenceup'>~ Forsvarsforsterker (varighet: 3 angrep) (15 SP)</option>"; 
}

if($progress[5] > 1) {
echo"<option value='attackup'>~ Angrepsforsterker (varighet: 3 angrep) (20 SP)</option>"; 
}

if($progress[5] > 3) {
echo"<option value='poison'>~ Forgiftning (varighet: 4 trekk) (35 SP)</option>"; 
}

if($progress[5] > 4) {
echo"<option value='stun'>~ Lammelse (varighet: 3 trekk) (40 SP)</option>"; 
}

echo"</optgroup>";
if($progress[5] != "-1") {
echo"
</select><br/><br/><b>Forsvar:</b><br/><select name='defence' id='textinput'>
<option value='1'>Flytt skipet fremover</option>
<option value='2'>Flytt skipet bakover</option>
<option value='3'>Sving skipet til h&#248;yre</option>
<option value='4'>Sving skipet til venstre</option>
</select><br/><br/>";
}
if($progress[5] == "-1") {
echo"
</select><br/><br/><b>Skipshandling:</b><br/><select name='move' id='textinput'>
<option value='1'>St&#229; rolig</option>
<option value='2'>Kj&#248;r fremover</option>
<option value='3'>Kj&#248;r bakover</option>
</select><br/>Jo n&#230;rmere m&#229;let du er, desto oftere treffer du og fienden din hverandre.<br/>Dersom du kommer helt inn til m&#229;let s&#229; vil du kr&#230;sje og tape.<br/><br/>";
}
if($progress[5] > 0 && in_array("bs_wrath", $user['itemsx'])) {
echo"<b>Rhelwags vrede:</b><br/><input type='text' value='0' name='extrahit' style='width:50px;' id='textinput' maxlength='2' /><img src='themes/wuax_v2/buttons/points.gif' alt='Poeng' title='Poeng' style='vertical-align: -3px; padding-left: 3px;'><br/>Her kan du legge inn en sum med poeng for &#229; treffe mer.<br/>Dette virker ikke p&#229; noen form for reparering.
<br/><br/>";
}

 echo"<input type='submit' id='button' value='Utf&#248;r'><br/><br/>Spillet ditt blir lagret hele tiden s&#229; ikke v&#230;r redd for &#229; g&#229; ut av siden. Du vil starte fra der du er kommet n&#229;r du gjennopptar spillet, med mindre du klikker p&#229; \"Avslutt spill\".</form>
<br/><a href='center?action=games&name=battleships&d=exit' onclick='return confirm(\"Er du sikker? Du vil ikke kunne gjennoppta spillet om du avslutter det.\");'>Avslutt spill</a>";


}
} else {
if(isset($progress[7]) && ($progress[5] == 5 || $progress[5] == 6 || $progress[5] == 8)) {
if($progress[5] == 5) {
echo"<b>Du har dratt langt men trenger forsyninger og seiler inn mot en liten &#248;y.<br/>Du h&#229;per p&#229; &#229; kunne forhandle om n&#248;dvendig utstyr, men i midten rager<br/> en stor festning og etterhvert som du n&#230;rmer deg blir du angrepet...</b>
<br/><br/><a href='".REQUEST_URL."'>Fortsett</a>";
mysql_query("UPDATE usersystem SET battleships_progress = '100||200||0||0||".$progress[4]."||5||0' WHERE username='".$user['name']."'");
} elseif($progress[5] == 8) {
echo"<b>Du har kommet til en landsby for &#229; plyndre, men innbyggerne gj&#248;r effektiv motstand ved &#229; reparere skadene. Dette kan ta tid!</b><br/><br/><a href='".REQUEST_URL."'>Fortsett</a>";
mysql_query("UPDATE usersystem SET battleships_progress = '100||100||0||0||".$progress[4]."||8||0' WHERE username='".$user['name']."'");
} else {
echo"<b>Den siste kampen venter deg f&#248;r du er en ekte pirat, er du klar?</b><br/><br/><a href='".REQUEST_URL."'>Fortsett</a>";
mysql_query("UPDATE usersystem SET battleships_progress = '100||300||0||0||".$progress[4]."||6||0' WHERE username='".$user['name']."'");
}
} else {
if(!in_array("bs7", $user['itemsx'])) {
echo"<b>Du g&#229;r til inngangen av kontoret og blir bedt om legitimasjon. Du tar fram Piratkortet ditt og viser det. Dette er godt nok for vakten som lar deg g&#229; videre.<br/>Inne s&#229; blir du m&#248;tt av eieren Jataro og hans ord:</b><br/>\"Velkommen! Her kan du veksle inn dine stjerner for &#229; f&#229; gull.\"<br/><br/>
<b>Dersom du har over 200 poeng s&#229; kan du n&#229; konvertere poengene dine til mer mynt her!</b><br/><br/>";





if(isset($_POST['amount']) && is_numeric($_POST['amount']) && $_POST['amount'] >= 200) {
if($user['points'] >= $_POST['amount']) {


 $x=$user['points'];
 $vari3 = $x-$_POST['amount'];

mysql_query("UPDATE usersystem SET points = '".$vari3."' WHERE username='".$user['name']."'");


 $y = $_POST['amount']*0.75;
 $do = round($y);

 $x=$user['credits'];
 $vari3 = $x+$do;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");


echo"Du har konvertert ".$_POST['amount']." poeng til ".$do." mynt!<br/><br/>";

} else {
echo"Du har ikke nok poeng til &#229; fullf&#248;re denne transaksjonen!<br/><br/>";
}
}
echo"<div style='text-align: left;'>Her kan du konvertere poengene dine til mynter. Du f&#229;r 0.5 ganger mer mynt av poengene du konverterer enn i Banken. Du kan ikke konvertere tilbake. For &#229; bruke denne m&#229; du konvertere minst 200 poeng.
</div><hr/>
<form method='post' action='".REQUEST_URL."'>
<b>Mengde:</b><br/><input type='text' name='amount' value='200' id='textinput'><br/><br/><input type='submit' value='Konverter' id='button'></form>";






echo"
<br/><a href='".REQUEST_URL."&d=exit'>Tilbake</a>";
} else {


if(isset($_POST['amount']) && is_numeric($_POST['amount']) && $_POST['amount'] >= 200) {
if($user['points'] >= $_POST['amount']) {


 $x=$user['points'];
 $vari3 = $x-$_POST['amount'];

mysql_query("UPDATE usersystem SET points = '".$vari3."' WHERE username='".$user['name']."'");


 $y = $_POST['amount']*0.75;
 $do = round($y);

 $x=$user['credits'];
 $vari3 = $x+$do;

mysql_query("UPDATE usersystem SET credits = '".$vari3."' WHERE username='".$user['name']."'");


echo"Du har konvertert ".$_POST['amount']." poeng til ".$do." mynt!<br/><br/>";

} else {
echo"Du har ikke nok poeng til &#229; fullf&#248;re denne transaksjonen!<br/><br/>";
}
}
echo"<div style='text-align: left;'>Her kan du konvertere poengene dine til mynter. Du f&#229;r 0.5 ganger mer mynt av poengene du konverterer enn i Banken. Du kan ikke konvertere tilbake. For &#229; bruke denne m&#229; du konvertere minst 200 poeng.
</div><hr/>
<form method='post' action='".REQUEST_URL."'>
<b>Mengde:</b><br/><input type='text' name='amount' value='200' id='textinput'><br/><br/><input type='submit' value='Konverter' id='button'></form>";



echo"<br/><a href='".REQUEST_URL."&d=exit'>Tilbake</a>";
}


if(!in_array("bs7", $user['itemsx']) && in_array("bs6", $user['itemsx'])){

mysql_query("UPDATE usersystem SET items = '".$user['items']."bs7,' WHERE username='".$user['name']."'");

}



}}
}

} else {

if(isset($_POST['newgame']) && is_numeric($_POST['level']) && ($_POST['level'] == 0 || $_POST['level'] == "-1" || $_POST['level'] == "-2" || $_POST['level'] == "-3" || $_POST['level'] == 1 || $_POST['level'] == 2 || $_POST['level'] == 3 || $_POST['level'] == 4 || $_POST['level'] == 5 || $_POST['level'] == 6 || $_POST['level'] == 7 || $_POST['level'] == 8)) {

	if($_POST['level'] == 4) {
	$randomq[] = "Norg Theral";
	} elseif($_POST['level'] == 0) {
	$randomq[] = "Kaptein Jataro";
	} elseif($_POST['level'] == "-1") {
	$randomq[] = "WuBot";
	} elseif($_POST['level'] == "-2") {
	$randomq[] = "Kong WuBot";
	} elseif($_POST['level'] == 5) {
	$randomq[] = "Kong Vehzar";
	} elseif($_POST['level'] == 6) {
	$randomq[] = "Guvern&#248;r Kirelte";
	} elseif($_POST['level'] == 8) {
	$randomq[] = "Noobia";
	} else {
	$randomq[] = "Kaptein Svartskjegg";
        $randomq[] = "Grusomme Igor";
	$randomq[] = "Fryktl&#248;se Gitta";
	$randomq[] = "Chong Lee-t";
	$randomq[] = "Kaptein Svabertang";
	$randomq[] = "Keiser Krisster";
	$randomq[] = "Kapt'n Kolombas";

if(in_array("bs4", $user['itemsx']) && !in_array("bs5", $user['itemsx'])) {
	$t=mt_rand(1,3);
	if($t == mt_rand(1,3)) {
	$randomq[] = "Hertug Maztizo";	
	}
} else {
	$t=mt_rand(1,2);
	if($t == mt_rand(1,2)) {
	$randomq[] = "Hertug Maztizo";	
	}
}
}

$choose = mt_rand(0,count($randomq)-1);

$output = $randomq[$choose];

if($_POST['level'] == "-1"){
if(in_array("es_bs", $user['itemsx'])) {
$ok=true;
}
} elseif($_POST['level'] == "-2"){
if(in_array("es_bs2", $user['itemsx'])) {
$ok=true;
}
} elseif($_POST['level'] == "-3"){
if(in_array("Piratkort", $user['furnix'])) {$ok=true;}
} elseif($_POST['level'] == 0){
$ok=true;
} elseif($_POST['level'] == 1){
$ok=true;
} elseif($_POST['level'] == 2){
if(in_array("bs1", $user['itemsx'])) {$ok=true;}
} elseif($_POST['level'] == 3){
if(in_array("bs2", $user['itemsx'])) {$ok=true;}
} elseif($_POST['level'] == 4){
 if(in_array("bs3", $user['itemsx'])) {$ok=true;}
} elseif($_POST['level'] == 5){
if(in_array("bs4", $user['itemsx']) && in_array("bs_splints", $user['itemsx'])
){ $ok=true; }
} elseif($_POST['level'] == 6){
if(in_array("bs5", $user['itemsx'])
){ $ok=true; }
} elseif($_POST['level'] == 7){
if(in_array("bs6", $user['itemsx'])
){ $ok=true; }
} elseif($_POST['level'] == 8){
if(in_array("bs7_2", $user['itemsx'])
){ $ok=true; }
}

if($ok) {

if($_POST['level'] == "-2") {
$lif=500;
} elseif($_POST['level'] == "-1") {
$lif=400;
} elseif($_POST['level'] == "5") {
$lif=200;
} elseif($_POST['level'] == "6") {
$lif=300;
} elseif($_POST['level'] == "7") {
$lif=120;
} else {
$lif=100;
}

if($_POST['level'] >= 5 && $_POST['level'] != 7) {
mysql_query("UPDATE usersystem SET battleships_progress = '100||".$lif."||0||0||".$output."||".$_POST['level']."||0||false' WHERE username='".$user['name']."'");
} elseif($_POST['level'] == "-1") {
mysql_query("UPDATE usersystem SET battleships_progress = '100||".$lif."||0||0||".$output."||".$_POST['level']."||150' WHERE username='".$user['name']."'");
} else {
mysql_query("UPDATE usersystem SET battleships_progress = '100||".$lif."||0||0||".$output."||".$_POST['level']."||0' WHERE username='".$user['name']."'");
}

if($_POST['level'] == 8) {
mysql_query("UPDATE usersystem SET battleships_data = '100||0||0||0||0||3' WHERE username='".$user['name']."'");
} else {
mysql_query("UPDATE usersystem SET battleships_data = '100||0||0||0||0' WHERE username='".$user['name']."'");
}

if($_POST['level'] == "-1") {
echo"<br/><b>Seiler ut fra kaien - nei vent, hvordan skal dette g&#229;?<br/><br/>Kaptein Fuse er p&#229; p&#229;skeferie, s&#229; hvem skal styre skipet... Dette m&#229; du nok gj&#248;re selv. P&#229; denne banen s&#229; har du n&#229; muligheter til &#229; gj&#248;re ting du ikke har kunnet f&#248;r, men pass p&#229; hvor du kj&#248;rer!</b><br/><br/><a href='".REQUEST_URL."'>Fortsett</a>";
} else {
echo"<br/><b>Seiler ut fra kaien, vennligst vent...</b>";
echo"<meta http-equiv='refresh' content='0; url=center?action=games&name=battleships'>";
}

 }


} else {



if(in_array("bs5", $user['itemsx']) && !in_array("bsdo6", $user['itemsx']) && !empty($_POST['answer'])) {

if(isstr("krabbe", strtolower($_POST['answer']))) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."bsdo6,' WHERE username='".$user['name']."'");
echo"Riktig svar, du har n&#229; &#229;pnet level 6!<br/><br/>";
} else {
echo"Feil svar.<br/><br/>";
}
}


if(isset($_GET['buy'])) {

if($_GET['buy'] == "piratecard" && $user['credits'] >= 400 && in_array("bs5", $user['itemsx']) && !in_array("Piratkort", $user['furnix'])) {
mysql_query("UPDATE usersystem SET furni = '".$user['furni']."Piratkort,' WHERE username='".$user['name']."'");
mysql_query("UPDATE usersystem SET credits = '".($user['credits']-400)."' WHERE username='".$user['name']."'");
echo"Du har kj&#248;pt <b>Piratkort</b>!<br/><br/>";
} elseif($_GET['buy'] == "bhel" && $user['credits'] >= 100 && !in_array("bs_bhel", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."bs_bhel,' WHERE username='".$user['name']."'");
mysql_query("UPDATE usersystem SET credits = '".($user['credits']-100)."' WHERE username='".$user['name']."'");
echo"Du har kj&#248;pt <b>Rehabilitering</b>!<br/><br/>";
} elseif($_GET['buy'] == "bs_wrath" && $user['credits'] >= 175 && !in_array("bs_wrath", $user['itemsx'])) {
mysql_query("UPDATE usersystem SET items = '".$user['items']."bs_wrath,' WHERE username='".$user['name']."'");
mysql_query("UPDATE usersystem SET credits = '".($user['credits']-175)."' WHERE username='".$user['name']."'");
echo"Du har kj&#248;pt <b>Rhelwags vrede</b>!<br/><br/>";
}
}

$rt=mysql_fetch_array(mysql_query("SELECT items, furni FROM usersystem WHERE username = '".$user['name']."' LIMIT 1"));
$rt['itemsx']=explode(",", $rt['items']);
$rt['furnix']=explode(",", $rt['furni']);

echo"
<fieldset><legend><b>Kaptein Fuse:</b></legend><div style='text-align:left;' align='left'>Argh matey! Ye, s&#229; du mener du har det som skal til for &#229; overleve p&#229; disse stormfulle havene? 
Arr, vel jeg skal jammen meg gi deg en sjanse, men du m&#229; betale for amunisjonen selv. Hver gang du klare &#229; senke et skip skal jeg gi deg en gullskatt!</div></fieldset>
<br/><form method='post'><input type='hidden' name='newgame' value='1'><b>Velg en bane:</b><br/><select name='level' id='textinput'>
";
echo"<optgroup label='&nbsp;Spesialbaner' style='font-family: verdana; font-size:12px;'>"; 

echo"<option value='0'>Trening: Jucaler</option>";

if(in_array("es_bs", $user['itemsx'])) {
echo"<option value='-1'>P&#229;ske 1: Cratle</option>";
}
if(in_array("es_bs2", $user['itemsx'])) {
echo"<option value='-2'>P&#229;ske 2: Khaol</option>";
}

if(in_array("Piratkort", $rt['furnix'])) {
echo"<option value='-3'>Piratkontoret</option>";
}

echo"</optgroup>";

echo"<optgroup label='&nbsp;Battleships 1:' style='font-family: verdana; font-size:12px;'>"; 


echo"<option SELECTED value='1'>Level 1: Wura</option>";

 if(in_array("bs1", $user['itemsx'])) {echo"<option value='2'>Level 2: Dokut</option>";}

 if(in_array("bs2", $user['itemsx'])) {echo"<option value='3'>Level 3: Cazavu</option>";}

 if(in_array("bs3", $user['itemsx'])) {echo"<option value='4'>Level 4: Torax</option>";} 

 if(in_array("bs4", $user['itemsx']) && in_array("bs_splints", $user['itemsx'])) {echo"<option value='5'>Level 5: Kelthia</option>";} 



if(in_array("bsdo6", $rt['itemsx'])) {
 if(in_array("bs5", $rt['itemsx'])) {echo"<option value='6'>Level 6: Finale</option>";} 
}
echo"</optgroup>";

if(in_array("bs6", $rt['itemsx'])) {
echo"<optgroup label='&nbsp;Battleships 2:' style='font-family: verdana; font-size:12px;'>"; 

if(in_array("bs6", $rt['itemsx'])) {echo"<option value='7'>Level 7: Qalomite</option>";}

if(in_array("bs7_2", $rt['itemsx'])) {echo"<option value='8'>Level 8: Noobia</option>";}


echo"</optgroup>";
}
 echo"
</select><br/><br/><input type='submit' value='Start spill!' id='button'></form><br/><hr/><b>Piratbutikken:</b>";
if((in_array("bs6", $rt['itemsx']) && !in_array("Piratkort", $rt['furnix'])) || (!in_array("bs_bhel", $rt['itemsx'])) || (!in_array("bs_wrath", $rt['itemsx']))) {
if(in_array("bs6", $rt['itemsx']) && !in_array("Piratkort", $rt['furnix'])) {
echo"<br/><br/><a href='center?action=games&name=battleships&buy=piratecard' onclick='return confirm(\"Er du sikker?\");'>Nytt Piratkort (400 mynt)</a><br/>Gj&#248;r at du kan komme inn p&#229; Piratkontoret.";
} 
if(!in_array("bs_bhel", $rt['itemsx'])) {
echo"<br/><br/><a href='center?action=games&name=battleships&buy=bhel' onclick='return confirm(\"Er du sikker?\");' onclick='confirm(\"Er du sikker?\");'>Rehabilitering (100 mynt)</a><br/>Koster 13 mynt &#229; bruke, <b>kan kun brukes fra level 5</b> og helbreder 15 - 24 HP.";
}
if(!in_array("bs_wrath", $rt['itemsx'])) {
echo"<br/><br/><a href='center?action=games&name=battleships&buy=bs_wrath' onclick='return confirm(\"Er du sikker?\");'>Rhelwags vrede (175 mynt)</a><br/> Gj&#248;r at du kan bruke poeng til &#229; f&#229; bedre skudd.";
}

} else {
echo"<br/><br/>Butikklageret er tomt for varer.";
}

if(in_array("bs5", $rt['itemsx']) && !in_array("bsdo6", $rt['itemsx'])) {

echo"<br/><hr/><b>L&#248;s denne g&#229;ten for &#229; &#229;pne siste level:</b><br/><br/>- Jeg er skarp.<br/>- Jeg er hard.<br/>- Jeg er langt nede.<br/>- Jeg kan g&#229;.<br/>Hva er jeg?<br/><br/><b>Svar:</b><br/>
<form method='post'><input type='text' id='textinput' name='answer'><br/><br/><input type='submit' id='button' value='Send'></form><br/>
<div id='masterdiv'>

	<div class='menutitle' onclick=\"SwitchMenu('sub1')\" style=' width:380px;'>N&#248;kkelhint &#187;</div>
	<span class='submenu' id='sub1' style='padding-bottom:5px;padding-top:5px; width:380px;'>Havet er min venn, men ikke b&#229;tene...</span>
</div>
";

}
}
}

?>