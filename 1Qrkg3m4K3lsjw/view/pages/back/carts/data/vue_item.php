<tbody>
    <tr>
        <td style="width: 5%"><?= $r['ID'] ;?></td>
        <td style="width: 30%"><?= $r['ref'] ;?></td>
        <td style="width: 30%"><?= $r['link_client'] ;?></td>
        <td style="width: 25%"><?= $r['date_begin'] ;?></td>
        <td style="width: 5%"><?= $r['enable'] ;?></td>
        <td style="width: 5%"> <a href="?query=carts&c=edit&cart=<?= $r['ID'] ;?>" title="Editer le panier <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>