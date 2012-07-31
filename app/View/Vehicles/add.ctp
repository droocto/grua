<?php 
echo $this->Form->create(); 
echo $this->Form->input('Vehicle.client_id', array('type' => 'select', 'options' => $clientsName, 'label' => 'Cliente Nombre', 'empty' => 'Seleccione el nombre de un cliente'));
echo $this->Form->input('Vehicle.plate_vehicle', array('label' => 'Placa'));
echo $this->Form->input('Vehicle.model_vehicle', array('label' => 'Modelo'));
echo $this->Form->input('Vehicle.description_vehicle', array('type' => 'textarea', 'label' => 'Descripci&oacute;n'));
echo $this->Form->end('Guardar'); 
?>