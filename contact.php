
			<?php
                if(isset($_POST['enviar'])) {
                    $Message = "";
                    $Captcha = (string) $_POST["CAPTCHA_CODE"];
                    
                    if($_POST['name'] == '') {
                        echo "<p class='alert alert-error'>No has ingresado tu nombre</p>";
                    
                    }elseif($_POST['email'] == '') {
                        echo "<p class='alert alert-error'>No has ingresado tu email</p>";
                        
                    }elseif($_POST['subject'] == '') {
                        echo "<p class='alert alert-error'>No has ingresado tu numero de telefono</p>";
                            
                    }elseif($_POST['message'] == '') {
                        echo "<p class='alert alert-error'>No has ingresado ningun mensaje</p>";
                        
                    }elseif(sha1($Captcha) != $_SESSION["CAPTCHA_CODE"]) {
                        $Message = "<p class='alert alert-error'>El c&oacute;digo de validaci&oacute;n no ha sido ingresado o es incorrecto</p>";
            
                }else{
                $cuerpo = "Email from YourFlightLog.com\n";
                $cuerpo .= "Name: " . $_POST["name"] . "\n";
                $cuerpo .= "Email: " . $_POST["email"] . "\n";
                $cuerpo .= "Subject: " . $_POST["subject"] . "\n";
                $cuerpo .= "Message: " . $_POST["mesagge"] . "\n";
                
                    mail("tomas@yourflightlog.com","Email from YourFlightLog.com",$cuerpo);
                    echo "<p class='alert alert-success'>El mensaje se ha enviado correctamente. Me pondr&eacute; contacto a la brevedad contigo</p>";
                }
                }
                if(!empty($Message)) {
                    echo "$Message";
                }
            ?>

		<form class="form-horizontal" method="post" action="contact.php">
            	<fieldset>
                	<div class="control-group">
                        <label class="control-label">Name</label>
                            <div class="controls"><input type="text" name="name" class="input-xlarge" /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email</label>
                            <div class="controls"><input type="text" name="email" class="input-xlarge" /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Subject</label>
                            <div class="controls"><input type="text" name="subject" class="input-xlarge" /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Captcha</label>
                            <div class="controls"><img src="captcha.php" alt="captcha" /> <input type="text" name="CAPTCHA_CODE" class="input-medium" /></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Message</label>
                            <div class="controls"><textarea rows="6" name="message" class="input-xlarge"></textarea></div>
                    </div>
                    <div class="control-group">
                        <div class="controls"><button name="enviar" type="submit" class="btn btn-success">Send Email</button></div>
                    </div>				
            	</fieldset>
		</form>