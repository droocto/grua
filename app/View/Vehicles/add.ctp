<fieldset align = "center"><legend>FORMULARIO INGRESO DE VEH&Iacute;CULOS</legend></fieldset>
<?php 
echo $this->Form->create(); 
echo $this->Form->input('Vehicle.client_id',array('type' => 'hidden', 'value' => $vehicle_id));
echo $this->Form->input('Vehicle.plate_vehicle', array('label' => 'Placa'));
echo $this->Form->input('Vehicle.model_vehicle', array('label' => 'Modelo'));
echo $this->Form->input('Vehicle.type_vehicle', array('label' => 'Tipo de Veh&iacute;culo'));
echo $this->Form->input('Vehicle.description_vehicle', array('type' => 'textarea', 'label' => 'Descripci&oacute;n'));
echo $this->Form->end('Guardar'); 
?>
