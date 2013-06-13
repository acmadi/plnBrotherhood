<?php

class docxController extends Controller
	public function behaviors()
	{
	   return array(
		   'doccy' => array(
			   'class' => 'ext.doccy.Doccy',
		   ),
	   );
	}
	
	public function actionDownload()
	{
		$this->doccy->newFile('template.docx'); // template.docx must be located in protected/views/report/template.docx where "report" is the name of the controller from which is renderDocx called (alternatively you must configure option "templatePath")
		$this->doccy->phpdocx->assignToHeader("#HEADER1#","HRADIeader 1"); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Footer 1"); // basic field mapping to footer
		$this->doccy->phpdocx->assign("#TITLE1#","Pet shop BOYS list"); // basic field mapping
		$this->doccy->phpdocx->assignBlock("members",array(array("#NAME#"=>"John","#SURNAME#"=>"DOE"),array("#NAME#"=>"Jane","#SURNAME#"=>"DOE"))); // this would replicate two members block with the associated values
		$this->doccy->phpdocx->assignNestedBlock("pets",array(array("#PETNAME#"=>"Rex")),array("members"=>1)); // would create a block pets for john doe with the name rex
		$this->doccy->phpdocx->assignNestedBlock("pets",array(array("#PETNAME#"=>"Rox")),array("members"=>2)); // would create a block pets for jane doe with the name rox
		$this->doccy->phpdocx->assignNestedBlock("toys",array(array("#TOYNAME#"=>"Ball"),array("#TOYNAME#"=>"Frisbee"),array("#TOYNAME#"=>"Box")),array("members"=>1,"pets"=>1)); // would create a block toy for rex
		$this->doccy->phpdocx->assignNestedBlock("toys",array(array("#TOYNAME#"=>"Frisbee")),array("members"=>2,"pets"=>1)); // would create a block toy for rox
		$this->renderDocx("ExampleReport.docx", true); // use $forceDownload=false in order to (just) store file in the outputPath folder.
	}
?>