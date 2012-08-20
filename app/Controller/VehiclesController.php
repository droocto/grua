<?php
class VehiclesController extends AppController
{
	public $helpers = array('Form', 'Html', 'Session');


	/**
	* Permite añadir un nuevo vehiculo del cliente
	*
	* @return void
	*/
	public function add($vehicle_id = null)
	{
		// Carga el modelo Client para poder listar los nombres
		$this->loadModel('Client');
		$clientsName = $this->Client->find('list', array('fields' => 'name'));

		$this->set('clientsName', $clientsName);
		$this->set('vehicle_id', $vehicle_id);

        // Carga los tipos de vehículos como checkbox
        $this->loadModel('TypeVehicle');
        $typeVehicles = $this->TypeVehicle->find('list', array(
                                                                'fields' => array(
                                                                                  'TypeVehicle.type_vehicle_name'
                                                                            ),
                                                                'recursive' => -1
                                                          )
                                                );

        $this->set('typeVehicles', $typeVehicles);


		if (!empty($this->data)) {
            $data['Vehicle']['client_id'] = $this->data['Vehicle']['client_id'];
            $data['Vehicle']['plate_vehicle'] = $this->data['Vehicle']['plate_vehicle'];
            $data['Vehicle']['model_vehicle'] = $this->data['Vehicle']['model_vehicle'];
            $data['Vehicle']['type_vehicle_id'] = $this->data['Vehicle']['type_vehicle_id'][0];
            $data['Vehicle']['description_vehicle'] = $this->data['Vehicle']['description_vehicle'];

			if(!$this->Vehicle->save($data)) {
				$this->Session->setFlash('** ERROR AL GUARDAR VEHICULO **');
				$this->redirect('/Vehicles/add');
			} else {
				$this->Session->setFlash('VEHICULO GUARDADO');
				//$this->redirect('/Vehicles/add');
				$this->redirect('/Registrations/add/' . $this->data['Vehicle']['client_id'] . '/' . $this->Vehicle->id);
			}
		}


	}




	/**
	* Permite listar los clientes
	*
	* @return void
	*/

	public function view()
	{
		// Carga el modelo Client para poder listar los nombres
		$this->loadModel('Client');
		$vehiclesData = $this->Client->find('all');

		$this->set('vehiclesData', $vehiclesData);
	}
}
?>
