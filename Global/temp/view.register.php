<?php
//Rwgister form
echo "<form action='signup.php' method='POST'>
Username: <input type='text' name='user_name'><br /><br />
Passowrd: <input type='password' name='user_pass'><br /> <br />
Confirm password: <input type='password' name='user_repass'><br /><br />
Email: <input type='text' name='user_mail'><br /><br />
Avatar: <input type='text' name='user_avatar' value='profiles/avatars/noava.png'><br /><br />
<input type='submit' name='signup' value='Sign Up'><br /><br />";
