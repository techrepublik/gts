<?php
$this->load->helper('form');
$attributes = array('class' => 'form-horizontal', 'id' => 'login');
echo form_open('user/validate', $attributes);
echo form_close();

