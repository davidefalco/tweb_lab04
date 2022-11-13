<?php include "top.html"; ?>

<div>
     <form method = "get" action="matches-submit.php">
          <fieldset>
               <legend>Returining user:</legend>

               <label>Name:</label>
               <input type="text" id="fname" name="name"><br><br>
               
               <input type="submit" value="View my matches">
          </fieldset>
     </form>
</div>

<?php include "bottom.html"; ?>