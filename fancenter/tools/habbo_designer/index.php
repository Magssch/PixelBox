<?php


// Settings

$language = "norwegian";

// Settings


include_once ("source_codes/lang_".$language.".php");

echo"
<title>Habbo Designer</title>

<link rel='stylesheet' href='fancenter/tools/habbo_designer/source_codes/style.css' type='text/css' />

";

if (isset($_REQUEST['name'])) {

echo"

<style type='text/css'>

body {
font-family: Verdana; 
font-size: 11px; 
font-weight: normal; 
color: #000000;
}

</style>

<p>".$lang['1'].":</p>
<input type='text' id='result-url' style='font-family: Verdana; font-size: 12px; font-weight: normal; color: #000000; width: 380px;' 
READONLY onFocus='this.select()' value='http://www.habbo.".$_REQUEST['domain']."/habbo-imaging/avatarimage?user=".$_REQUEST['name']."&action=".$_REQUEST['action']."
&direction=".$_REQUEST['bodydir']."&head_direction=".$_REQUEST['headdir']."&gesture=".$_REQUEST['mood']."&size=".$_REQUEST['size']."'>

<br/> <br/>
<img src='http://www.habbo.".$_REQUEST['domain']."/habbo-imaging/avatarimage?user=".$_REQUEST['name']."
&action=".$_REQUEST['action']."&direction=".$_REQUEST['bodydir']."&head_direction=".$_REQUEST['headdir']."&gesture=".$_REQUEST['mood']."&size=".$_REQUEST['size']."'
alt='".$lang['2']."'>

</center>
";
}

echo"
<center>
<br/>
<div id='container'>
  <div id='top'></div>
  <div id='mid'><form method='post'>
  "; 
  
  if (isset($_REQUEST['name'])) {
  echo" ".$lang['3'].": <br/>
  <input type='text' name='name' value='".$_REQUEST['name']."' /><br/>
<br/><tr>
      <td>".$lang['4'].":<br/></td>
      
      <td><select name='domain'>
            <option ";      
        if($_REQUEST['domain'] == 'no') {
        echo"SELECTED";
        }
      echo" value='no'>".$lang['34']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'co.uk') {
        echo"SELECTED";
        }
      echo" value='co.uk'>".$lang['26']."</option> 
         
      <option ";      
        if($_REQUEST['domain'] == 'com') {
        echo"SELECTED";
        }
      echo" value='com'>".$lang['27']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'ca') {
        echo"SELECTED";
        }
      echo" value='ca'>".$lang['28']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'com.au') {
        echo"SELECTED";
        }
      echo" value='com.au'>".$lang['29']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'fi') {
        echo"SELECTED";
        }
      echo" value='fi'>".$lang['30']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'fr') {
        echo"SELECTED";
        }
      echo" value='fr'>".$lang['31']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'it') {
        echo"SELECTED";
        }
      echo" value='it'>".$lang['32']."</option>
      
      <option ";      
        if($_REQUEST['domain'] == 'de') {
        echo"SELECTED";
        }
      echo" value='de'>".$lang['33']."</option>
      
      </select>
      </td>
    </tr>     <br/> <br/>
";
    
    } else {
    
echo" ".$lang['3'].":<br/> 
<input type='text' name='name' /><br/>
<br/><tr>
      <td>".$lang['4'].":<br/></td>
      <td><select name='domain'>
      <option value='no'>".$lang['34']."</option>
      <option value='co.uk'>".$lang['26']."</option>
      <option value='com'>".$lang['27']."</option>
      <option value='ca'>".$lang['28']."</option>
      <option value='com.au'>".$lang['29']."</option>
      <option value='fi'>".$lang['30']."</option>
      <option value='fr'>".$lang['31']."</option>
      <option value='it'>".$lang['32']."</option>
      <option value='de'>".$lang['33']."</option>
      </select>
      </td>
    </tr>     <br/> <br/>

"; 
}
echo"
    ".$lang['5'].":<br/>
    
<table width='110' height='90' border='0' align='center' cellpadding='8'>
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd0.png' /><br />
        <input type='radio' name='bodydir' id='bd0' value='0' />
  </div></td>
  
  <td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd1.png' /><br />
        <input type='radio' name='bodydir' id='bd1' value='1' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd2.png' /><br />
        <input type='radio' CHECKED name='bodydir' id='bd2' value='2' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd3.png' /><br />
        <input type='radio' name='bodydir' id='bd3' value='3' />
  </div></td>

  </table>
 
