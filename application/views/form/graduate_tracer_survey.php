<div class="content">
<form class="form-horizontal" id="graduate_tracer_survey_form" method="POST">
    <div class="row" style="display: none">
    	<div class="col-md-12" id="error_list">
            <ul></ul>
        </div>
    </div>
    <div id="view_1">
        <div class="row group-header">
            General Information
        </div>
    	<div class="form-group">
            <label for="last_name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-8">
                <input type="text" name="LastName" class="form-control" id="last_name" maxlength="50" placeholder="Last name" required>
            </div>
    	</div>
        <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-8">
                <input type="text" name="FirstName" class="form-control" id="first_name" maxlength="50" placeholder="First name" required>
            </div>
    	</div>
        <div class="form-group">
            <label for="middle_name" class="col-sm-2 control-label">Middle Name</label>
            <div class="col-sm-8">
                <input type="text" name="MiddleName" class="form-control" id="middle_name" maxlength="50" placeholder="Middle name" required>
            </div>
    	</div>
        <div class="form-group">
            <label for="last_name_01" class="col-sm-2 control-label">Maiden Last Name</label>
            <div class="col-sm-8">
                <input type="text" name="LastName01" class="form-control" id="last_name_01" maxlength="50" placeholder="Maiden last name">
            </div>
    	</div>
        <div class="form-group">
            <label for="extension_name" class="col-sm-2 control-label">Name Suffix</label>
            <div class="col-sm-3">
                <input type="text" name="ExtensionName" class="form-control" id="extension_name" maxlength="3" placeholder="Name suffix">
            </div>
    	</div>
    	<div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-8">
                <input type="text" name="Address" class="form-control" id="address" placeholder="Address">
            </div>
    	</div>
    	<div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input type="email" name="EmailAddress" class="form-control" id="email" placeholder="Email">
            </div>
    	</div>
        <div class="form-group">
            <label for="telephone_number" class="col-sm-2 control-label">Telephone Number</label>
            <div class="col-sm-5">
                <input type="tel" name="TelephoneNo" class="form-control" id="telephone_number" placeholder="Telephone number">
            </div>
    	</div>
        <div class="form-group">
            <label for="cellphone_no" class="col-sm-2 control-label">Cellphone Number</label>
            <div class="col-sm-5">
                <input type="tel" name="CellphoneNo" class="form-control" id="cellphone_no" placeholder="Cellphone number">
            </div>
    	</div>
    	<div class="form-group">
            <label for="civil_status" class="col-sm-2 control-label">Civil Status</label>
            <div class="col-sm-3">
                <select name="CivilStatus" class="form-control" id="civil_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Separated/Divorced">Separated/Divorced</option>
                    <option value="Single Parent">Single Parent</option>
                    <option value="Widow or Widower">Widow or Widower</option>
                </select>
            </div>
    	</div>
    	<div class="form-group">
            <label for="sex" class="col-sm-2 control-label">Sex</label>
            <div class="col-sm-3">
                <select name="Sex" class="form-control" id="sex">
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
            </div>
    	</div>
    	<div class="form-group">
            <label for="birthdate" class="col-sm-2 control-label">Birth date</label>
            <div class="col-md-5">
                <div class='input-group date datetime-picker' data-date-format="YYYY/MM/DD">
                    <input type='text' name="BirthDate" class="form-control input-group-child" id="birthdate" placeholder="Birhtdate">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                </div>
            </div>
    	</div>
    	<div class="form-group">
            <label for="region" class="col-sm-2 control-label">Region</label>
            <div class="col-sm-5">
                <select name="RegionOfOrigin" class="form-control" id="region">
                    <option value="R1">Region 1</option>
                    <option value="R2">Region 2</option>
                    <option value="R3">Region 3</option>
                    <option value="R4">Region 4</option>
                    <option value="R5">Region 5</option>
                    <option value="R6">Region 6</option>
                    <option value="R7">Region 7</option>
                    <option value="R8">Region 8</option>
                    <option value="R9">Region 9</option>
                    <option value="R10">Region 10</option>
                    <option value="R11">Region 11</option>
                    <option value="R12">Region 12</option>
                    <option value="NCR">National Capital Region</option>
                    <option value="CAR">Cordillera Administrative Region</option>
                    <option value="ARMM">Autonomous Region of Muslim Mindanao</option>
                    <option value="CARAGA">CARAGA</option>
                </select>
            </div>
    	</div>
    	<div class="form-group">
            <label for="province" class="col-sm-2 control-label">Province</label>
            <div class="col-sm-5">
                <input type="text" name="Province" class="form-control" id="province" placeholder="Province">
            </div>
    	</div>
    	<div class="form-group">
            <label class="col-sm-2 control-label">Location of Residence</label>
            <div class="col-sm-5">
                <label class="radio-inline">
                    <input type="radio" name="LocationOfResidence" value="1" checked> City
                </label>
                <label class="radio-inline">
                    <input type="radio" name="LocationOfResidence" value="0"> Municipality
                </label>
            </div>
    	</div>
        <div class="form-group text-center">
            <button class="btn btn-success next-btn" title="Next"><span class="glyphicon glyphicon-chevron-right"></span></button>
        </div>
    </div>
    <div id="view_2">
        <div class="row group-header">Educational Background</div>
        <div class="form-group">
            <label for="person_name" class="col-sm-12">
                Educational Attainment (Baccalaureate Degree Only)
                <a href="#" data-toggle="tooltip" data-placement="right" title="
                   <ul>
                      <li>Degree means Program of Study or Program of Discipline, example <i>BS in Teacher Education</i></li>
                      <li>Specialization means major field in study, example <i>Mathematics</i></i></li>
                      <li>Honor or Awards means academic awards received in college or while earning the degree</li>
                  </ul>
                "><span class="glyphicon glyphicon-question-sign"></span></a>
            </label>
            <div class="fields col-sm-12">
                <div class="fields_0 form-group">
                    <div class="col-sm-10">
                        <input type="text" name="EducationDegree[]" class="form-control" placeholder="Degree and specialization">
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="School[]" class="form-control" placeholder="College or university">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="YearGraduated[]" class="datepicker year-only form-control" data-date-format="yyyy" placeholder="Year graduated">
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="HonorsReceived[]" class="form-control" placeholder="Honor or Awards received">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right">
                <button class="btn btn-default add-field" title="Add"><span class="glyphicon glyphicon-plus"></span></button>
                <button class="btn btn-default remove-field" title="Remove"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
    	</div>
        <div class="form-group">
            <label class="col-sm-12">Professional Examination(s) Passed</label>
            <label for="exam_name" class="col-sm-6">Name of Examination</label>
            <label for="exam_date" class="col-sm-3">Date Taken</label>
            <label for="exam_rating" class="col-sm-3">Rating</label>
            <div class="fields col-sm-12">
                <div class="fields_0 form-group">
                    <div class="col-sm-6">
                        <input type="text" name="ExaminationName[]" class="form-control" placeholder="Name of Examination">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="ExaminationDate[]" class="datepicker form-control" data-date-format="dd/mm/yyyy" placeholder="Date taken">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="ExaminationRating[]" class="form-control" placeholder="Rating">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right">
                <button class="btn btn-default add-field" title="Add"><span class="glyphicon glyphicon-plus"></span></button>
                <button class="btn btn-default remove-field" title="Remove"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
    	</div>
        <div class="form-group" id="item_14">
            <div class="row">
                <label class="col-sm-12">
                    Reason(s) for taking course(s) or pursuing degree(s)
                    <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
                        <span class="glyphicon glyphicon-question-sign"></span>
                    </a>
                </label>
            </div>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-3">
                    <label>Undergraduate/AB/BS</label>
                </div>
                <div class="col-sm-3">
                    <label>Graduate/MS/MA/PhD</label>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">High grades in the course or subject area(s) related to the course.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[1][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[1][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Good grades in high school.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[2][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[2][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Influence of parents or relatives.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[3][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[3][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Peer influence.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[4][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[4][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Inspired by a role model.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[5][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[5][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Strong passion for the profession.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[6][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[6][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Prospect for immediate employment.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[7][0]" value="7">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[7][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Status or prestige of the profession.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[8][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[8][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Availability of course offering in chosen institution.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[9][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[9][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Prospect of career advancement.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[10][0]" value="10">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[10][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Affordable for the family.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[11][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[11][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Prospect of attractive compensation.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[12][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[12][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">Opportunity for employment abroad.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[13][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[13][1]" value="1">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">No particular choice or no better idea.</div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[14][0]" value="1">
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="ReasonDetailId[14][1]" value="1">
                </div>
            </div>
            <div class="form-group row">
                <div for="other_reason" class="col-sm-12">Others</div>
                <div class="col-sm-12">
                    <input type="text" name="ReasonDetailId[0]" class="form-control optional" id="other_reason" placeholder="Please specify">
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success prev-btn" title="Previous"><span class="glyphicon glyphicon-chevron-left"></span></button>
            <button class="btn btn-success next-btn" title="Next"><span class="glyphicon glyphicon-chevron-right"></span></button>
        </div>
    </div>
    <div id="view_3">
        <div class="row group-header">Training(s) / Advance Studies After College</div>
        <div class="form-group">
            <label class="col-sm-12">Please list down all professional or work-related training program(s) including advance studies you have</label>
            <label for="training_title" class="col-sm-4">Tittle of Training or Advance Study</label>
            <label for="training_duration" class="col-sm-2">Duration</label>
            <label for="training_duration" class="col-sm-2">Credits Earned</label>
            <label for="training_institution" class="col-sm-4">Name of Training Institution/College/University</label>
            <div class="fields col-sm-12">
                <div class="fields_0 form-group">
                    <div class="col-sm-4">
                        <input type="text" name="TrainingName[]" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="Duration[]" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="CreditsEarned[]" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="TrainingInstitution[]" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right">
                <button class="btn btn-default add-field" title="Add"><span class="glyphicon glyphicon-plus"></span></button>
                <button class="btn btn-default remove-field" title="Remove"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
    	</div>
        <div class="form-group">
            <label for="item_15b" class="col-sm-12">What made you pursue advance studies?</label>
            <div class="col-sm-4">
                <select name="AdvanceStudyName" class="form-control" id="item_15b">
                    <option value="1">For promotion</option>
                    <option value="2">For professional development</option>
                    <option value="-1">Others</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <div class="col-sm-4">
                <textarea name="item_15b['others']" class="form-control optional" id="item_15b_extra" rows="5" placeholder="Please specify..."></textarea>
            </div>
    	</div>
        <div class="form-group text-center">
            <button class="btn btn-success prev-btn" title="Previous"><span class="glyphicon glyphicon-chevron-left"></span></button>
            <button class="btn btn-success next-btn" title="Next"><span class="glyphicon glyphicon-chevron-right"></span></button>
        </div>
    </div>
    <div id="view_4">
        <div class="row group-header">Employment Data</div>
        <div class="form-group">
            <label class="col-sm-3">Are you presently employed?</label>
            <label class="radio-inline">
                <input type="radio" name="item_16" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="item_16" value="0"> No
            </label>
            <label class="radio-inline">
                <input type="radio" name="item_16" value="-1"> Never Employed
            </label>
        </div>
        <div class="form-group">
            <label class="col-sm-12">
                Please state reason(s) why you are not yet employed.
                <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>
            </label>
            <div class="checkbox col-sm-6">
                <label class="col-sm-6">
                    <input type="checkbox" name="NoEmployedDetailId[]" value="0"> Advance or further study
                </label>
            </div>
            <div class="checkbox col-sm-6">
                <label class="col-sm-6">
                    <input type="checkbox" name="NoEmployedDetailId[]" value="1"> Family concern and decided not to find a job
                </label>
            </div>
            <div class="checkbox col-sm-6">
                <label class="col-sm-6">
                    <input type="checkbox" name="NoEmployedDetailId[]" value="2"> Health-related reason(s)
                </label>
            </div>
            <div class="checkbox col-sm-6">
                <label class="col-sm-6">
                    <input type="checkbox" name="NoEmployedDetailId[]" value="3"> Lack of work experience
                </label>
            </div>
            <div class="checkbox col-sm-6">
                <label class="col-sm-6">
                    <input type="checkbox" name="NoEmployedDetailId[]" value="4"> No job opportunity
                </label>
            </div>
            <div class="checkbox col-sm-6">
                <label class="col-sm-6">
                    <input type="checkbox" name="NoEmployedDetailId[]" value="5"> Did not look for a job
                </label>
            </div>
            <div for="item_17_extra" class="col-sm-12">Other reason(s)</div>
            <div class="col-sm-12">
                <input type="text" name="item_17['others']" class="form-control optional" id="item_17_extra" placeholder="Please specify">
            </div>
        </div>
        <div class="form-group">
            <label for="item_18" class="col-sm-12">Present Employment Status</label>
            <div class="col-sm-5">
                <select name="item_18[]" class="form-control" id="item_18">
                    <option value="1">Regular or Permanent</option>
                    <option value="2">Contractual</option>
                    <option value="3">Temporary</option>
                    <option value="-1">Self-employed</option>
                    <option value="5">Casual</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="item_18_extra" class="col-sm-12">If self-employed, what skills acquired in college were you able to apply in your work?</label>
            <div class="col-sm-12">
                <input type="text" name="item_18['extra']" class="form-control" id="item_18_extra">
            </div>
        </div>
        <div class="form-group">
            <label for="present_occupation" class="col-sm-12">Present Occupation</label>
            <div class="col-sm-12">
                <select name="present_occupation" class="form-control" id="present_occupation">
                    <option value="1">Officials of Government and Special-Interest Organizations, Corporate Executives, Managers, Managing</option>
                    <option value="2">Proprietors and Supervisors</option>
                    <option value="3">Professionals</option>
                    <option value="4">Technicians and Associate Professionals</option>
                    <option value="5">Clerks</option>
                    <option value="6">Service Workers and Shop and Market Sales Worker</option>
                    <option value="7">Farmers, Forestry Workers and Fishermen</option>
                    <option value="8">Trades and Related Workers</option>
                    <option value="9">Plant and Machine Operators and Assemblers</option>
                    <option value="10">Laborers and Unskilled Workers</option>
                    <option value="11">Special Occupation</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="item_20a" class="col-sm-12">Name of Company or Organization including address</label>
            <div class="col-sm-12">
                <input type="text" name="item_20a" class="form-control" id="item_20a">
            </div>
    	</div>
        <div class="form-group">
            <label for="item_20b" class="col-sm-12">Major line of business of the company you are presently employed in.</label>
            <div class="col-sm-12">
                <select name="item_20b" class="form-control" id="item_20b">
                    <option value="1">Agriculture, Hunting and Forestry</option>
                    <option value="2">Fishing</option>
                    <option value="3">Mining and Quarrying</option>
                    <option value="4">Manufacturing</option>
                    <option value="5">Electricity, Gas and Water Supply</option>
                    <option value="6">Construction</option>
                    <option value="7">Wholesale and Retail Trade, repair of motor vehicles, motorcycles and personal and household goods</option>
                    <option value="8">Hotel and Restaurants</option>
                    <option value="9">Transport Storage and Communication</option>
                    <option value="10">Financial Intermediation</option>
                    <option value="11">Real Estate, Renting and Business Activities</option>
                    <option value="12">Public Administration and Defense; Compulsory Social Security</option>
                    <option value="13">Education</option>
                    <option value="14">Health and Social Work</option>
                    <option value="15">Other Community, Social and Personal Service Activities</option>
                    <option value="16">Private Households with Employed Persons</option>
                    <option value="17">Extra-territorial Organization and Bodies</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <label class="col-sm-3">Place of work</label>
            <label class="radio-inline">
                <input type="radio" name="item_21" value="0" checked> Local
            </label>
            <label class="radio-inline">
                <input type="radio" name="item_21" value="1"> Abroad
            </label>
        </div>
        <div class="form-group">
            <label class="col-sm-3">Is this your first job after college?</label>
            <label class="radio-inline">
                <input type="radio" name="item_22" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="item_22" value="0"> No
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
                    <input type="checkbox" name="item_23[]" value="0"> Salaries and benefits
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_23[]" value="0"> Career challenge
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_23[]" value="0"> Related to special skill
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_23[]" value="0"> Related to course or program of study
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_23[]" value="0"> Proximity to residence
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_23[]" value="0"> Peer influence
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_23[]" value="0"> Family influence
                </label>
            </div>
            <div class="col-sm-12">
                <div for="item_23_extra" class="col-sm-12">Other reason(s)</div>
                <div class="col-sm-12">
                    <input type="text" name="item_23['others']" class="form-control optional" id="item_23_extra" placeholder="Please specify">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3">Is this your first job related to the course you took up in college?</label>
            <label class="radio-inline">
                <input type="radio" name="item_24" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="item_24" value="0"> No
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
                    <input type="checkbox" name="item_25[]" value="0"> Salaries and benefits
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_25[]" value="0"> Career challenge
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_25[]" value="0"> Related to special skill
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_25[]" value="0"> Proximity to residence
                </label>
            </div>
            <div class="col-sm-12">
                <div for="item_25_extra" class="col-sm-12">Other reason(s)</div>
                <div class="col-sm-12">
                    <input type="text" name="item_25['others']" class="form-control optional" id="item_25_extra" placeholder="Please specify">
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
                    <input type="checkbox" name="item_26[]" value="1"> Salaries and benefits
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_26[]" value="2"> Career challenge
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_26[]" value="3"> Related to special skill
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="item_26[]" value="4"> Proximity to residence
                </label>
            </div>
            <div class="col-sm-12">
                <div for="item_26_extra" class="col-sm-12">Other reason(s)</div>
                <div class="col-sm-12">
                    <input type="text" name="item_26['others']" class="form-control optional" id="item_26_extra" placeholder="Please specify">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="item_27" class="col-sm-12">How long did you stay in your first job?</label>
            <div class="col-sm-4">
                <select name="item_27[]" class="form-control" id="item_27">
                    <option value="0">Less than a month</option>
                    <option value="1">1 to 6 months</option>
                    <option value="2">7 to 11 months</option>
                    <option value="3">1 year to less than 2 years</option>
                    <option value="4">2 years to less than 3 years</option>
                    <option value="5">3 years to less than 4 years</option>
                    <option value="-1">Others</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <div class="col-sm-4">
                <input type="text" name="item_27['others']" class="form-control optional" id="item_27_extra" placeholder="Please specify">
            </div>
    	</div>
        <div class="form-group">
            <label for="item_28" class="col-sm-12">How did you find your first job?</label>
            <div class="col-sm-4">
                <select name="item_28[]" class="form-control" id="item_28">
                    <option value="0">Response to an advertisement</option>
                    <option value="1">As walk-in applicant</option>
                    <option value="2">Recommended by someone</option>
                    <option value="3">Information from friends</option>
                    <option value="4">Arranged by school's job placement officer</option>
                    <option value="5">Family business</option>
                    <option value="5">Job Fair or Public Employment Service Office (PESO)</option>
                    <option value="-1">Others</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <div class="col-sm-4">
                <input type="text" name="item_28['others']" class="form-control optional" id="item_28_extra" placeholder="Please specify">
            </div>
    	</div>
        <div class="form-group">
            <label for="item_29" class="col-sm-12">How long did it take to land your first job?</label>
            <div class="col-sm-4">
                <select name="item_29[]" class="form-control" id="item_29">
                    <option value="0">Less than a month</option>
                    <option value="1">1 to 6 months</option>
                    <option value="2">7 to 11 months</option>
                    <option value="3">1 year to less than 2 years</option>
                    <option value="4">2 years to less than 3 years</option>
                    <option value="5">3 years to less than 4 years</option>
                    <option value="-1">Others</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <div class="col-sm-4">
                <input type="text" name="item_29['others']" class="form-control optional" id="item_29_extra" placeholder="Please specify">
            </div>
    	</div>
        <div class="form-group">
            <label class="col-sm-12">Job Level Position</label>
            <label for="first_job_position" class="col-sm-6">First Job</label>
            <label for="current_job_position" class="col-sm-6">Current or Present Job</label>
            <div class="col-sm-6">
                <select name="first_job_position" class="form-control" id="first_job_position">
                    <option value="0">Rank or Clerical</option>
                    <option value="1">Professional, Technical or Supervisory</option>
                    <option value="2">Managerial or Executive</option>
                    <option value="3">Self-employed</option>
                </select>
            </div>
            <div class="col-sm-6">
                <select name="current_job_position" class="form-control" id="current_job_position">
                    <option value="0">Rank or Clerical</option>
                    <option value="1">Professional, Technical or Supervisory</option>
                    <option value="2">Managerial or Executive</option>
                    <option value="3">Self-employed</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <label for="monthly_earnings" class="col-sm-12">What is your initial gross monthly earning in your first job after college?</label>
            <div class="col-sm-12">
                <select name="monthly_earnings" class="form-control" id="monthly_earnings">
                    <option value="-5">Below P5,000.00</option>
                    <option value="5">P5,000.00 to less than P10,000.00</option>
                    <option value="10">P10,000.00 to less than P15,000.00</option>
                    <option value="15">P15,000.00 to less than P20,000.00</option>
                    <option value="20">P20,000.00 to less than P25,000.00</option>
                    <option value="25">P25,000.00 and above</option>
                </select>
            </div>
    	</div>
        <div class="form-group">
            <label class="col-sm-5">Was the curriculum you had in college relevant to you first job?</label>
            <label class="radio-inline">
                <input type="radio" name="curriculum_relevance" value="1" checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="curriculum_relevance" value="0"> No
            </label>
        </div>
        <div class="form-group">
            <label class="col-sm-12">
                If YES, what competencies learned in college did you find very useful in you first job?
                <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
                    <span class="glyphicon glyphicon-question-sign"></span>
                </a>
            </label>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="skills[]" value="0"> Communication Skills
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="skills[]" value="1"> Human Relations Skills
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="skills[]" value="2"> Entrepreneurial Skills
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="skills[]" value="3"> Information Technology Skills
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="skills[]" value="4">Problem-solving Skills
                </label>
            </div>
            <div class="checkbox col-sm-12">
                <label class="col-sm-6">
                    <input type="checkbox" name="skills[]" value="5"> Critical Thinking Skills
                </label>
            </div>
            <div class="col-sm-12">
                <div for="skills_extra" class="col-sm-12">Other skills</div>
                <div class="col-sm-12">
                    <input type="text" name="skills['others']" class="form-control optional" id="skills_extra" placeholder="Please specify">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="suggestions" class="col-sm-12">List down suggestions to further improve your course curriculum.</label>
            <div class="col-sm-12">
                <textarea name="suggestions" class="form-control" id="suggestions" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="finish-btn">Finish</button>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success prev-btn" title="Previous"><span class="glyphicon glyphicon-chevron-left"></span></button>
        </div>
    </div>
</form>
</div>
