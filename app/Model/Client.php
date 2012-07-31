<?php
class Client extends AppModel
{
	public $name = 'Client';

	// Un cliente tiene muchos vehiculos
	// Un cliente tiene inscripciones

	public $hasMany = array(
        'Vehicle' => array(
            'className'  => 'Vehicle',
            'foreignKey' => 'client_id'
        ),
        'Registration' => array(
            'className'  => 'Registration',
            'foreignKey' => 'client_id'
        ),
        'Service' => array(
            'className'  => 'Service',
            'foreignKey' => 'client_id'
        )
    );
}
?>