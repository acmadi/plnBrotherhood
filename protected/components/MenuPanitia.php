<?php
Yii::import('zii.widgets.CPortlet');
 
class MenuPanitia extends CPortlet
{
    public function init()
    {
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('menupanitia');
    }
}

?>