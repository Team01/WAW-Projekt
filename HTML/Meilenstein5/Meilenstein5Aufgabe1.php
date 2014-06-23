<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>

<?php
   
    /**
    * Datei Name, wo die Daten gespeichert werden
        sollen
    */
    /**$dateiname = 'conit.txt'; */
	
	switch ($_POST['messe']){
		case 'CeBIT':
			$dateiname = 'cebit.txt';
			break;
		case 'ConHIT':
			$dateiname = 'conhit.txt';
			break;
		case 'WebTech':
			$dateiname = 'webtech.txt';
			break;
		default:
			//nothing
	}
	
    /**
    * Prüfen ob die Variable ein Wert zugewiesen
        wurde. Ansonsten werden diese Variablen
        deklariert.
    */
    if (!isset($_POST['vorname'])) $_POST['vorname'] =
        '';
    if (!isset($_POST['nachname'])) $_POST['nachname']
        = '';
	if (!isset($_POST['matrikelnr'])) $_POST['matrikelnr'] =
        '';
	if (!isset($_POST['handy'])) $_POST['handy'] =
        '';
    if (!isset($_POST['email'])) $_POST['email'] = '';
	if (!isset($_POST['email'])) $_POST['studiengang'] = '';
    if (!isset($_POST['start'])) $_POST['start'] =
        '';
    $meldung = '';
    /**
    * Prüfen der Variable $_POST['start'] ob diese
        ein Wert hat.
    */
    if ($_POST['start'] == 'Anmelden') {
        /**
        * Zeile aufbauen, die in die TXT-Datei am Ende
            geschrieben werden soll
        */
        $inhalt =
            $_POST['vorname'].' '.$_POST['nachname'].' '.','.' '.$_POST['matrikelnr'].' '.','.' '.$_POST['email'].' '.','.' '.$_POST['handy'].' '.','
            .' '.$_POST['studiengang'].';'."";
        /**
        * Datei öffnen und den Dateizeiger auf das
            Ende der TXT Datei legen, wenn die Datei
            noch nicht vorhanden ist wird versucht
            diese anzulegen. Wichtig ist, dass die
            Skriptdatei die Rechte zum anlegen einer
            Datei hat.
        */
        $handle = @fopen($dateiname, "ab+");
        /**
        * Schreiben der Zeile, in der .txt Datei
        */
        fwrite($handle, $inhalt."\r\n");
        /**
        * Datei wieder schließen
        */
        fclose ($handle);
        /**
        * Prüfen ob die .txt Datei existiert
        */
        if (file_exists($dateiname) == true) {
            /**
            * Die schreib Rechte ändern bei der .txt
                Datei, damit das nächste mal diese
                beschrieben werden kann.
            */
            @chmod ($dateiname, 0757);
        }
        /**
        *  Ausgabemeldung erstellen
        */
        $meldung = '<font color="green">Daten wurden
            gespeichert!</font>';
         
    }
    /**
    * Prüfen ob eine Ausgabemeldung in der Variable
        $meldung hinterlegt wurde, wenn eine
        Ausgabemeldung vorhanden ist wird diese per
        Echo ausgegeben.
    */
    if ($meldung != '') echo $meldung;
?>




