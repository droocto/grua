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



    /**
    * Permite listar los tipos de vehículos
    *
    * @return void
    */
    public function viewEditTypeVehicle()
    {
        $typeVehicleData = $this->TypeVehicle->find('all', array('recursive' => -1));
        $this->set('typeVehicleData', $typeVehicleData);
    }



    /**
    * Permite crear un array con las opciones que han sido seleccionadas solamente
    * para poder crear una vista que muestra el nombre antiguo
    *
    * @return void
    */

    public function editTypeVehicleForm()
    {
        $typeVehicleData = array();

        foreach ($this->data['TypeVehicle']['type_vehicle_id'] as $key => $row) {
            if ($row != '0') {
                $typeVehicleData[$key] = $row;
            }
        }

        $this->set('typeVehicleData', $typeVehicleData);
    }

    


    /**
    * Permite editar el nombre de los tipos de vehículos
    *
    * @return void
    */

    public function edit () 
    {
        if (!empty($this->data)) {
            foreach ($this->data['TypeVehicle'] as $typeVehicleId => $typeVehicleName) {

                $this->TypeVehicle->id = $typeVehicleId;
                if (!$this->TypeVehicle->saveField('type_vehicle_name', $typeVehicleName)) {
                     $this->Session->setFlash('** ERROR EN LA ACTUALIZACION **');
                }
            }
            $this->Session->setFlash('EL TIPO DE VEHICULO HA SIDO ACTUALIZADO');
            $this->redirect('/TypeVehicles/viewEditTypeVehicle');
            
        }
    }



    /**
     *
     * Este método borra el tipo de vehículo dependiendo si no existe un vehículo con su tipo de vehículo
     *
     * @param $id
     *
     * @return void
     */
    
    public function del($id = null)
    {
        $typeVehicleData = $this->TypeVehicle->find('list', array(
                                                                'fields' => array('TypeVehicle.type_vehicle_name'),
                                                                'recursive' => -1)
        );

        $this->set('typeVehicleData', $typeVehicleData);

        try{
            if ($this->TypeVehicle->delete($id)) {
                $this->Session->setFlash('TIPO VEHICULO BORRADO');
                $this->redirect('/TypeVehicles/del');
            }
        } catch(Exception $e){
            $this->Session->setFlash('EXISTE UN VEHICULO ASIGNADO A ESTE TIPO');
        }
    }



}
?>

