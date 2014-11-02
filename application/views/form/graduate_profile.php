<?php
$_lname = $this->input->post('LastName') ? $this->input->post('LastName') : set_value('LastName');
$_fname = $this->input->post('FirstName') ? $this->input->post('FirstName') : set_value('FirstName');
$_mname = $this->input->post('MiddleName') ? $this->input->post('MiddleName') : set_value('MiddleName');
$_lname01 = $this->input->post('LastName01') ? $this->input->post('LastName01') : set_value('LastName01');
$_extname = $this->input->post('ExtensionName') ? $this->input->post('ExtensionName') : set_value('ExtensionName');
$_add = $this->input->post('Address') ? $this->input->post('Address') : set_value('Address');
$_cstatus = $this->input->post('CivilStatus') ? $this->input->post('CivilStatus') : set_value('CivilStatus');
$_sex = $this->input->post('Sex') != NULL ? $this->input->post('Sex') : set_value('Sex');
$_bdate = $this->input->post('BirthDate') ? $this->input->post('BirthDate') : set_value('BirthDate');
$_region = $this->input->post('RegionOfOrigin') ? $this->input->post('RegionOfOrigin') : set_value('RegionOfOrigin');
$_prov = $this->input->post('Province') ? $this->input->post('Province') : set_value('Province');
$_loc = $this->input->post('LocationOfResidence') != NULL ? $this->input->post('LocationOfResidence') : set_value('LocationOfResidence');
$_telno = $this->input->post('TelephoneNo') ? $this->input->post('TelephoneNo') : set_value('TelephoneNo');
$_cellno = $this->input->post('CellphoneNo') ? $this->input->post('CellphoneNo') : set_value('CellphoneNo');
$_college = $this->input->post('College') ? $this->input->post('College') : set_value('College');
$_department = $this->input->post('Department') ? $this->input->post('Department') : set_value('Department');
$_year_graduated = $this->input->post('YearGraduated') ? $this->input->post('YearGraduated') : set_value('YearGraduated');

