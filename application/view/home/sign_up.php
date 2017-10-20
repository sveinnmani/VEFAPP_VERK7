<div class="container">
    <h1>Skráning</h1>
    
    <form action="<?php echo URL;?>Home/signup" method="post">
        <label for="nafn">Nafn:</label>
        <input id="nafn" name="nafn" type="text" required><br><br>
        
        <label for="username">Notendanafn:</label>
        <input id="username" name="username" type="text"><br><br>
                            
        <label for="pass">Lykilorð:</label>
        <input id="pass" name="password" type="password" required><br><br>
                        
        <label for="confpass" >Staðfesta Lykilorð:</label>
        <input id="confpass" name="confpass" type="password" required><br><br>

        <input name="nyskra" type="submit" value="Nýskrá">
    </form>
</div>
