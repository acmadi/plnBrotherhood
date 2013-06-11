<?php
Yii::import('zii.widgets.CPortlet');
 
class MenuPortlet extends CPortlet
{
    public function init()
    {
    	$id = Yii::app()->getRequest()->getQuery('id');
        $this->title = Pengadaan::model()->find('id_pengadaan = "' . $id . '"')->nama_pengadaan;
        parent::init();
    }
 
    protected function renderContent()
    {
        $this->render('menuPortlet');
    }
}

?>