<?php 
// Crear un jquery que capture el evento blur que capture el id del cliente y consulte el id del vehiculo correspondiente para colocar 
// en el campo hidden 

// Cuando se pierda el foco en el campo valor cancelado, se debe calcular la fecha que caduca la prestación del servicio
// Se hace la relación entre el valor cancelado, el precio que tiene cada mes y la fecha de pago de mensualidad y se saca la cantidad de 
// meses cancelados y la fecha en que caduca el servicio

// Los campos fecha caduca servicio y cantidad de meses cancelados debe apareces como deshabilitados
echo $this->Form->create('Registration'); 
echo $this->Form->input('Registration.client_id', array('type' => 'select', 'options' => $clientsData, 'label' => 'Seleccione el nombre del cliente'));
echo $this->Form->input('Registration.vehicle_id', array('type' => 'hidden', 'value' => 3));

echo $this->Form->input('date_inscriptions', array('label' => 'Fecha de Inscripci&oacute;n'));
echo $this->Form->input('date_monthly_payment', array('label' => 'Fecha Pago de Mensualidad'));
echo $this->Form->input('price_cancel', array('type' => 'text', 'label' => 'Valor Cancelado'));

echo $this->Form->input('date_end_monthly_payment', array('type' => 'text', 'label' => 'Fecha Caduca Prestaci&oacute;n Servicio'));
echo $this->Form->input('amount_month_cancel', array('type' => 'text', 'label' => 'Cantidad de Meses Cancelados'));

echo $this->Form->end('Guardar'); 
?>