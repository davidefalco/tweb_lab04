<?php include "top.html"; ?>

<!-- MFN0634, Lab 04 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
     <form method = "post" action="signup-submit.php">
          <fieldset>
               <legend>New User Sign Up:</legend>

               <label>Full name:</label>
               <input type="text" id="fname" name="fullName"><br><br>
               
               <label>Gender:</label>
               <input type="radio" id="rgeneder_male" name="gender" value="M"> Male
               <input type="radio" id="rgeneder_female" name="gender" value="F"> Female <br><br>
               
               <label>Age:</label>
               <input type="text" id="age" name="userAge"><br><br>

               <label>Personality type:</label>
               <input type="text" id="p_type" name="pType">
               (<a href="https://www.16personalities.com/it/test-della-personalita-gratis">Don't know your type?</a>)<br><br>
               
               <label>Favorite OS:</label>
               <select name="fav_os">
                    <option>Ubuntu</option>
                    <option>Windows</option>
                    <option>Arch linux</option>
                    <option>MacOS</option>
               </select><br><br>

               <label>Seeking age:</label>
               <input type="text" id="from" name="fromAge"> to <input type="text" id="to" name="toAge"><br><br>
               
               <input type="submit" value="Submit">
          </fieldset>
     </form>
</div>

<?php include "bottom.html"; ?>