<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Formular</title>
<link rel="stylesheet" type="text/css" href="../../CSS/Meilenstein2/Aufgabe1.css">
<script type="text/javascript">
function checkForm() {
	var strFehler='';

	function validName(vorname) {
	var strRegvorname = "^([a-zA-Z])+$";
	var regex = new RegExp(strRegvorname);
	return(regex.test(vorname));
	}
	if (!validName(document.forms[0].vorname.value)) {
	strFehler += "Vorname ist Falsch\n";
	document.Formular.vorname.focus();
	}

	if (document.forms[0].vorname.value==""){
	strFehler += "Feld Vorname ist leer\n";
	document.Formular.vorname.focus();
	}
	function validnachname(nachname) {
	var strRegnachname = "^([a-zA-Z])+$";
	var regex = new RegExp(strRegnachname);
	return(regex.test(nachname));
	}
	if (!validName(document.forms[0].nachname.value)) {
	strFehler += "Nachname ist Falsch\n";
	document.Formular.vorname.focus();
	}

	if (document.forms[0].nachname.value=="")
	{
	strFehler += "Feld Nachname ist leer\n"; 

	document.Formular.nachname.focus();
	}
  
	if (document.forms[0].matrikelnr.value==""){

	strFehler += "Feld Matrikelnummer ist leer\n";

	document.Formular.matrikelnr.focus();}

	if (isNaN(document.forms[0].matrikelnr.value)) {
	strFehler += "Bitte im Feld Matrikelnummer nur Zahlen eingeben bsp: 1123456\n";

	document.Formular.matrikelnr.focus();		
	}

	if (document.forms[0].handy.value=="") {

	strFehler += "Feld Handy ist leer\n";

	document.Formular.handy.focus();
	}

	if (isNaN(document.forms[0].handy.value)) {
	strFehler += "Bitte im Feld Handy nur Zahlen eingeben bsp: 0176556301\n";

	document.Formular.handy.focus();

	}
  
	if (!validEmail(document.forms[0].email.value)) {
	strFehler += "E-Mail-Adresse ist fehlerhaft\n";
    
	document.Formular.email.focus();
  }
  if (strFehler.length>0) {
  alert(unescape("Einige Eingaben sind fehlerhaft. Bitte %FCberpr%FCfen Sie ihre Eingaben : \n\n"+strFehler));
  return(false);

  }
}

function validEmail(email) {

  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";

  var regex = new RegExp(strReg);

  return(regex.test(email));
}

</script>

</head>
 <body>
<span id=Logo><img src="../../Bilder/LogoTeam01.png" alt="Logo" border="0" height="20px" width="70px"></span>
    <div id=Formular>	

     <h1>Anmeldung</h1>
	 <h2>Hier k&ouml;nnt ihr euch f&uuml;r eine Messe eurer Wahl anmelden</h2>  	   	 
  	<form name="Formular" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" onsubmit='return checkForm()' method="post">
	<table border="0" cellpadding="0" cellspacing="4">
		<tr>
      <td align="left">Vorname:</td>
      <td><input id="vorname" name="vorname" type="text" size="25" maxlength="25"  value=""></td>
    </tr>
    <tr>
      <td align="left">Nachname:</td>
      <td><input id="nachname" name="nachname" type="text" size="25" maxlength="25"  value="">
    </tr>
	<tr>
      <td align="left">Matrikelnummer:</td>
      <td><input id="matrikelnr" name="matrikelnr" type="text" size="25" maxlength="7" value="" >
    </tr>
	<tr>
      <td align="left">E-Mail Adresse:</td>
      <td><input id="email" name="email" type="text" size="25" maxlength="25"  value=""></td>
    </tr>
	<tr>
      <td align="left">Handynummer:</td>
      <td><input id="handy" name="handy" type="text" size="25" maxlength="12" value=""></td>
    </tr>
	<tr>
      <td align="left">Studiengang:</td>
      <td><select id="studiengang" name="studiengang">
  	   	   	 <option selected="selected">IB</option>
  	   	   	 <option>UIB</option>
			 <option>IMB</option>
  	     </select></td>
    </tr>
	<tr>
      <td align="left">Messe:</td>
      <td><input type="radio" name="messe" value="CeBIT" checked="checked"> CeBIT<br> 
            <input type="radio" name="messe" value="ConHIT"> ConHIT<br>
            <input type="radio" name="messe" value="WebTech"> WebTech</td>
    </tr>
  </table>
  <input type="submit" name="start" value="Anmelden"> 
</form>  
    </div>
<div id=MesseInfos>
<h3>Messe Infos</h3>
<h2>Bitte auf eine Messe eurer Wahl klicken um weitere Info's zu bekommen</h2>

<a href="../../HTML/Meilenstein2/Cebit.html">CeBit</a> <br>
 <a href="../../HTML/Meilenstein2/Conhit.html">ConIT</a> <br>
  <a href="../../HTML/Meilenstein2/Webtechcon.html">WebTech Con</a><br>
  <a href="../../HTML/Meilenstein3/detail.html">Details</a><br>

</div>

    </body>
</html>
