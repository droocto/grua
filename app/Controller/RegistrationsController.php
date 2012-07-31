<?php
class RegistrationsController extends AppController
{
	public $helpers = array('Form', 'Html', 'Session');

	public function add()
	{
		$this->loadModel('Client');
		$clientsData = $this->Client->find('list', array('fields' => 'name'));
		$this->set('clientsData', $clientsData);

		if (!empty($this->data)) {
			if(!$this->Registration->save($this->data)) {
				$this->Session->setFlash('** ERROR AL AFILIACION **');
				$this->redirect('/Registrations/add');
			} else {
				$this->Session->setFlash('AFILIACION GUARDADA');
				$this->redirect('/Registrations/add');
			}
		}
	}
}
?>