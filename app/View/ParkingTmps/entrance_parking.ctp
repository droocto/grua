<script>
$j(document).ready(function(){

/*
Captura la placa del vehículo
Utiliza .get y la envia entranceParking
entranceParking devuelve mensaje que sera publicado como un html
*/
    $j("#consult").click(function(){
        var plateVehicle = $j("#plate").val();

        $j.get(url + 'ParkingTmps/entranceParking/' + plateVehicle,function(data){
            $j("#confirmation").html(data);
        })
    })


    $j("#exit").click(function(){
        var plateVehicle = $j("#plate").val();

         $j.get(url + 'ParkingTmps/walkoutParking/' + plateVehicle,function(data){
            $j("#confirmation").html(data);
        })
    })
});
</script>
<?php
    echo $this->Form->input('ParkingTmp.vehicle', array('label' => 'Placa de Vehículo', 'id' => 'plate'));
    echo $this->Form->button('Ingreso', array('id' => 'consult'));
    echo $this->Form->button('Salida', array('id' => 'exit'));
?>
<br>
<div id = "confirmation"></div>
