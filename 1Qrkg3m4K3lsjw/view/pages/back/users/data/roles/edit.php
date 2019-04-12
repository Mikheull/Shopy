<section class="wrapper_content">
    
    <div class="head">
        <h2>Les rôles > Edition</h2>
        <div class="button_add"> <a href="?query=users&c=roles" class="btn_cancel"> Cancel</a> </div>
    </div>


    <div class="data_content">
        <?php
            $id = $_GET['role'];
            $roles = $user -> getRole($id, '*');
            $types = $user -> getAllPermissionsType();

            if($id !== '1'){
               
                foreach($types as $type){
                    ?>
                    <div class="role_group">
                        <div class="title">
                            <h3>Type : <?= $type ;?></h3>
                        </div>

                        <div class="container">
                        <?php
                        foreach($user -> getAllPermissionsPerType($type) as $perm){
                            $check = "";
                            if($user -> RolehasPermission($id, $perm['permission']) == true){ $check = "checked"; }
                            ?>
                                <form method="post">
                                    <div class="item">
                                        <input type="hidden" name="role" value="<?= $id?>">
                                        <div class="perm"><?= $perm['permission'] ;?></div>
                                        <div class="statut">
                                            <div class="boolean">
                                                <div class="lb-OnOff check">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" class="onoffswitch-checkbox switchPerm" id="<?= $perm['ID'] ;?>" <?= $check ;?>>
                                                        <label class="onoffswitch-label" for="<?= $perm['ID'] ;?>"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <?php
                }

            }else{
                echo "Vous ne pouvez pas modifier les permissions de l'administrateur !";
            }
        ?>
    </div>
    <div id="hidden"></div>

</section>




<script>
    $( ".switchPerm" ).change(function() {
        var id = this.id ;
        var role = $(" input[name='role'] ").val() ;

        $.ajax({
            url: 'controller/ajax/switchPermission.php',
            type: 'POST',
            data: {id: id, role:role},
            success:function(data){
                $("#hidden").html(data);
            }
        });
    });
</script>