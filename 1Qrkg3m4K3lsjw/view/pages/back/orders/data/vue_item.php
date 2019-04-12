<tbody>
    <tr>
        <td style="width: 5%"><?= $r['ID'] ;?></td>
        <td style="width: 20%"><?= $r['ref'] ;?></td>
        <td style="width: 20%"><?= $r['link_client'] ;?></td>
        <td style="width: 20%"><?= $r['date_begin'] ;?></td>
        <td style="width: 20%"><?= $r['date_end'] ;?></td>
        <td style="width: 5%"><?= $r['status'] ;?></td>
        <td style="width: 5%"><?= $r['enable'] ;?></td>
        <td style="width: 5%"> <a href="?query=orders&c=edit&order=<?= $r['ID'] ;?>" title="Editer la commandes <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>