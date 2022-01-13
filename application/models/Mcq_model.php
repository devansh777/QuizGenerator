<?php
 class Mcq_model extends CI_model
 {
	public function addusr($options=array())
 	{
 		$this->db->set('uname',strip_tags($options["txtuname"]));
		$this->db->set('email',strip_tags($options["txtemail"]));
		$this->db->set('password',strip_tags($options["txtpassword"]));
		$this->db->insert('user');
		//return $this->db->insert_id();	
 	}
 	public function addmcq($options=array())
 	{
 		
 		$this->db->set('question',strip_tags($options["txtQuestion"]));
		$this->db->set('optionA',strip_tags($options["txtOptionA"]));
		$this->db->set('optionB',strip_tags($options["txtOptionB"]));
		$this->db->set('optionC',strip_tags($options["txtOptionC"]));
		$this->db->set('optionD',strip_tags($options["txtOptionD"]));
		$this->db->set('answer',strip_tags($options["txtAnswer"]));
		$this->db->set('unit',strip_tags($options["txtunit"]));
		$this->db->set('subId',strip_tags($options["txtsubject"]));
		$this->db->insert('questions');
		return $this->db->insert_id();
 	}
 	function mrgtst($test_id)
 	{
 		$data=$this->db->query("SELECT * from questions WHERE mcqId IN (SELECT mcqId FROM testmcq where test_id='$test_id')");
 		$tid=$this->session->userdata('test_id');
 		foreach ($data->result() as $row) 
 		{
 			$dta=$this->db->query("SELECT mcqId FROM testmcq where mcqId='$row->mcqId' and test_id='$tid'");
 			if($dta->num_rows()==0)
			{
				$this->db->set('mcqId',$row->mcqId);
				$this->db->set('test_id',$tid);
				$this->db->insert('testmcq');
			}
 		}	
 	}
 	function filter()
 	{
 		$this->db->where('question',"");
 		$this->db->delete('questions');
 	}
 	function addu()
 	{

 		$sub=$this->input->post('subject');
 		$max;
 		$unit=$this->db->query("SELECT max(unitName) as large from units where subId='$sub'");
 		foreach ($unit->result() as $row) {
			$max=$row->large;
		}
		$max++;
		//echo "<script>alert($max)</script>";
		$this->db->set('unitname',$max);
		$this->db->set('subId',$sub);
		$this->db->insert('units');
		echo "<script>alert('new unit added... unit no $max')</script>";
		return $this->db->insert_id();
 	}
	function fetch_unit($subid)
	{
		$data=$this->db->query("SELECT * from units where subId='$subid'");
		$output = '<option value="">Select Units</option>';
		foreach($data->result() as $row)
	  	{
	   		$output.= '<option value="'.$row->unitName.'">'.$row->unitName.'</option>';
	  	}
  		return $output;
	}
 	public function getallmcqs($limit, $start) 
 	{
        $this->db->limit($limit, $start);
        $query = $this->db->get('questions');

        return $query->result();
	}
	public function deletetest($test_id)
	{
		$this->db->where('test_id',$test_id);
		$this->db->delete('testmcq');

		$this->db->where('test_id',$test_id);
		return $this->db->delete('test_master');
	}
	public function loginchk()
	{

		$email=$this->input->post("txtemail");
		$pass=$this->input->post("txtpassword");
		$data=$this->db->query("select uid,uname from user where email='$email' and password='$pass'");
		if($data->num_rows()>0)
		{
			return $data->result();
		}
		else
		{
			echo "<script>alert('Invalide Username Or Password...')</script>";
		}
	}
	public function testgen()
	{
		$test_id=$this->session->userdata('test_id');
		$sub=$this->session->userdata('subject');
		$rno=$this->input->post('unit1');
		$notest=$this->input->post('noOfTest');
		$tname=$this->session->userdata('subname');
		$j=1;
			while($j<=$notest)
			{
				$tn=$tname.$j;
				$data=$this->addnewtest($tn);
				$j++;
			}
			foreach ($data as $row) 
			{
				$maxtestId=$row->test_id;
			}
		$tid=$maxtestId;	
		$maxun;
 		$unit=$this->db->query("SELECT max(unitName) as large from units where subId='$sub'");
 		foreach ($unit->result() as $row) 
 		{
			$maxun=$row->large;
		}
		$tno=$rno*$maxun;
		$que=$this->db->query("select max(mcqId) as large from questions");
		foreach ($que->result() as $row)
		{
			$max=$row->large;
		}
		$tmp=$notest;
		while ($notest>0) {
			echo $test_id;
			$this->randometest($sub,$tno,$rno,$test_id,$tid,$tmp,$maxun,$max);
			$test_id++;
			$notest--;
		}
	}
	public function randometest($sub,$tno,$rno,$test_id,$tid,$tmp,$maxun,$max)
	{
		$k=$rno;
		$i=1;
		$flag=1;
		$flag1=0;
		while($tno>0)
		{
		
			while($i<=$maxun)	
			{
				$no=rand(1,$max);
				$data=$this->db->query("select * from questions where mcqId='$no' and subId='$sub'");
				foreach ($data->result() as $row) 
				{	

					$que=$this->db->query("select max(mcqId) as large from questions where unit='$i' and subId='$sub'");
					foreach ($que->result() as $rw) {
						if($rw->large<$k)
						{
							if($rw->large==0)
							{
								$tno=$tno-$rno;
								$i++;
							}
							else if($flag==1)
							{
								$min=$k-$rw->large;
								$tno=$tno-$min;
								$k=$rw->large;
								$flag=0;
							}
						}
					}
					if($row->unit == $i)
					{
						while($tmp>0) 
						{
							$data=$this->db->query("SELECT mcqId FROM testmcq where mcqId='$row->mcqId' and test_id='$tid'");	
							if($data->num_rows()==0)
							{
								$flag1=0;
								$tid--;
								$tmp--;
							}
							else
							{
								$flag1=1;
								break;
							}
						}
						if($flag1==0)
						{
							$this->db->set('mcqId',$no);
							$this->db->set('test_id',$test_id);
							$this->db->insert('testmcq');
							$tno--;
							/*$count=$count+1;*/
							$k--;
							if($k==0)
							{
								$i++;
								$k=$rno;
							}			
						}
					}
				}
			}	
		}	
	}
			
	function getunit($sub)
	{
		$data=$this->db->query("SELECT * from units where subId='$sub'");	
		return $data->result();
	}
	function deleteunit()
	{
		$unit=$this->input->post("unit");
		$subject=$this->input->post("subject");
		$this->db->where('unit',$unit);
		$this->db->where('subId',$subject);
		$this->db->delete('questions');

		$this->db->where('unitName',$unit);
		$this->db->where('subId',$subject);
		$this->db->delete('units');
	}
	function select()
	{
		$this->db->order_by('mcqId', 'DESC');
		$query = $this->db->get('questions');
		return $query;
	}

	function insert($data)
	{
		$this->db->insert_batch('questions', $data);
		return $this->db->insert_id();
	}

	function get_count()
	{
		
		return $this->db->count_all('questions');	
	}
	public function addnewtest($tname)
	{
		//print_r($options["subject"]);
		$crid=$this->session->userdata('uid');
		$sub=$this->session->userdata('subject');
		$this->db->set('test_name',strip_tags($tname));	
		$this->db->set('subId',strip_tags($sub));
		$this->db->set('create_id',strip_tags($crid));
		$this->db->insert('test_master');
		
		$data=$this->db->query("select test_id from test_master where test_name='$tname' and subId='$sub'");
	
		return $data->result();

	}
	public function allmcqs($unit)
	{	
		$test_id=$this->session->userdata('test_id');
		$sub=$this->session->userdata('subject');
		$data=$this->db->query("SELECT * from questions WHERE unit='$unit' and subId='$sub' and mcqId not IN (SELECT mcqId FROM testmcq where test_id='$test_id')");
		$no=1;
		$output='<thead class="text-primary"><th>srno</th><th>Questions</th><th>Answer</th><th>Add</th></thead>';
		foreach($data->result() as $row)
	  	{
                          
	   		$output.= ' <tbody><tr><td>'.$no.'</td><td>'.$row->question.'</td><td>'.$row->answer.'</td><td><a href="http://localhost/templet/index.php/Mcq_controller/add/'.$row->mcqId.'">Add</a></td></tr> </tbody>';
	   		$no++;
	  	}

		return $output;	
	}
	public function deletemcq($mcqid)
	{
		$this->db->where('mcqId',$mcqid);
		$this->db->delete('testmcq');
		$this->db->where('mcqId',$mcqid);
		return $this->db->delete('questions');
	}
	public function mcqs($sub,$unit)
	{
		$this->db->where('subId',$sub);
		$this->db->where('unit',$unit);
		$data=$this->db->get('questions');
		
		return $data->result();
	}
	public function add($mcqId)
	{
		$this->db->set('mcqId',$mcqId);
		//$this->db->set('createby',$this->session->userdata('uid'));
		$this->db->set('test_id',$this->session->userdata('test_id'));
		$this->db->insert('testmcq');	
		return $this->db->insert_id();
	}
	public function showmcqs($test_id)
	{
		$data=$this->db->query("SELECT * from questions WHERE mcqId IN (SELECT mcqId FROM testmcq where test_id='$test_id')");
		return $data->result();	
	}
	public function addsub()
	{
		$this->db->set('sub_name',$this->input->post('txtsubname'));
		$this->db->insert('subject');
		return $this->db->insert_id();
	}
	public function removemcq($mcqId)
	{	//print_r($test_id);
		$this->db->where('mcqId',$mcqId);
		return $this->db->delete('testmcq');
	}
	public function groups()
	{
		$data=$this->db->query("SELECT * from subject");
		return $data->result();
	}
	public function alltest($sub)
	{
		$crid=$this->session->userdata('uid');
		$data=$this->db->query("SELECT * from test_master where subId='$sub' and create_id='$crid'");
		return $data->result();
	}
	public function testname($test_id)
	{
		$data=$this->db->query("select test_name from test_master where test_id=$test_id");
		return $data->result();
	}
	
 } 
?>
