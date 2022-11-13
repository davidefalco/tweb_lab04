<?php include "top.html"; ?>

<?php
	if($_SERVER["REQUEST_METHOD"] == "GET"){

	}else if($_SERVER["REQUEST_METHOD"] == "POST"){
		?><h6>Thank you!</h6>
		<p>Welcome to NerdLuv, <?php echo $_POST["fullName"]; ?>!</p>
		<p>Now <a href="matches.php">you can login to see your matches!</a></p><?php
	}

	$singles_list = fopen("singles.txt", "a") or die("Unable to open file!");

	$single_arr[0] = $_POST["fullName"];
	$single_arr[1] = $_POST["gender"];
	$single_arr[2] = $_POST["userAge"];
	$single_arr[3] = $_POST["pType"];
	$single_arr[4] = $_POST["fav_os"];
	$single_arr[5] = $_POST["fromAge"];
	$single_arr[6] = $_POST["toAge"];
	$i = 0;

	$single_listed = implode(",", $single_arr);

	fwrite($singles_list, "\n");	
	fwrite($singles_list, $single_listed);

	fclose($singles_list);

/* $_SERVER è una variabile globale (array)
	REQUEST_METHOD è una costante che indica l'indiche del campo relativo al metodo richiesto	
*/

?>

<?php include "bottom.html"; ?>