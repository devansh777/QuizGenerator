<body>
	<h3>Question Paper</h3>
  <?php 
    if(!empty($result))
  {?>              
  <table>     
	    
    <?php $no=1; 
    $ans;
$fname=$this->session->userdata('tname');
    foreach ($result as $row) { 
    if($row->answer=='A'){$ans=$row->optionA;}
    if($row->answer=='B'){$ans=$row->optionB;}
    if($row->answer=='C'){$ans=$row->optionC;}
    if($row->answer=='D'){$ans=$row->optionD;}
    echo "
    <tr>
      <td colspan='2'> $no) $row->question</td>
    </tr>
    <tr>
      <td>(A).$row->optionA</td>
      <td>(B).$row->optionB</td>
    </tr>
    <tr>
      <td>(C).$row->optionC</td>
      <td>(D).$row->optionD</td>
    </tr>
        <br>";
      $no++;?>
      <?php }} ?>
    </table>
  </form>
<?php
    header("Content-Type: application/vnd.ms-word");
    header("Expires: 0");
    header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
    header("Content-disposition: attachment; filename=\"$fname.doc\"");
?>
