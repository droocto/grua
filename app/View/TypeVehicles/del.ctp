<?php echo $this->Form->create('TypeVehicle', array('url' => '/TypeVehicles/del')); ?>
<table>
    <?php echo $this->Html->TableHeaders(array('Tipo de Veh&iacuteculo', 'Eliminar')); ?>
    <?php foreach($typeVehicleData as $key => $rowTypeVehicle): ?>
    <tr>
        <td><?php echo $rowTypeVehicle; ?></td>
        <td><?php echo $this->Html->link('Eliminar', array('controller' => 'TypeVehicles', 'action' => 'del',  $key)) ;?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Form->end(); ?>
