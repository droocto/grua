<?php 
echo $this->Session->flash();
echo $this->Form->create(); 
echo $this->Form->input('amount_month', array('label' => 'Cantidad Meses (Mensualidad)'));
echo $this->Form->input('value_month', array('label' => 'Valor Mensualidad'));
echo $this->Form->end('Guardar'); 
?>
