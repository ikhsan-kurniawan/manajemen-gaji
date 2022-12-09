<?php
if($this->session->userdata('status') != "login_ci"){
	redirect(base_url("index.php/login"));
}
?>