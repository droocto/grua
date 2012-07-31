<?php
class VehiclesController extends AppController
{
	public $helpers = array('Form', 'Html', 'Session');


	/**
	* Permite añadir un nuevo vehiculo del cliente
	*
	* @return void
	*/
	public function add()
	{
		// Carga el modelo Client para poder listar los nombres
		$this->loadModel('Client');
		$clientsName = $this->Client->find('list', array('fields' => 'name'));

		$this->set('clientsName', $clientsName);

		if (!empty($this->data)) {
			if(!$this->Vehicle->save($this->data)) {
				$this->Session->setFlash('** ERROR AL GUARDAR VEHICULO **');
				$this->redirect('/Vehicles/add');
			} else {
				$this->Session->setFlash('VEHICULO GUARDADO');
				$this->redirect('/Vehicles/add');
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