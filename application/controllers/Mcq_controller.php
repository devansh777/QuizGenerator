<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcq_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->library('excel');
		$this->load->model("Mcq_model");
		//$this->load->view('excel_import');	
	}
	public function index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('Login');
	}
	public function deletemultiple()
	{
		$sub=$this->session->userdata('subject');
		$unit=$this->session->userdata('unit');
		$result=$this->Mcq_model->mcqs($sub,$unit);
		foreach ($result as $row) 
		{
			if ($this->input->post($row->mcqId)==TRUE)
			{
				$this->Mcq_model->deletemcq($row->mcqId);
			}
		}
		$data['result']=$this->Mcq_model->mcqs($sub,$unit);
		$this->load->view('alldata',$data);	
	}
	public function addusr()
	{
		$this->Mcq_model->addusr($_POST);
		$this->load->view('Login');
	}
	public function addu()
	{
		$result=$this->Mcq_model->addu();
		$this->addunit();
	}
	public function addunit()
	{
		$data['result']=$this->Mcq_model->groups();
		$this->load->view('addunit',$data);
	}
	public function Registration()
	{
		$this->load->view('registration');
	}
	public function logout()
	{
		$this->session->unset_userdata('name');
		$this->load->view('Login');
	}
	public function deletemcq($mcqid)
	{
		
		$this->Mcq_model->deletemcq($mcqid);
		$sub=$this->session->userdata('subject');
		$unit=$this->session->userdata('unit');
		$data['result']=$this->Mcq_model->mcqs($sub,$unit);
		$this->load->view('alldata',$data);
	}
	public function fetch_unit()
	{
		$abc=$this->input->post('country_id');
		echo $this->Mcq_model->fetch_unit($this->input->post('country_id'));
	}

	public function question()
	{
		$abc=$this->input->post('unit_id');
		/*echo "<script>alert($abc)</script>";*/
		echo $this->Mcq_model->allmcqs($abc);
	}

	public function mcqs()
	{
		$sub=$this->input->post('subject');
		$this->session->set_userdata('subject',$sub);
		$unit=$this->input->post('txtunit');
		$this->session->set_userdata('unit',$unit);
		$data['result']=$this->Mcq_model->mcqs($sub,$unit);
		$this->load->view('alldata',$data);	
	}
	public function mcqlist()
	{
		$data['result']=$this->Mcq_model->groups();
		$this->load->view('allmcq',$data);
	}
	public function loginchk()
	{

		$result=$this->Mcq_model->loginchk();
	
		if(!empty($result))
		{
			foreach ($result as $row) 
			{
				$this->session->set_userdata('uid',$row->uid);
				$this->session->set_userdata('name',$row->uname);
				$this->load->view('welcome_message');
			}
		}
		else
		{
			$this->load->view('Login');
		}
	}
	public function addnewsub()
	{
		$result=$this->Mcq_model->addsub();
		if($result)
		{
			echo "<script>alert('Subject Added Successfully...')</script>";
			$this->home();	
		}
	}
	public function addSub()
	{
		$this->load->view('addsub');
	}
	
	public function users()
	{
		$data['result']=$this->Mcq_model->groups();
		$this->load->view('user',$data);
	}
	public function home()
	{
		$this->load->view('welcome_message');
	}
	public function addmcq()
	{	
		$result=$this->Mcq_model->addmcq($_POST);
		if($result)
		{
			echo "<script>alert('Data Upload Successfully...')</script>";
			$this->users();		
		}
	}
	public function createtest()
	{

		$data['result']=$this->Mcq_model->groups();
		$this->load->view('createTest',$data);
	}
	public function ontest()
	{
		$sub=$this->input->post('subject');
		$this->session->set_userdata('subject',$sub);
		$data['result']=$this->Mcq_model->alltest($sub);
		/*$this->alltest();
		$abc['result']=$this->Mcq_model->groups();
		$arr=array();
		$arr['sub']=$abc['result'];
		$arr['dta']=$data['result'];*/
		$this->load->view('testlst',$data);

	}
	public function deletetest($test_id)
	{
		$this->Mcq_model->deletetest($test_id);
		$sub=$this->session->userdata('subject');
		$data['result']=$this->Mcq_model->alltest($sub);
		$this->load->view('testlst',$data);

	}
	public function addnewtest()
	{
		$sub=$this->input->post('subject');
		$opt=$this->input->post('option');
		$tname=$this->input->post('txtgrpname');
		$this->session->set_userdata('subject',$sub);
		$this->session->set_userdata('subname',$tname);
		$result=$this->Mcq_model->addnewtest($tname);
		if($result)
		{
		
			foreach ($result as $row) {
				$this->session->set_userdata('test_id',$row->test_id);
				
			}
		}
		$tid=$this->session->userdata('test_id');
		if($opt=='randome')
		{

			$this->load->view('randomepg');
		}
		else if($opt=='marge')
		{
			$data['result']=$this->Mcq_model->alltest($sub);
			$this->load->view('mrgepg',$data);
		}
		else if($opt=='manual')
		{
			echo "Manual Page call";
			if($result)
			{
				$this->alltestmcqs($this->session->userdata('test_id'),$sub);
			}
		
		}
	}
	public function mrgtst($test_id)
	{
		$this->Mcq_model->mrgtst($test_id);
		$sub=$this->session->userdata('subject');
		$data['result']=$this->Mcq_model->alltest($sub);
		echo "<script>alert('Test Successfully added...')</script>";
		$this->load->view('mrgepg',$data);

	}
	public function testgen()
	{
		$tid=$this->session->userdata('test_id');
		

		$this->Mcq_model->testgen();
		$this->showmcqs($this->session->userdata('test_id'));
	}
	public function alltestmcqs($test_id)
	{
		/*$unit=$this->input->post('txtunit');
		$this->session->set_userdata('unit',$unit);*/
		$sub=$this->session->userdata('subject');
		$this->session->set_userdata('test_id',$test_id);
		$data['result']=$this->Mcq_model->getunit($sub);
		/*$this->Mcq_model->allmcqs($test_id,$sub,$unit);*/
		//print_r($data);
		$this->load->view('addmcqtest',$data);
	}
	public function add($mcqId)
	{
		/*echo "<script>alert($mcqId)</script>";*/
		$this->Mcq_model->add($mcqId);
		$sub=$this->session->userdata('subject');
		$tid=$this->session->userdata('test_id');
		$unit=$this->session->userdata('unit');
		$data['result']=$this->Mcq_model->allmcqs($tid,$sub,$unit);
		$this->alltestmcqs($tid);
	}
	public function showmcqs($test_id)
	{	$this->session->set_userdata('test_id',$test_id);
		$data['result']=$this->Mcq_model->showmcqs($test_id);
		$this->load->view('testmcqs',$data);
	}
	public function removemcq($mcqId)
	{
		echo "<script>alert('Do you want to remove ?')</script>";
		$this->Mcq_model->removemcq($mcqId);
		$this->showmcqs($this->session->userdata('test_id'));
	}
	public function alltest()
	{
		$abc['result']=$this->Mcq_model->groups();
		$this->load->view("alltest",$abc);

	}
	public function importmcq()
	{
		$data['result']=$this->Mcq_model->groups();
		$this->load->view("excel_import",$data);
	}
	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$subid=$this->input->post('country');
			$unit=$this->input->post('state');
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$question = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$optionA = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$optionB = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$optionC = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$optionD = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$answer = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					/*$unit = $worksheet->getCellByColumnAndRow(6, $row)->getValue();*/
					$data[] = array(
						'question'		=>	$question,
						'optionA'			=>	$optionA,
						'optionB'				=>	$optionB,
						'optionC'		=>	$optionC,
						'optionD'			=>	$optionD,
						'answer'			=>	$answer,
						'unit'				=>$unit,
						'subId'				=>$subid
					);
				}
			}
			
			$result=$this->Mcq_model->insert($data);
			$this->Mcq_model->filter();
			if($result)
			{
				echo "<script>alert('Data Upload Successfully...')</script>";
					$data['result']=$this->Mcq_model->groups();

				$this->load->view('excel_import',$data);
			}
			else
			{
				echo "<script>alert('ERROR Data not uploaded Something Wrong...')</script>";
			}
		}	
	}
	function answerkey()
	{
		$test_id=$this->session->userdata('test_id');
		$data['result']=$this->Mcq_model->showmcqs($test_id);
		$result=$this->Mcq_model->testname($test_id);
		foreach($result as $row)
		{
			$this->session->set_userdata("tname",$row->test_name);
		}
		$this->load->view('ansdoc',$data);
	}
	function deleteunit()
	{
		$this->Mcq_model->deleteunit();
		$this->addunit();
	}
	function action()
	{
		//$this->load->model("excel_export_model");
		
	  	$this->load->library("excel");
	  	$object = new PHPExcel();
	  	$object->setActiveSheetIndex(0);
	  	$table_columns = array("Question","Option A","Option B","Option C","Option D","Answer");

	  	$column = 0;

	  	foreach($table_columns as $field)
	  	{
	   		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	   		$column++;
	  	}
	  	$employee_data = $this->Mcq_model->showmcqs($this->session->userdata('test_id')); 	
	  	$excel_row = 2;
	  	$no=1;
	  	foreach($employee_data as $row)
	  	{
	  		$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->question);
	   		$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->optionA);
	   		$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->optionB);
	   		$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->optionC);
	   		$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->optionD);
	   		$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->answer);
	   		$excel_row++;
	  	}
		$test_id=$this->session->userdata('test_id');
		$result=$this->Mcq_model->testname($test_id);
		foreach($result as $row)
		{
			$this->session->set_userdata("tname",$row->test_name);
		}
		$fname=$this->session->userdata('tname'); 
	  	$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
	  	header('Content-Type: application/vnd.ms-excel');
	  	header("Content-Disposition: attachment;filename=$fname.xls");
	  	$object_writer->save('php://output');
	}
	public function doc()
	{
		$test_id=$this->session->userdata('test_id');
		$data['result']=$this->Mcq_model->showmcqs($test_id);
		$result=$this->Mcq_model->testname($test_id);
		foreach($result as $row)
		{
			$this->session->set_userdata("tname",$row->test_name);
		}
		$this->load->view('testdoc',$data);
	}
}?>