<header class="top_header">
    <?php require ('view/components/header.php'); ?>
</header>


    <section class="body">
        <div class="reg_form">
            <h2>Connectez vous</h2>   
            <div class="form">
                <form action="" method="post">

                    <div class="input_field">
                        <label for="log_mail">Indiquez votre mail</label>
                        <input type="text" id="log_mail" name="log_mail" placeholder="JognDoe@gmail.com" required> <br>
                    </div>
                    <div class="input_field">
                        <label for="log_pass">Un mot de passe</label>
                        <input type="text" id="log_pass" name="log_pass" placeholder="FLQBbEDXBwS7z9P" required> <br>
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" name="cookie" id="cookie" checked> <br>
                        <label for="cookie">Se souvenir de moi</label>
                    </div>
                
                    <div class="button-log">
                        <input type="submit" name="log_button" value="Connectez mon compte">
                    </div>

                </form>
            </div>
        </div>
    </section>


<footer>
    <?php require ('view/components/footer.php'); ?>
</footer>
