

						

<?php

if(!defined("MAIN_SET")) { die("Dette er en systemfil som er skjult for brukere"); }

echo"
<a href='index'>Forside</a> | <a href='http://www.habbo.no/groups/habbofix'>Gruppe p&aring; Habbo</a>
 | <a href='http://www.habbo.no'>Habbo</a> | <a href='news'>Nyheter</a>"; if(isset($user['name'])) { echo" | <a href='logout.php'>Logg ut</a>"; } else { echo" | <a href='login'>Logg inn</a>
 | <a href='register'>Registrer deg</a>"; } echo"
";

?>