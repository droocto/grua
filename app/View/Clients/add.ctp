<script>
$j(document).ready(function(){

		$j("#documentClient").blur(function(){
		var clientDocument = $j(this).val();

		$j.getJSON(url + 'Clients/findDataClient/' + clientDocument, function(data){

			$j("#documentType").val(data.type_document);
			//$j("#documentClient").val(data.name);
			$j("#nameClient").val(data.name);
			$j("#lastnameClient").val(data.lastname);
			$j("#phoneClient").val(data.phone);
			$j("#celphoneClient").val(data.celphone);
			$j("#addressClient").val(data.address);
			$j("#emailClient").val(data.email);
			$j("#contactNameClient").val(data.contact_familiar_name);
			$j("#contactPhoneClient").val(data.contact_familiar_phone);
		})

		

	})

});
</script>
<fieldset align = "center"><legend>FORMULARIO INGRESO DE CLIENTE</legend></fieldset>
<?php 
echo $this->Form->create(); 
echo $this->Form->input('type_document', array('label' => 'Tipo de documento', 'id' =>'documentType'));
echo $this->Form->input('number_document', array('label' => 'N&uacute;mero de documento', 'id' => 'documentClient'));
echo $this->Form->input('name', array('label' => 'Nombre', 'id' => 'nameClient'));
echo $this->Form->input('lastname', array('label' => 'Apellido', 'id' =>'lastnameClient'));
echo $this->Form->input('phone', array('label' => 'Tel&eacute;fono', 'id' =>'phoneClient'));
echo $this->Form->input('celphone', array('label' => 'Celular', 'id' =>'celphoneClient'));
echo $this->Form->input('address', array('label' => 'Direcci&oacute;n', 'id' =>'addressClient'));
echo $this->Form->input('email', array('label' => 'Correo Electr&oacute;nico', 'id' =>'emailClient'));
echo $this->Form->input('contact_familiar_name', array('label' => 'Nombre Contacto Familiar', 'id' =>'contactNameClient'));
echo $this->Form->input('contact_familiar_phone', array('label' => 'Tel&eacute;fono Contacto Familiar', 'id' =>'contactPhoneClient'));
echo $this->Form->end('Guardar'); 
?>
