<tbody>
    <tr>
        <td style="width: 5%"><?= $r['ID'] ;?></td>
        <td style="width: 20%"><?= $r['reference'] ;?></td>
        <td style="width: 20%"><?= $r['name'] ;?></td>
        <td style="width: 20%"><?= $r['url'] ;?></td>
        <td style="width: 10%"><?= $r['update_date'] ;?></td>
        <td style="width: 10%"><?= $r['author'] ;?></td>
        <td style="width: 5%"><?= $r['views'] ;?></td>
        <td style="width: 5%"><?= $r['enable'] ;?></td>
        <td style="width: 5%"> <a href="?query=help&c=edit&helper=<?= $r['ID'] ;?>" title="Editer la page d'aide <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>

