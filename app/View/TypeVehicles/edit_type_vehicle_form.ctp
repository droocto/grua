<?php 
echo $this->Form->create('TypeVehicle', array('url' => '/TypeVehicles/edit')); 
?>
<table>
    <?php echo $this->Html->TableHeaders(array('Nombre Anterios', 'Nuevo Nombre')); ?>
    <?php foreach($typeVehicleData as $typeVehicleId => $typeVehicleName): ?>
        <tr>
            <td><?php echo $typeVehicleName; ?></td>
            <td><?php echo $this->Form->input('TypeVehicle.' . $typeVehicleId, array('label' => '', 'type' => 'text')); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Form->end('Guardar'); ?>
