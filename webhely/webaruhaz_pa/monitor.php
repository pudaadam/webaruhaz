
<!DOCTYPE html>
<html lang="hu">
<head>
  <?php include 'head.php'; ?>
</head>
<body>

<?php include 'fejresz.php'; ?>

<?php include 'menu.php'; ?>




<div class="container" style="margin-top:30px">



<?php  include 'kapcsolat.php'; ?>

<?php

// Create connection --------------------------------------------------------------
$kapcsolat = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$kapcsolat) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "";


$sql = "SELECT * FROM termek Where kategoria = 'monitor'";
$eredmeny = mysqli_query($kapcsolat, $sql);


// A lekérdezés kiíratása
print("<H2>A KANDOIKT webáruház tartalma - Monitor</H2>");

print("<table class=\"table table-condensed table table-striped\">
	<thead>
		<tr>");
// Az eredménytábla mezőneveinek kiíratása
		print("<th style= \"width: 2%\">Sorszám</th>");
		print("<th style= \"width: 2%\">Kategória</th>");
		print("<th style= \"width: 2%\">Termék neve</th>");
		print("<th style= \"width: 2%\">Ár</th>");
		print("<th style= \"width: 2%\">Foto</th>");
		//print("<th style= \"width: 2%\">foto_nk</th>");
		print("<th style= \"width: 2%\">Készlet</th>");	
		print("<th style= \"width: 2%\">Vásárlás</th>");			
print("</tr>
	</thead>");
	
// Az eredménytábla tartalmának kiíratása
	
print("<tbody>");
while ($sor = mysqli_fetch_array($eredmeny,MYSQLI_ASSOC))
	{
		$termek_szamlalo++;
		print ("<tr>");
		$mezo_szamlalo=0;
		foreach ($sor as $i=>$ertek)
		{
			$mezo_szamlalo++;
			if ($mezo_szamlalo == 1)
				{print("<td>$termek_szamlalo</td>"); $termek_id=$ertek; $termek_id_nagykephez=$ertek;}
			if ($mezo_szamlalo == 2) 
					print("<td>$ertek</td>");
				if ($mezo_szamlalo == 3) 
					print("<td>$ertek</td>");
			if ($mezo_szamlalo == 4)
				print("<td>$ertek Ft</td>");
			if ($mezo_szamlalo == 5)
				print("<td><a href=\"fotok/$sor[foto_nk]\" target=\"_blank\"><img src=\"fotok/$ertek\" alt=\"\" height=\"200\" widht=\"300\" style=\"max-width=\"300\"\"></a></td>");
			//if ($mezo_szamlalo == 6)
				//print("<td><a href=\"fotok/$ertek\" target=\"_blank\">nagykép</a></td>");
			if ($mezo_szamlalo == 7) 
				print("<td>$ertek db</td>");
						
		}
		print("<td>
						<form name=\"form1\" method=\"post\" action=\"kosar_vasarlas.php\">
						<input name=\"termek_id\" type=\"hidden\" id=\"termek_id\" value=\"$termek_id\">
						Kosárba<br>
						<input type=\"image\" name=\"kosar_kepe\" src=\"kosar.png\" alt=\"\" height=\"50\" widht=\"50\">
						
						</form>
					   </td>");	
		print("</tr>");
	}		
print("</table>\n");

mysqli_close($kapcsolat);

?>


</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>
	  Készítette: Puda Ádám
	  <br>
	  2021
  </p>
</div>

</body>
</html>
