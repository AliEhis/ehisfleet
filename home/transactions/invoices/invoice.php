<table width="100%" >
  <tr>
    <th colspan="6" bgcolor="#000000" scope="col">INVOICE</th>
  </tr>
  <tr>
    <td width="12%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><h1><?=$showCompany['coy_name']?></h1></td>
  </tr>
  <tr>
    <td colspan="2" rowspan="3" valign="top">
    <?=$showCompany['address']?><br />
    <?=$showCompany['phone']?>

    </td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td width="24%">Invoice No</td>
    <td width="12%"><?=makeNo()?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>Date</td>
    <td><?=$date?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>Amount Due</td>
    <td><?=$amount?></td>
  </tr>
  <tr>
    <td colspan="2"> <?= $client ?> </td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Info</td>
    <td>Cargo</td>
    <td width="15%">Rate</td>
    <td width="14%">Trucks</td>
    <td>Trucks</td>
    <td>Trips</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Total Tax</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
