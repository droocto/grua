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


        $dataRegistration = $this->calculateExpireDate($this->data);

        if(!$this->Registration->save($dataRegistration)) {
            $this->Session->setFlash('** ERROR AL AFILIACION **');
            $this->redirect('/Registrations/add');
        } else {
            $this->Session->setFlash('AFILIACION GUARDADA');
            $this->redirect('/Clients/add');
        }


        }
    }




    /*
     *
     * Permite calcular la fecha en que expira la mensualidad
     *
     * @param   array $data             Contiene los datos del formulario
     *
     * @return  array $dataRegistration Rretorna el array de todos los datos para guardar en la tabla registration
     */
    
    public function calculateExpireDate($data)
    {
        $priceCancel = $data['Registration']['price_cancel'];
        $this->loadModel('Payment');
        $paymentsData = $this->Payment->find('first');

        $valueMonth = $paymentsData['Payment']['value_month'];
        $valueTotal = $priceCancel/$valueMonth;

        $monthPayment = $paymentsData['Payment']['amount_month'];
        $daysCancel = $valueTotal * ($monthPayment *30);

        $fecha = explode('-', date('d-m-Y'));
        $fecha_actual = mktime(0, 0, 0, $fecha[1], $fecha[0], $fecha[2]);
        $diasSegundos = $daysCancel * 86400;
        $fechaTotal = $fecha_actual + $diasSegundos;
        $resultado = date("Y-m-d", $fechaTotal);

        $dateMonthPayment = explode('-', $resultado);



        $data['Registration']['client_id'] = $this->data['Registration']['client_id'];
        $data['Registration']['vehicle_id'] = $this->data['Registration']['vehicle_id'];

        $dataRegistration['Registration']['date_monthly_payment'] = 
                                                    array(
                                                            'month' => $data['Registration']['date_inscriptions']['month'], 
                                                            'day' => $data['Registration']['date_inscriptions']['day'], 
                                                            'year' => $data['Registration']['date_inscriptions']['year']
                                                    ); 

        $dataRegistration['Registration']['date_end_monthly_payment'] = 
                                                        array(
                                                                'month' => $dateMonthPayment[1],
                                                                'day' => $dateMonthPayment[2],
                                                                'year' => $dateMonthPayment[0]
                                                        ); 

        $dataRegistration['Registration']['price_cancel'] = $data['Registration']['price_cancel'];

        return $dataRegistration;
    }
}
?>
