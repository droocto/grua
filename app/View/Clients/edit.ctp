<?php 
echo $this->Session->flash();
echo $this->Form->create(); 
echo $this->Form->input('type_document', array('label' => 'Tipo de documento'));
echo $this->Form->input('number_document', array('label' => 'N&uacute;mero de documento'));
echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->input('lastname', array('label' => 'Apellido'));
echo $this->Form->input('phone', array('label' => 'Tel&eacute;fono'));
echo $this->Form->input('celphone', array('label' => 'Celular'));
echo $this->Form->input('address', array('label' => 'Direcci&oacute;n'));
echo $this->Form->input('email', array('label' => 'Correo Electr&oacute;nico'));
echo $this->Form->input('contact_familiar_name', array('label' => 'Nombre Contacto Familiar'));
echo $this->Form->input('contact_familiar_phone', array('label' => 'Tel&eacute;fono Contacto Familiar'));
echo $this->Form->end('Guardar'); 
?>