<?php
class Vehicle extends AppModel
{
	public $name = 'Vehicle';

	public $hasOne = array(
        'Registration' => array(
            'className'  => 'Registration',
            'foreignKey' => 'vehicle_id'
        )
    );

    public $hasMany = array(
        'Service' => array(
            'className'  => 'Service',
            'foreignKey' => 'vehicle_id'
        )
    );
}
?>