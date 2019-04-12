<tbody>
    <tr>
        <td style="width: 5%"><?= $r['ID'] ;?></td>
        <td style="width: 10%"><?= $r['first_name'] ;?></td>
        <td style="width: 10%"><?= $r['name'] ;?></td>
        <td style="width: 20%"><?= $r['mail'] ;?></td>
        <td style="width: 5%"><?= $r['role'] ;?></td>
        <td style="width: 20%"><?= $r['token'] ;?></td>
        <td style="width: 10%"><?= $r['date_inscription'] ;?></td>
        <td style="width: 10%"><?= $r['date_last-visit'] ;?></td>
        <td style="width: 5%"><?= $r['enable'] ;?></td>
        <td style="width: 5%"> <a href="?query=users&c=clients&f=edit&client=<?= $r['ID'] ;?>" title="Editer l'utilisateur <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>