<table style="text-align: left; width: 100%;" border="1" cellpadding="2"cellspacing="2">
	<tbody>
		<tr>
			<td style="vertical-align: top; text-align: center;"> Tipo Documento<br></td>
			<td style="vertical-align: top; text-align: center;">Número Documento<br></td>
			<td style="vertical-align: top; text-align: center;">Nombre<br></td>
			<td style="vertical-align: top; text-align: center;">Apellido<br></td>
		</tr>
		<?php foreach ($clientsData as $clientRow):?>
			<tr> 
				<td style="vertical-align: top; text-align: center;"><?php echo $clientRow['Client']['type_document'] ;?><br></td>
				<td style="vertical-align: top; text-align: center;"><?php echo $clientRow['Client']['number_document'] ;?><br></td>
				<td style="vertical-align: top; text-align: center;"><?php echo $clientRow['Client']['name'] ;?><br></td>
				<td style="vertical-align: top; text-align: center;"><?php echo $clientRow['Client']['lastname'] ;?><br></td>
				<td style="vertical-align: top; text-align: center;"><?php echo $this->Html->link('Editar', '/Clients/edit/' . $clientRow['Client']['id']); ?><br></td>
			</tr>
	<?php endforeach;?>
	</tbody>
</table>