<?php
class RegistrationsController extends AppController
{
	public $helpers = array('Form', 'Html', 'Session');

	public function add($client_id = null, $vehicle_id = null)
	{
		$this->loadModel('Client');
		$clientsData = $this->Client->find('list', array('fields' => 'name'));
		$this->set('clientsData', $clientsData);

		$this->set('client_id', $client_id);
		$this->set('vehicle_id', $vehicle_id);

		if (!empty($this->data)) {
			if(!$this->Registration->save($this->data)) {
				$this->Session->setFlash('** ERROR AL AFILIACION **');
				$this->redirect('/Registrations/add');
			} else {
				$this->Session->setFlash('AFILIACION GUARDADA');
				//$this->redirect('/Registrations/add');
				$this->redirect('/Clients/add');
			}
		}
	}
}
?>