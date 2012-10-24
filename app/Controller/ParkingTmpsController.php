<?php
/**
* Esta clase permite realizar el proceso de parqueo, es decir, la dinámica cuando 
* entra y sale un vehículo del parqueadero.
*/

class ParkingTmpsController extends AppController
{

    public $uses = array('ParkingTmp', 'Vehicle');
    public $helpers = array('Form', 'Html', 'Session');
    

    /*
     *
     * Permite buscar la placa del vehículo en el registro de matrícula
     * y almacenar el ingreso del vehículo en la tabla. Si el vehiculo'ingresa al parqueadero queda con estado cero (state = 0)
     *
     * @param string $plateVehicle Placa del vehículo a buscar
     *
     * @return
     */
    
    public function entranceParking($plateVehicle = null)
    {

        if (!empty($plateVehicle)) {
            // busca en registro de matrícula para confirmar afiliacion
            $existVehicle = $this->Vehicle->find('first', array(
                                                'conditions' => array('Vehicle.plate_vehicle' => $plateVehicle)
                                            )
                            );

            if (!empty($existVehicle)) {

                if ($this->validateMonthlyTimeExpires($existVehicle)) {
                    $parkingData['ParkingTmp']['plate_vehicle'] = $plateVehicle;
                    $parkingData['ParkingTmp']['state'] = 0;

                    $this->ParkingTmp->save($parkingData);
                    $this->set('vehicleSearchResult', 'Puede Ingresar');
                    $this->render('parkingResult');
                } else {
                    $this->set('vehicleSearchResult', 'Fecha de Matricula ha caducado');
                    $this->render('parkingResult');
                }
            } else {
                $this->set('vehicleSearchResult', 'El vehiculo no se encuentra matriculado');
                $this->render('parkingResult');
            }
        }
    }




    /*
     *
     * Permite verificar que la fecha actual no sobrepase la fecha en que se termina la mensualidad de parqueo
     *
     * @param array existVehicle Contiene el registro del auto que se va a parquear
     *
     * @return boolean
     */

    public function validateMonthlyTimeExpires($existVehicle)
    {
        // se emplea la función mktime para convertir en segundos la fecha en que se termina la mensualidad
        // y la fecha actual, para poder validarse por números

        $currentDate = date('Y-m-d');
        $currentTime = mktime(0, 0, 0, $currentDate['1'], $currentDate['2'], $currentDate['0']);

        $date_end_monthly_payment = explode('-', $existVehicle['Registration']['date_end_monthly_payment']);
        $timeForMonthlyPayment= mktime(0, 0, 0, $date_end_monthly_payment['1'], $date_end_monthly_payment['2'], $date_end_monthly_payment['0']);

        if ($currentTime <= $timeForMonthlyPayment) {
                return true;
        } else {
            return false;
        }
    }






    /*
     *
     * Permite realizar la actualización del registro del auto, indicado que ya sale del parqueadero
     *
     * @param $plateVehicle Registro del vehiculo que se encuentra dentro del parqueadero
     *
     * @return void
     */
    
    public function walkoutParking($plateVehicle = null)
    {
        $existVehicle = $this->ParkingTmp->find('first', array(
                                                            'conditions' => array('ParkingTmp.plate_vehicle' => $plateVehicle, 'ParkingTmp.state' => 0)
                                                            )
                                                );
        if (!empty($existVehicle)) {
                // Aca se optiene la cantidad de horas que el vehículo estubo parqueado
                $parkingHoursOfvehicle = $this->ParkingTmp->parkingHours($existVehicle);
                
                $this->ParkingTmp->id = $existVehicle['ParkingTmp']['id'];
                $this->ParkingTmp->saveField('state', 1);

                $this->set('vehicleSearchResult', 'El vehiculo puede salir');
                $this->render('parkingResult');

        } else {
                $this->set('vehicleSearchResult', 'El vehiculo no se encuentra en el estacionamiento');
                $this->render('parkingResult');
        }
    }

}
?>
