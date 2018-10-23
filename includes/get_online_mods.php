<?php

        $motto = explode('sikkerheten ved like.', file_get_contents("http://www.habbo.no/help/98"));
        $motto = explode('.', $motto[1]);
        $motto = trim($motto[0]);
	$output = $motto;
if($output) {

$output = str_replace("og", ",", $output);
$output = str_replace(" ", "", $output);
$output = str_replace("Mod", "MOD", $output);
$output = str_replace("mod", "MOD", $output);

$output = explode(",", $output);
$output[] = "MOD-Kris";
$output[] = "LadyStarlight";
$output[] = "MissCayenne";
$output[] = "MissZenobia";

foreach($output as $mod)
{
if($mod != "") {
        $motto = explode('		<div class="birthday text">', file_get_contents("http://habbo.no/home/".$mod."/"));
        $motto = explode('		</div>

		<br class="clear" />', $motto[0]);
        $motto = trim($motto[1]);
if(eregi("online", $motto)) {
echo"<a href='http://www.habbo.no/home/".$mod."'>".$mod."</a><br/>";
} } }
} else {
echo"En feil skjedde.";
}
?>