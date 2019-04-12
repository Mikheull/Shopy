<tbody>
    <tr>
        <td style="width: 5%"><?= $r['ID'] ;?></td>
        <td style="width: 50%"><?= $r['name'] ;?></td>
        <td style="width: 20%"><?= $r['category'] ;?></td>
        <td style="width: 5%"><?= $r['quantity'] ;?></td>
        <td style="width: 5%"><?= $r['price_ttc'] ;?></td>
        <td style="width: 5%"><?= $r['parent'] ;?></td>
        <td style="width: 5%"><?= $r['enable'] ;?></td>
        <td style="width: 5%"> <a href="?query=shop&c=products&f=edit&product=<?= $r['ID'] ;?>" title="Editer le produit <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>