<table width='110' border='0' align='center' cellpadding='8'>
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd4.png' /><br />
        <input type='radio' name='bodydir' id='bd4' value='4' />
  </div></td>
  
  <td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd5.png' /><br />
        <input type='radio' name='bodydir' id='bd5' value='5' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd6.png' /><br />
        <input type='radio' name='bodydir' id='bd6' value='6' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/bd7.png' /><br />
        <input type='radio' name='bodydir' id='bd7' value='7' />
  </div></td>

  </table>
  
    <br/> 
    ".$lang['6'].":<br/>
<table width='110' border='0' align='center' cellpadding='8'>
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd0.png' /><br />
        <input type='radio' name='headdir' id='hd0' value='0' />
  </div></td>
  
  <td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd1.png' /><br />
        <input type='radio' name='headdir' id='hd1' value='1' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd2.png' /><br />
        <input type='radio' CHECKED name='headdir' id='hd2' value='2' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd3.png' /><br />
        <input type='radio' name='headdir' id='hd3' value='3' />
  </div></td>

  </table>
 
<table width='110' border='0' align='center' cellpadding='8'>
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd4.png' /><br />
        <input type='radio' name='headdir' id='hd4' value='4' />
  </div></td>
  
  <td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd5.png' /><br />
        <input type='radio' name='headdir' id='hd5' value='5' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd6.png' /><br />
        <input type='radio' name='headdir' id='hd6' value='6' />
  </div></td>
  
<td><div align='center'><img src='fancenter/tools/habbo_designer/images/hd7.png' /><br />
        <input type='radio' name='headdir' id='hd7' value='7' />
  </div></td>

  </table><br/> 
    <tr>
      <td>".$lang['7'].": <br/></td>
      <td><select name='mood'>
      <option value='std'>".$lang['8']."</option>
      <option value='sml'>".$lang['9']."</option>
      <option value='sad'>".$lang['10']."</option>
      <option value='agr'>".$lang['11']."</option>
      <option value='spk'>".$lang['12']."</option>
      <option value='srp'>".$lang['13']."</option>
      </select>
      </td>
    </tr><br/> <br/>
    <tr>
      <td> ".$lang['25'].": <br/></td>
      <td><select name='action'>
      <option value='std'>".$lang['8']."</option>
      <option value='wlk'>".$lang['14']."</option>
      <option value='sit'>".$lang['15']."</option>
      <option value='wav'>".$lang['16']."</option>
      <option value='lay'>".$lang['17']."</option>
      <option value='drk=1'>Drikker</option>
	<option value='crr=1'>Holde: Brus</option>
	<option value='crr=2'>Holde: Gulrot</option>
	<option value='crr=3'>Holde: Iskrem</option>
	<option value='crr=5'>Holde: Cola</option>
	<option value='crr=6'>Holde: Kaffe</option>
	<option value='crr=9'>Holde: Kj&#230;rlighetsdrikke</option>
	<option value='crr=33'>Holde: Calippo</option>
	<option value='crr=42'>Holde: Japansk te</option>
	<option value='crr=43'>Holde: R&#248;d brus</option>
	<option value='crr=44'>Holde: Gr&#248;nn brus</option>
	<option value='crr=667'>Holde: Gammel Habbocola</option>
	<option value='drk=2'>Spise: Gulrot</option>
	<option value='drk=3'>Spise: Iskrem</option>
	<option value='drk=33'>Spise: Calippo</option>
	<option value='drk=5'>Drikke: Cola</option>
	<option value='drk=6'>Drikke: Kaffe</option>
	<option value='drk=9'>Drikke: Kj&#230;rlighetsdrikke</option>
	<option value='drk=42'>Drikke: Japansk te</option>
	<option value='drk=43'>Drikke: R&#248;d brus</option>
	<option value='drk=44'>Drikke: Gr&#248;nn brus</option>
	<option value='drk=667'>Drikke: Gammel Habbocola</option> 
      </select>
      </td>
    </tr><br/> <br/>    <tr>
      <td> ".$lang['18'].": <br/></td>
      <td><select name='size'>
      <option value='b'>".$lang['19']."</option>
      <option value='s'>".$lang['20']."</option>
      </select>
      </td>
    </tr> <br/> <br/>
<input type='submit' value='".$lang['21']."!'/> <input type='reset' value='".$lang['22']."'/>
</form>".$lang['24']."
<div id='bot'></div>
</div></center>
";

?>