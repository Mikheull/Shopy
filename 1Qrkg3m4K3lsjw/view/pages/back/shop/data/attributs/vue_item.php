<tbody>
    <tr>
        <td style="width: 5%"> <?= $r['ID'] ;?> </td>
        <td style="width: 15%"> <?= $r['type'] ;?> </td>
        <td style="width: 70%"> <?= $r['name'] ;?> </td>
        <td style="width: 5%"> <?= $r['enable'] ;?> </td>
        <td style="width: 5%"> <a href="?query=shop&c=attributs&f=edit&attr=<?= $r['ID'] ;?>" title="Editer l'attributs <?= $r['name'] ;?>"> <i class="fas fa-ellipsis-h"> </i> </a> </td>
    </tr>
</tbody>