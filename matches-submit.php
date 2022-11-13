<?php
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$user_name = $_GET["name"];
		$user_info = userExist($user_name);
		if($user_info != -1){
			$partners = findUserMatches($user_info);
			if(count($partners) > 0){
				$user_info_splitted = explode(",", $user_info);
				// crea pagina con partners
				if($user_info_splitted[1] == 'M')
					$sex_seek = "woman.png";
				else $sex_seek = "man.png"
				?>

				<?php include "top.html"; 

				foreach ($partners as $partner_info) {
					$partner = explode(",", $partner_info);
					?>
					<div class = "match">
						<img src="<?= $sex_seek; ?>" alt="partner"/>
						<p><?=$partner[0]; ?></p>
						<ul>
							<li>
								gender: <?= $partner[1];?>
							</li>
							<li>
								age: <?= $partner[2];?>
							</li>
							<li>
								type: <?= $partner[3];?>
							</li>
							<li>
								os: <?= $partner[4];?>
							</li>
						</ul>
					</div>

				<?php
				
				}

				?>

				

				<?php include "bottom.html"; 
			}else{
				include("top.html");
				?>

				<div>
					<p id="no_match">NO MATCHES, please check out in another moment! </p>
				</div>

				<?php
				include("bottom.html");
			}

		}else{			
			include "top.html"; ?>

			<div>
			     <form method = "get" action="matches-submit.php">
			          <fieldset>
			               <legend>ERROR! USER DOES NOT EXIST!</legend>

			               <label>Name:</label>
			               <input type="text" id="fname" name="name"><br><br>
			               
			               <input type="submit" value="View my matches">
			          </fieldset>
			     </form>
			</div>

			<?php include "bottom.html"; ?>

			<?php
			}

	}else if($_SERVER["REQUEST_METHOD"] == "POST"){

	}
?>

<?php
	function userExist($user_name){
	    $singles_list = fopen("singles.txt", "r") or die("Unable to open file!");

	    while(($line = fgets($singles_list)) !== false) {
        	$splitted_info = explode(",", $line);
        	if($splitted_info[0] == $user_name)
        		return $line;
    	}

	    fclose($singles_list);
		return -1;
	}

	function findUserMatches($user_info){
		$user_splitted = explode(",", $user_info);
		
		$user_name = $user_splitted[0];
		$user_sex = $user_splitted[1];
		$user_age = $user_splitted[2];
		$user_type = $user_splitted[3];
		$user_os = $user_splitted[4]; // same
		$user_age_from = $user_splitted[5]; // same
		$user_age_to = $user_splitted[6]; // same

		$singles_list = fopen("singles.txt", "r") or die("Unable to open file!");
		$partners = array();

		while(($line = fgets($singles_list)) !== false) {
        	$splitted_info = explode(",", $line);
        	if($splitted_info[1] !== $user_sex && $splitted_info[0] !== $user_name){ 
        	// Se il sesso è diverso e il nome non è quello dell'utente che cerca
        		if($splitted_info[2] <= $user_age_to && $splitted_info[2] >= $user_age_from){ // Se l'età cercata corrisponde
        			$partner_type = $splitted_info[3];

        			for($i = 0; $i < 4; $i++){
        				if($user_type[$i] == $partner_type[$i]) // Se una lettera del tipo di carattere corrisponde
        					break;
        			}

        			if($i < 4){
        				if($splitted_info[4] == $user_os){ // Se l'os corrisponde
        					$age_from_partner = $splitted_info[5];
        					$age_to_partner = $splitted_info[6];
        					if($user_age <= $age_to_partner && $user_age >= $user_age_from){ 
        					// Se l'età dell'utente che cerca è nei limiti del partner trovato
        						array_push($partners, $line); 
        					}
        				}
        			}
        		}
        	}
    	}
		fclose($singles_list);
    	return $partners;
	}

?>