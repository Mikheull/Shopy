<section class="wrapper_content">
    
    <div class="head">
        <h2>Les rôles</h2>
        <div class="button_add"> <a href="?query=users&c=roles&f=add" class="btn"><i class="fas fa-plus"></i> Nouveau rôle</a> </div>
    </div>


    <div class="data_content">
        <table>
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 80%">Nom</th>
                    <th style="width: 5%">Parent</th>
                    <th style="width: 5%">Actif</th>
                    <th style="width: 5%"></th>
                </tr>
            </thead>

            <?php
            foreach($user -> getAllRoles() as $r){
                ?> 
                <tbody>
                    <tr>
                        <td style="width: 5%"><?= $r['ID'] ;?></td>
                        <td style="width: 80%"><?= $r['name'] ;?></td>
                        <td style="width: 5%"><?= $r['parent'] ;?></td>
                        <td style="width: 5%"><?= $r['enable'] ;?></td>
                        <td style="width: 5%"> <a href="?query=users&c=roles&f=edit&role=<?= $r['ID'] ;?>" title="Editer le role <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>
    </div>

</section>
