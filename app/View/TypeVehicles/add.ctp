<script>
$j(document).ready(function(){
    var cont = 0;
    $j("#indicador").click(function(event){
           event.preventDefault();
           cont++;
           $j("#rst").append('<b>Tipo de Veh&iacute;culo<b><br>')
                     .append('<input name = "data[TypeVehicle][type_vehicle_name_'+cont+']"><br>');
    })

});
</script>
<?php echo $this->Form->create('TypeVehicle', array('url' => '/TypeVehicles/add')); ?>
<fieldset>
    <legend>Formulario Tipos de Veh&iacute;culos</legend>
        <?php echo $this->Form->input('TypeVehicle.type_vehicle_name', array('type'=>'text', 'label'=>'<b>Tipo de Veh&iacute;culo</b>'));?>
        <div id="rst"></div>
</fieldset>
<div>
    <?php echo $this->Form->button('Agregar Indicador', array('id' => 'indicador')); ?>
</div>
<?php 
//echo $ajax->submit('Agregar', array('update'   =>'content'));
echo $this->Form->submit('Guardar');
?>
<?php echo $this->Form->end(); ?>

