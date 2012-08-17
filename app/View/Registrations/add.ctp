<script>
$j(document).ready(function(){

		var clientDocument = $j("#RegistrationClientId").val();

        $j.getJSON(url + 'Clients/findDataClientId/' + clientDocument, function(data){

            // Se muestra los detalles del cliente recien inscrito
            $j("#type_document").append('<span>' + data.Client.type_document + '</span>');
            $j("#number_document").append('<span>' + data.Client.number_document + '</span>');
            $j("#name").append('<span>' + data.Client.name + '</span>');
            $j("#lastname").append('<span>' + data.Client.lastname + '</span>');

            // Se muestra los detalles del vehículo del cliente recien inscrito
            $j("#model_vehicle").append('<span>' + data.Vehicle.model_vehicle + '</span>');
            $j("#plate_vehicle").append('<span>' + data.Vehicle.plate_vehicle + '</span>');
            $j("#type_vehicle").append('<span>' + data.Vehicle.type_vehicle + '</span>');
        })


});
</script>
<fieldset align = "center"><legend>FORMULARIO DE MATR&IacuteCULA PARA SERVICIO DE GR&Uacute;A</legend></fieldset>
<br>
<fieldset>
	<legend>Cliente Descripci&oacute;n</legend>
<table>
    
<?php
echo $this->Html->tableHeaders(array('Tipo Documento', 'N&uacute;mero Documento', 'Nombre', 'Apellido'));
?>
<tr>
    <td> <p id = "type_document"></p> </td>
    <td> <p id = "number_document"></p> </td>
    <td> <p id = "name"></p> </td>
    <td> <p id = "lastname"></p> </td>
</tr>
</table>
</fieldset>
<fieldset>
	<legend>Veh&iacute;culo Descripci&oacute;n</legend>
<table>
<?php
echo $this->Html->tableHeaders(array('Placa', 'Modelo', 'Tipo Veh&iacute;culo'));
?>
<tr>
    <td> <p id = "plate_vehicle"></p> </td>
    <td> <p id = "model_vehicle"></p> </td>
    <td> <p id = "type_vehicle"></p> </td>
</tr>
</table>
<fieldset>




<?php 
/*
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

//echo $this->Form->input('date_end_monthly_payment', array('type' => 'text', 'label' => 'Fecha Caduca Prestaci&oacute;n Servicio (AA/MM/DD)'));
echo $this->Form->input('date_end_monthly_payment', array('label' => 'Fecha Caduca Prestaci&oacute;n Servicio (AA/MM/DD)'));
echo $this->Form->input('amount_month_cancel', array('type' => 'text', 'label' => 'Cantidad de Meses Cancelados'));

echo $this->Form->end('Guardar'); 
*/


// necesito enviar el id del cliente y el vehiculo al elemento
echo $this->element('registration_form', array('client_id' => $client_id, 'vehicle_id' => $vehicle_id));
?>