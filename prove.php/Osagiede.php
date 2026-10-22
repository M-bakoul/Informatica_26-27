<!DOCTYPE html>
<html>
	<head>
		<title>Pagina di prova di PHP</title>
	</head>
	<body>

	<?php
		//phpinfo();
	
		$var; //alloco una variabile vuota.
	
		$var=19; //inserisco un numero intero nella variable.
		echo($var.'<br />');	//stampo il valore della variabile e concateno l'andata a capo in HTML.
		//var_dump($var);
	
		$var=$var/2;
		echo($var.'<br />');
		//var_dump($var);
	
		$var="Hello Butei";
		echo($var.'<br />');
		//var_dump($var);
	
		$var=10;
		if($var<12)
			echo('variabile minore di 12<br />');
		else
			echo('variabile maggiore o uguale di 12<br />');
		echo('<br />');
	
		$var=0;
		while($var<=10){
			echo($vr.' - ');
			$var++;
		}
		echo('<br />')
	?>
	</body>
</html>