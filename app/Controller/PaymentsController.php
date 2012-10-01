<?php

class PaymentsController extends AppController
{
    public $helpers = array('Form', 'Html', 'Session');

    /*
     *
     * Permite recibir y guardar la cantidad de meses y el valor que tendran 
     * en la mensualidad
     *
     * @return void
     */
    
    public function add()
    {
        if (!empty($this->data)) {
            if ($this->Payment->save($this->data)) {
                $this->Session->setFlash('VALOR GUARDADO DE MENSUALIDAD');
                $this->redirect('/Payments/add');
            } else {
                 $this->Session->setFlash('** ERROR AL GUARDAR **');
                $this->redirect('/Payments/add');
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
        $paymentsData = $this->Payment->find('all', array('recursive' => -1));
        $this->set('paymentsData', $paymentsData);
    }







    /*
     *
     * Permite editar el valor de la mensualidad
     *
     * @param int id Registro a editar
     *
     * @return void
     */

    public function edit($id = null)
    {
        $this->Payment->id = $id;
        if (empty($this->data)) {
            $this->data = $this->Payment->read();
        } else {
            if ($this->Payment->save($this->data)) {
                $this->Session->setFlash('EL VALOR MENSUALIDAD HA SIDO ACTUALIZADO');
                $this->redirect('/Payments/add');
            }
        }
        $this->render('add');
    }

}
?>
