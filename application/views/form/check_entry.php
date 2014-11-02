<?php
$form = array(
    'class'     => 'form-horizontal',
    'id'        => 'check-entry-form'
);
$label = array(
    'class'     => 'col-sm-3 my-label'
);
$lastname = array(
    'name'	=> 'LastName',
    'class'     => 'form-control',
    'id'	=> 'LastName',
    'maxlength'	=> 50,
    'value'     => $this->input->post('LastName') ? $this->input->post('LastName') : set_value('LastName'),
);
$firstname = array(
    'name'	=> 'FirstName',
    'class'     => 'form-control',
    'id'	=> 'FirstName',
    'maxlength'	=> 50,
    'value'     => $this->input->post('FirstName') ? $this->input->post('FirstName') : set_value('FirstName'),
);
$yeargraduated = array(
    'name'              => 'YearGraduated',
    'class'             => 'form-control datepicker year-only',
    'id'                => 'YearGraduated',
    'value'     => $this->input->post('YearGraduated') ? $this->input->post('YearGraduated') : set_value('YearGraduated'),
);
$submit = array(
    'name'	=> 'check_entry',
    'class'     => 'btn btn-primary',
    'id'	=> 'check_entry',
    'value'	=> 'Check',
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
    <?php echo form_label('Last name', $lastname['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_input($lastname); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('First name', $firstname['id'], $label); ?>
    <div class="col-sm-9"><?php echo form_input($firstname); ?></div>
</div>
<div class="form-group">
    <?php echo form_label('Year Graduated', $yeargraduated['id'], $label); ?>
    <div class="col-sm-3"><?php echo form_input($yeargraduated); ?></div>
</div>
<div class="form-group">
    <div class="col-sm-12 text-right"><?php echo form_submit($submit); ?></div>
</div>
<?php echo form_close(); ?>
</div>