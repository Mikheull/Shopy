<tbody>
    <tr>
        <td style="width: 5%"><?= $r['ID'] ;?></td>
        <td style="width: 10%"> <div class="image"> <img src="../content/uploads/icons/<?= $shop -> getCategoryType($r['ID']) ;?>.svg" alt=""> </div> </td>
        <td style="width: 70%"><?= $r['name'] ;?></td>
        <td style="width: 5%"><?= $r['parent'] ;?></td>
        <td style="width: 5%"><?= $r['enable'] ;?></td>
        <td style="width: 5%"> <a href="?query=shop&c=category&f=edit&category=<?= $r['ID'] ;?>" title="Editer la catégorie <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>