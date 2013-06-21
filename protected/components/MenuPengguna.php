<?php
Yii::import('zii.widgets.CPortlet');
 
class MenuPengguna extends CPortlet
{
    public function init()
    {
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('menupengguna');
    }
}

?>