<?php echo $this->Form->create('TypeVehicle', array('url' => '/TypeVehicles/editTypeVehicleForm')); ?>
<table>
    <?php echo $this->Html->TableHeaders(array('Tipo de Veh&iacuteculo', 'Editar')); ?>
    <?php foreach($typeVehicleData as $rowTypeVehicle): ?>
    <tr>
        <td><?php echo $rowTypeVehicle['TypeVehicle']['type_vehicle_name']; ?></td>
        <td><?php echo $this->Form->input('TypeVehicle.type_vehicle_id.' . $rowTypeVehicle['TypeVehicle']['id'] , 
                                                                            array(
                                                                                    'type' => 'checkbox',
                                                                                    'label' => '', 
                                                                                    'value' => $rowTypeVehicle['TypeVehicle']['type_vehicle_name']
                                                                            )
                                        );
            ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php echo $this->Form->end('Editar'); ?>

