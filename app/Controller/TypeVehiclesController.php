<?php

class TypeVehiclesController extends AppController
{
    public $helpers = array('Form', 'Html', 'Session');


    /**
    * Permite añadir un nuevo tipo de vehiculo
    *
    * @return void
    */

    public function add()
    {

        if (!empty($this->data)) {
            // Como el formulario puede traer varios registro para almacenar el nombre del tipo de vehículo se
            // se tiene que trasformar el nombre de estos

           foreach ($this->data['TypeVehicle'] as $type_vehicle_name) {
                    $data['TypeVehicle']['type_vehicle_name'] = $type_vehicle_name;
                    
                    // Se crea un nuevo registro
                    $this->TypeVehicle->create();
                    if (!$this->TypeVehicle->save($data)) {
                        $this->Session->setFlash('** ERROR AL GUARDAR CLIENTE **');
                        $this->redirect('/TypeVehicles/add');
                    }
            }
            $this->redirect('/TypeVehicles/add');
        }
    }
}
?>

