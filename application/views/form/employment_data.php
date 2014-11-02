<?php
$form = array(
    'class'     => 'form-horizontal',
    'id'        => 'employment-data-form'
);
$submit = array(
    'name'	=> 'save_employment_data',
    'class'     => 'btn btn-primary',
    'id'	=> 'save_employment_data',
    'value'	=> 'Save Data',
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
    <label class="col-sm-3">Are you presently employed?</label>
    <label class="radio-inline">
        <input type="radio" name="answers[6][17]" value="Yes"> Yes
    </label>
    <label class="radio-inline">
        <input type="radio" name="answers[6][17]" value="No"> No
    </label>
    <label class="radio-inline">
        <input type="radio" name="answers[6][17]" value="Never Employed"> Never Employed
    </label>
</div>
<div class="form-group" id="not_employed_reason" style="display: none">
    <label class="col-sm-12">
        Please state reason(s) why you are not yet employed.
        <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
            <span class="glyphicon glyphicon-question-sign"></span>
        </a>
    </label>
    <div class="checkbox col-sm-6">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[7][18][]" value="Advance or further study"> Advance or further study
        </label>
    </div>
    <div class="checkbox col-sm-6">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[7][18][]" value="Family concern and decided not to find a job"> Family concern and decided not to find a job
        </label>
    </div>
    <div class="checkbox col-sm-6">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[7][18][]" value="Health-related reason(s)"> Health-related reason(s)
        </label>
    </div>
    <div class="checkbox col-sm-6">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[7][18][]" value="Lack of work experience"> Lack of work experience
        </label>
    </div>
    <div class="checkbox col-sm-6">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[7][18][]" value="No job opportunity"> No job opportunity
        </label>
    </div>
    <div class="checkbox col-sm-6">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[7][18][]" value="Did not look for a job"> Did not look for a job
        </label>
    </div>
    <div for="item_17_extra" class="col-sm-12">Other reason(s)</div>
    <div class="col-sm-12">
        <input type="text" name="answers[7][18][]" class="form-control" placeholder="Please specify">
    </div>
</div>
<div class="form-group">
    <label for="item_18" class="col-sm-12">Present Employment Status</label>
    <div class="col-sm-5">
        <select name="answers[8][45]" class="form-control" id="item_18">
            <option value="Regular or Permanent">Regular or Permanent</option>
            <option value="Contractual">Contractual</option>
            <option value="Temporary">Temporary</option>
            <option value="Self-employed">Self-employed</option>
            <option value="Casual">Casual</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="item_18_extra" class="col-sm-12">If self-employed, what skills acquired in college were you able to apply in your work?</label>
    <div class="col-sm-12">
        <input type="text" name="answers[26][46]" class="form-control" id="item_18_extra">
    </div>
</div>
<div class="form-group">
    <label for="present_occupation" class="col-sm-12">Present Occupation</label>
    <div class="col-sm-12">
        <select name="answers[9][20]" class="form-control" id="present_occupation">
            <option value="Officials of Government and Special-Interest Organizations, Corporate Executives, Managers, Managing">Officials of Government and Special-Interest Organizations, Corporate Executives, Managers, Managing</option>
            <option value="Proprietors and Supervisors">Proprietors and Supervisors</option>
            <option value="Professionals">Professionals</option>
            <option value="Technicians and Associate Professionals">Technicians and Associate Professionals</option>
            <option value="Clerks">Clerks</option>
            <option value="Service Workers and Shop and Market Sales Worker">Service Workers and Shop and Market Sales Worker</option>
            <option value="Farmers, Forestry Workers and Fishermen">Farmers, Forestry Workers and Fishermen</option>
            <option value="Trades and Related Workers">Trades and Related Workers</option>
            <option value="Plant and Machine Operators and Assemblers">Plant and Machine Operators and Assemblers</option>
            <option value="Laborers and Unskilled Workers">Laborers and Unskilled Workers</option>
            <option value="Special Occupation">Special Occupation</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="item_20a" class="col-sm-12">Name of Company or Organization including address</label>
    <div class="col-sm-12">
        <input type="text" name="answers[10][21]" class="form-control" id="item_20a">
    </div>
</div>
<div class="form-group">
    <label for="item_20b" class="col-sm-12">Major line of business of the company you are presently employed in.</label>
    <div class="col-sm-12">
        <select name="answers[11][22]" class="form-control" id="item_20b">
            <option value="Agriculture, Hunting and Forestry">Agriculture, Hunting and Forestry</option>
            <option value="Fishing">Fishing</option>
            <option value="Mining and Quarrying">Mining and Quarrying</option>
            <option value="Manufacturing">Manufacturing</option>
            <option value="Electricity, Gas and Water Supply<">Electricity, Gas and Water Supply</option>
            <option value="Construction">Construction</option>
            <option value="Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods">Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods</option>
            <option value="Hotel and Restaurants">Hotel and Restaurants</option>
            <option value="Transport Storage and Communication">Transport Storage and Communication</option>
            <option value="Financial Intermediation">Financial Intermediation</option>
            <option value="Real Estate, Renting and Business Activities">Real Estate, Renting and Business Activities</option>
            <option value="Public Administration and Defense; Compulsory Social Security">Public Administration and Defense; Compulsory Social Security</option>
            <option value="Education">Education</option>
            <option value="Health and Social Work">Health and Social Work</option>
            <option value="Other Community, Social and Personal Service Activities">Other Community, Social and Personal Service Activities</option>
            <option value="Private Households with Employed Persons">Private Households with Employed Persons</option>
            <option value="Extra-territorial Organization and Bodies">Extra-territorial Organization and Bodies</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Place of work</label>
    <label class="radio-inline">
        <input type="radio" name="answers[12][23]" value="Local"> Local
    </label>
    <label class="radio-inline">
        <input type="radio" name="answers[12][23]" value="Abroad"> Abroad
    </label>
</div>
<div class="form-group">
    <label class="col-sm-3">Is this your first job after college?</label>
    <label class="radio-inline">
        <input type="radio" name="answers[13][24]" value="Yes"> Yes
    </label>
    <label class="radio-inline">
        <input type="radio" name="answers[13][24]" value="No"> No
    </label>
</div>
<div class="form-group">
    <label class="col-sm-12">
        What are you reason(s) for staying on the job?
        <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
            <span class="glyphicon glyphicon-question-sign"></span>
        </a>
    </label>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Salaries and benefits"> Salaries and benefits
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Career challenge"> Career challenge
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Related to special skill"> Related to special skill
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Related to course or program of study"> Related to course or program of study
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Proximity to residence"> Proximity to residence
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Peer influence"> Peer influence
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[14][25][]" value="Family influence"> Family influence
        </label>
    </div>
    <div class="col-sm-12">
        <div for="item_23_extra" class="col-sm-12">Other reason(s)</div>
        <div class="col-sm-12">
            <input type="text" name="answers[14][25][]" class="form-control" id="item_23_extra" placeholder="Please specify">
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3">Is this your first job related to the course you took up in college?</label>
    <label class="radio-inline">
        <input type="radio" name="answers[15][27]" value="Yes"> Yes
    </label>
    <label class="radio-inline">
        <input type="radio" name="answers[15][27]" value="No"> No
    </label>
</div>
<div class="form-group">
    <label class="col-sm-12">
        What were your reason(s) for accepting the job?
        <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
            <span class="glyphicon glyphicon-question-sign"></span>
        </a>
    </label>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[16][28][]" value="Salaries and benefits"> Salaries and benefits
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[16][28][]" value="Career challenge"> Career challenge
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[16][28][]" value="Related to special skill"> Related to special skill
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[16][28][]" value="Proximity to residence"> Proximity to residence
        </label>
    </div>
    <div class="col-sm-12">
        <div for="item_25_extra" class="col-sm-12">Other reason(s)</div>
        <div class="col-sm-12">
            <input type="text" name="answers[16][28][]" class="form-control" id="item_25_extra" placeholder="Please specify">
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-12">
        What were your reason(s) for changing job?
        <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
            <span class="glyphicon glyphicon-question-sign"></span>
        </a>
    </label>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[17][30][]" value="Salaries and benefits"> Salaries and benefits
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[17][30][]" value="Career challenge"> Career challenge
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[17][30][]" value="Related to special skill"> Related to special skill
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[17][30][]" value="Proximity to residence"> Proximity to residence
        </label>
    </div>
    <div class="col-sm-12">
        <div for="item_26_extra" class="col-sm-12">Other reason(s)</div>
        <div class="col-sm-12">
            <input type="text" name="answers[17][30][]" class="form-control" id="item_26_extra" placeholder="Please specify">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="item_27" class="col-sm-12">How long did you stay in your first job?</label>
    <div class="col-sm-4">
        <select class="form-control answer-selection" id="item_27" data-input-name="answers[18][32]">
            <option value="Less than a month">Less than a month</option>
            <option value="1 to 6 months">1 to 6 months</option>
            <option value="7 to 11 months">7 to 11 months</option>
            <option value="1 year to less than 2 years">1 year to less than 2 years</option>
            <option value="2 years to less than 3 years">2 years to less than 3 years</option>
            <option value="3 years to less than 4 years">3 years to less than 4 years</option>
            <option value="-1">Others</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4">
        <input type="text" name="answers[18][32]" class="form-control optional" id="item_27_extra" placeholder="Please specify">
    </div>
</div>
<div class="form-group">
    <label for="item_28" class="col-sm-12">How did you find your first job?</label>
    <div class="col-sm-4">
        <select class="form-control answer-selection" data-input-name="answers[19][34]" id="item_28">
            <option value="Response to an advertisement">Response to an advertisement</option>
            <option value="As walk-in applicant">As walk-in applicant</option>
            <option value="Recommended by someone">Recommended by someone</option>
            <option value="Information from friends">Information from friends</option>
            <option value="Arranged by school's job placement officer">Arranged by school's job placement officer</option>
            <option value="Family business">Family business</option>
            <option value="Job Fair or Public Employment Service Office (PESO)">Job Fair or Public Employment Service Office (PESO)</option>
            <option value="-1">Others</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4">
        <input type="text" name="answers[19][34]" class="form-control optional" id="item_28_extra" placeholder="Please specify">
    </div>
</div>
<div class="form-group">
    <label for="item_29" class="col-sm-12">How long did it take to land your first job?</label>
    <div class="col-sm-4">
        <select class="form-control answer-selection" data-input-name="answers[20][36]" id="item_29">
            <option value="Less than a month">Less than a month</option>
            <option value="1 to 6 months">1 to 6 months</option>
            <option value="7 to 11 months">7 to 11 months</option>
            <option value="1 year to less than 2 years">1 year to less than 2 years</option>
            <option value="2 years to less than 3 years">2 years to less than 3 years</option>
            <option value="3 years to less than 4 years">3 years to less than 4 years</option>
            <option value="-1">Others</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-4">
        <input type="text" name="answers[20][36]" class="form-control optional" id="item_29_extra" placeholder="Please specify">
    </div>
</div>
<div class="form-group">
    <label class="col-sm-12">Job Level Position</label>
    <label for="first_job_position" class="col-sm-6">First Job</label>
    <label for="current_job_position" class="col-sm-6">Current or Present Job</label>
    <div class="col-sm-6">
        <select name="answers[21][38]" class="form-control" id="first_job_position">
            <option value="Rank or Clerical">Rank or Clerical</option>
            <option value="Professional, Technical or Supervisory">Professional, Technical or Supervisory</option>
            <option value="Managerial or Executive">Managerial or Executive</option>
            <option value="Self-employed">Self-employed</option>
        </select>
    </div>
    <div class="col-sm-6">
        <select name="answers[21][39]" class="form-control" id="current_job_position">
            <option value="Rank or Clerical">Rank or Clerical</option>
            <option value="Professional, Technical or Supervisory">Professional, Technical or Supervisory</option>
            <option value="Managerial or Executive">Managerial or Executive</option>
            <option value="Self-employed">Self-employed</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="monthly_earnings" class="col-sm-12">What is your initial gross monthly earning in your first job after college?</label>
    <div class="col-sm-12">
        <select name="answers[22][40]" class="form-control" id="monthly_earnings">
            <option value="Below P5,000.00">Below P5,000.00</option>
            <option value="P5,000.00 to less than P10,000.00">P5,000.00 to less than P10,000.00</option>
            <option value="P10,000.00 to less than P15,000.00">P10,000.00 to less than P15,000.00</option>
            <option value="P15,000.00 to less than P20,000.00">P15,000.00 to less than P20,000.00</option>
            <option value="P20,000.00 to less than P25,000.00">P20,000.00 to less than P25,000.00</option>
            <option value="P25,000.00 and above">P25,000.00 and above</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-5">Was the curriculum you had in college relevant to you first job?</label>
    <label class="radio-inline">
        <input type="radio" name="answers[23][41]" value="Yes"> Yes
    </label>
    <label class="radio-inline">
        <input type="radio" name="answers[23][41]" value="No"> No
    </label>
</div>
<div class="form-group" id="competencies" style="display: none">
    <label class="col-sm-12">
        If YES, what competencies learned in college did you find very useful in you first job?
        <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
            <span class="glyphicon glyphicon-question-sign"></span>
        </a>
    </label>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[24][42][]" value="Communication Skills"> Communication Skills
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[24][42][]]" value="Human Relations Skills"> Human Relations Skills
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[24][42][]" value="Entrepreneurial Skills"> Entrepreneurial Skills
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[24][42][]" value="Information Technology Skills"> Information Technology Skills
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[24][42][]" value="Problem-solving Skills">Problem-solving Skills
        </label>
    </div>
    <div class="checkbox col-sm-12">
        <label class="col-sm-6">
            <input type="checkbox" name="answers[24][42][]" value="Critical Thinking Skills"> Critical Thinking Skills
        </label>
    </div>
    <div class="col-sm-12">
        <div for="skills_extra" class="col-sm-12">Other skills</div>
        <div class="col-sm-12">
            <input type="text" name="answers[24][42][]" class="form-control" id="skills_extra" placeholder="Please specify">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="suggestions" class="col-sm-12">List down suggestions to further improve your course curriculum.</label>
    <div class="col-sm-12">
        <textarea name="answers[25][44]" class="form-control" id="suggestions" rows="5"></textarea>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12 text-right"><?php echo form_submit($submit); ?></div>
</div>
<?php echo form_close(); ?>
</div>
