<table style="text-align: left; width: 100%;" border="1" cellpadding="2"cellspacing="2">
	<tbody>
		<tr>
			<td style="vertical-align: top; text-align: center;">Nombre Propietario<br></td>
			<td style="vertical-align: top; text-align: center;">Apellido Propietario<br></td>
			<td style="vertical-align: top; text-align: center;">Placa<br></td>
			<td style="vertical-align: top; text-align: center;">Modelo<br></td>
		</tr>
		<?php foreach ($vehiclesData as $vehicleRow):?>
			<tr> 
				<td style="vertical-align: top; text-align: center;"><?php echo $vehicleRow['Client']['name'] ;?><br></td>
				<td style="vertical-align: top; text-align: center;"><?php echo $vehicleRow['Client']['lastname'] ;?><br></td>
				<?php foreach ($vehicleRow['Vehicle'] as $vehicleDescription):?>
					<td style="vertical-align: top; text-align: center;"><?php echo $vehicleDescription['plate_vehicle'] ;?><br></td>
					<td style="vertical-align: top; text-align: center;"><?php echo $vehicleDescription['model_vehicle'] ;?><br></td>
				<?php endforeach;?>
			</tr>
	<?php endforeach;?>
	</tbody>
</table>