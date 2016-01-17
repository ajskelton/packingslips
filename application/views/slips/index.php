<div class="confirm-div"></div>
<?php

if($this->session->flashdata('msg') != '' ):
	echo $this->session->flashdata('msg');
endif; 
?>

<h2>Packing Slips</h2>
	<button href="<?php echo site_url('active/index'); ?>" class="btn btn-lg btn-primary btn-block">Active Slips</button>
	<button href="<?php echo site_url('slips/archive'); ?>" class="btn btn-lg btn-success btn-block">Archive Slips</button>