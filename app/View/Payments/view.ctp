<table style="text-align: left; width: 100%;" border="1" cellpadding="2"cellspacing="2">
    <tbody>
        <tr>
            <td style="vertical-align: top; text-align: center;">Cantidad de Meses<br></td>
            <td style="vertical-align: top; text-align: center;">Valor Mensualidad<br></td>
        </tr>
        <?php foreach ($paymentsData as $paymentsRow):?>
            <tr> 
            <td style="vertical-align: top; text-align: center;"><?php echo $paymentsRow['Payment']['amount_month'] ;?><br></td>
            <td style="vertical-align: top; text-align: center;"><?php echo $paymentsRow['Payment']['value_month'] ;?><br></td>
            <td style="vertical-align: top; text-align: center;"><?php echo $this->Html->link('Editar', '/Payments/edit/' . $paymentsRow['Payment']['id']); ?><br></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
