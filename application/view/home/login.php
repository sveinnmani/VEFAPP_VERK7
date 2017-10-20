<div class="container">
    
    <h1>Login</h1>
    <form action="<?php echo URL;?>home/login" method="post">

        <label for="user">Notendanafn:</label>
        <input id="user" name="username" type="text"><br>

        <label for="pass">Lykilorð:</label>
        <input id="pass" name="password" type="password"><br>

        <input name="innskra" type="submit" value="Innskrá">
        
    </form>
</div>
