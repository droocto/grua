<?php
class ClientsController extends AppController
{
	public $helpers = array('Form', 'Html', 'Session');
	//public $layout = ''		;

	/**
	* Permite añadir un nuevo cliente
	*
	* @return void
	*/
	public function add()
	{
		$this->layout = 'default';

		if (!empty($this->data)) {
			if(!$this->Client->save($this->data)) {
				$this->Session->setFlash('** ERROR AL GUARDAR CLIENTE **');
				$this->redirect('/Clients/add');
			} else {
				$this->Session->setFlash('CLIENTE GUARDADO');
				//$this->redirect('/Clients/add');
				$this->redirect('/Vehicles/add/' . $this->Client->id);
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
		$clientsData = $this->Client->find('all');
		$this->set('clientsData', $clientsData);
	}


	
	/**
	* Permite editar los atributos del cliente
	*
	* @return void
	*/

	public function edit ($id = null)
	{
		$this->Client->id = $id;

		if (empty($this->data)) {
			$this->data = $this->Client->read();
		} else {
			if ($this->Client->save($this->data)) {
				$this->Session->setFlash('EL CLIENTE HA SIDO ACTUALIZADO');
				$this->redirect('/Clients/view');
			}
		}
	}



	/**
	* Busca al cliente por número de documento para llenar los campos de la vista automáticamente
	*
	* @param string clientDocument número de documento del cliente
	*
	* @return void
	*/

	public function findDataClient($clientDocument = null)
	{
		$this->layout = '';
		$clientData = $this->Client->find('all', array(
											'conditions' => array('Client.number_document' => $clientDocument),
											'recursive' => -1
										)
							);
 		 $clientResult = json_encode($clientData[0]['Client']);
		 $this->set('clientResult',$clientResult);
	}



	/**
	* Este método se utiliza para mostrar todos los datos del cliente en un formulario
	*
	* @param string $clientId id del cliente en la tabla
	*
	* @return void
	*/

	public function findDataClientId($clientId)
	{
		$this->layout = '';

		$joins =  array(
						array('table' => 'vehicles',
							'alias' => 'Vehicle',
							'type' => 'INNER',
							'conditions' => array('Client.id = Vehicle.client_id')
						)
					);

		$clientData = $this->Client->find('all', array(
										'conditions' => array('Client.id' => $clientId),
										'fields' => array(
															'Client.type_document',
															'Client.number_document',
															'Client.name',
															'Client.lastname',
															'Vehicle.plate_vehicle',
															'Vehicle.model_vehicle',
															'Vehicle.type_vehicle'
													),
										//'recursive' => -1,
										'joins' => $joins

										)
							);

		$clientResult = json_encode($clientData[0]);
		$this->set('clientResult',$clientResult);
	}
}
?>