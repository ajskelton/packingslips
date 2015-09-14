<?php 
$this->session->set_userdata('referred_from', current_url());
if($this->session->flashdata('msg') != '' ):
	echo $this->session->flashdata('msg');
endif; 
?>