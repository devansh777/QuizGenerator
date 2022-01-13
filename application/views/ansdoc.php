<body>
	<h3>Answer Key</h3>

  <?php 
    if(!empty($result))
  {?>   
	           
  <table>          
    <?php $no=1;
	$fname=$this->session->userdata('tname'); 
    $ans;
    foreach ($result as $row) { 
    
    echo "
    <tr>
      <td> $no- $row->answer</td>
    </tr>
    ";
      $no++;?>
      <?php }} ?>
    </table>
  </form>
<?php
    header("Content-Type: application/vnd.ms-word");
    header("Expires: 0");
    header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
    header("Content-disposition: attachment; filename=\"anskey_$fname.doc\"");
?>
