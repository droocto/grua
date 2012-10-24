<?php
class ParkingTmp extends AppModel
{

    public $name = 'ParkingTmp';
    public $useTable = 'parking_tmps';



        /**
         *
         * Permite saber cuantas horas el vehículo estubo dentro del parqueadero
         *
         * @param  $existVehicle Registro del vehículo que esta dentro del parqueadero
         *
         * @return $parkingHours Horas que el vehículo dentro del parqueadero
         */
        
        public function parkingHours($existVehicle)
        {
                $sql = "SELECT EXTRACT(HOUR FROM TIMESTAMP '" . $existVehicle['ParkingTmp']['created'] . "')";
                $hourOfParking = $this->query($sql);

                $hourOfExitParking = date('G');
                $parkingHours = $hourOfExitParking - $hourOfParking[0][0]['date_part'];

                if ($parkingHours < 0) {
                        $parkingHours = $parkingHours * -1;
                }
                
                return $parkingHours;
        }


}
?>