$form = array(
    'class'     => 'form-horizontal',
    'id'        => 'graduate-profile-form'
);
$label = array(
    'class'     => 'col-sm-3 my-label'
);
$lastname = array(
    'name'	=> 'LastName',
    'class'     => 'form-control',
    'id'	=> 'LastName',
    'maxlength'	=> 50,
    'value'     => $_lname,
);
$firstname = array(
    'name'	=> 'FirstName',
    'class'     => 'form-control',
    'id'	=> 'FirstName',
    'maxlength'	=> 50,
    'value'     => $_fname,
);
$middlename = array(
    'name'	=> 'MiddleName',
    'class'     => 'form-control',
    'id'	=> 'MiddleName',
    'maxlength'	=> 50,
    'value'     => $_mname,
);
$lastname01 = array(
    'name'	=> 'LastName01',
    'class'     => 'form-control',
    'id'	=> 'LastName01',
    'maxlength'	=> 50,
    'value'     => $_lname01,
);
$extension = array(
    'name'	=> 'ExtensionName',
    'class'     => 'form-control',
    'id'	=> 'ExtensionName',
    'maxlength'	=> 3,
    'value'     => $_extname,
);
$address = array(
    'name'	=> 'Address',
    'class'     => 'form-control',
    'id'	=> 'Address',
    'maxlength'	=> 200,
    'rows'       => 3,
    'value'     => $_add,
);
$civil_status = array(
    'name'	=> 'CivilStatus',
    'class'     => 'form-control',
    'id'	=> 'CivilStatus',
);
$civil_status_attr = 'class="form-control" id="CivilStatus"';
$civil_status_opt = array(
    'Single'                => 'Single',
    'Married'               => 'Married',
    'Separated/Divorced'    => 'Separated/Divorced',
    'Single Parent'         => 'Single Parent',
    'Widow or Widower'      => 'Widow or Widower',
);
$civil_status_val = $_cstatus;
$sex = array(
    'name'	=> 'Sex',
    'class'     => 'form-control',
    'id'	=> 'Sex',
);
$sex_attr = 'class="form-control" id="Sex"';
$sex_opt = array(
    1   => 'Male',
    0   => 'Female',
);
$sex_val = $_sex;
$birthdate = array(
    'name'              => 'BirthDate',
    'class'             => 'form-control datepicker',
    'id'                => 'BirthDate',
    'data-date-format'  => 'yyyy-mm-dd',
    'value'     => $_bdate,
);
$region = array(
    'name'	=> 'RegionOfOrigin',
    'class'     => 'form-control',
    'id'	=> 'RegionOfOrigin',
);
$region_attr = 'class="form-control" id="RegionOfOrigin"';
$region_opt = array(
    'Region 1' => 'Region 1',
    'Region 2' => 'Region 2',
    'Region 3' => 'Region 3',
    'Region 4' => 'Region 4',
    'Region 5' => 'Region 5',
    'Region 6' => 'Region 6',
    'Region 7' => 'Region 7',
    'Region 8' => 'Region 8',
    'Region 9' => 'Region 9',
    'Region 10' => 'Region 10',
    'Region 11' => 'Region 11',
    'Region 12' => 'Region 12',
    'NCR' => 'National Capital Region',
    'CAR' => 'Cordillera Administrative Region',
    'ARMM' => 'Autonomous Region of Muslim Mindanao',
    'CARAGA' => 'CARAGA',
);
$region_val = $_region;
$province = array(
    'name'	=> 'Province',
    'class'     => 'form-control',
    'id'	=> 'Province',
    'maxlength'	=> 100,
    'value'     => $_prov,
);
$location = array(
    'name' => 'LocationOfResidence',
    'class' => 'form-control',
    'id' => 'LocationOfResidence',
);
$location_attr = 'class="form-control" id="LocationOfResidence"';
$location_opt = array(
    1 => 'City',
    0 => 'Municipality'
);
$location_val = $_loc;
$telephone = array(
    'name'	=> 'TelephoneNo',
    'class'     => 'form-control',
    'id'	=> 'TelephoneNo',
    'maxlength'	=> 30,
    'value'     => $_telno,
);
$cellphone = array(
    'name'	=> 'CellphoneNo',
    'class'     => 'form-control',
    'id'	=> 'CellphoneNo',
    'maxlength'	=> 30,
    'value'     => $_cellno,
);
$college = array(
    'name'  => 'College',
    'class'     => 'form-control',
    'id'    => 'College',
    'maxlength' => 50,
    'value'     => $_college,
    'readonly' => ''
);
$department = array(
    'name'  => 'Department',
    'class'     => 'form-control',
    'id'    => 'Department',
    'maxlength' => 50,
    'value'     => $_department,
    'readonly' => ''
);
$year_graduated = array(
    'name'  => 'YearGraduated',
    'class'     => 'form-control',
    'id'    => 'YearGraduated',
    'maxlength' => 5,
    'value'     => $_year_graduated,
    'readonly' => ''
);
$submit = array(
    'name'	=> 'save_profile',
    'class'     => 'btn btn-primary',
    'id'	=> 'save_profile',
    'value'	=> 'Save Profile',
);
?>
<div class="content">
<?php echo form_open($this->uri->uri_string(), $form); ?>
<?php
if( ! empty($errors))
{
?>
<div class="form-group">
    <div class="col-sm-12">
        <div class="alert alert-danger">
            <ul>
                <?php echo $errors; ?>
            </ul>
        </div>
    </div>
</div>
<?php
}
?>
<div class="form-group">
    <?php echo form_label('Lastname', $lastname['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_input($lastname); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Firstname', $firstname['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_input($firstname); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Middlename', $middlename['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_input($middlename); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Maiden Lastname', $lastname01['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_input($lastname01); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Name Suffix', $extension['id'], $label); ?>
    <div class="col-sm-2"><?php echo form_input($extension); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Address', $address['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_textarea($address); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Civil Status', $civil_status['id'], $label); ?>
    <div class="col-sm-3"><?php echo form_dropdown($civil_status['name'],$civil_status_opt,$civil_status_val ? $civil_status_val : 'Single',$civil_status_attr); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Sex', $sex['id'], $label); ?>
    <div class="col-sm-3"><?php echo form_dropdown($sex['name'],$sex_opt,isset($sex_val) ? $sex_val : 1,$sex_attr); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Birthdate', $birthdate['id'], $label); ?>
    <div class="col-sm-3"><?php echo form_input($birthdate); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Region', $region['id'], $label); ?>
    <div class="col-sm-5"><?php echo form_dropdown($region['name'],$region_opt,$region_val ? $region_val : 'Region 12',$region_attr); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Province', $province['id'], $label); ?>
    <div class="col-sm-5"><?php echo form_input($province); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Location of Residence', $location['id'], $label); ?>
    <div class="col-sm-3"><?php echo form_dropdown($location['name'],$location_opt,isset($location_val) ? $location_val : 1,$location_attr); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Telephone Number', $telephone['id'], $label); ?>
    <div class="col-sm-5"><?php echo form_input($telephone); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Cellphone Number', $cellphone['id'], $label); ?>
    <div class="col-sm-5"><?php echo form_input($cellphone); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('College', $college['id'], $label); ?>
    <div class="col-sm-5"><?php echo form_input($college); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Department', $department['id'], $label); ?>
    <div class="col-sm-5"><?php echo form_input($department); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Year Graduated', $year_graduated['id'], $label); ?>
    <div class="col-sm-3"><?php echo form_input($year_graduated); ?></div>
</div>
<div class="form-group">
    <div class="col-sm-12 text-right"><?php echo form_submit($submit); ?></div>
</div>
<?php echo form_close(); ?>
</div>