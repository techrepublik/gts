<form class="form-horizontal" id="manpower_profile_form" method="POST">
    <div class="row">
        <div id="error_list" class="col-md-12">
            <ul></ul>
        </div>
        <div class="col-md-2 col-md-push-10"><div class="id_picture" title=""></div></div>
        <div class="col-md-10 col-md-pull-2">
            <p id="intruction">In accomplishing this form, entries in <i>Italicized letters</i> are optional while the rest are mandatory or required information.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="by_tesda">
            <div class="row group-header"><label>To be accomplished by TESDA</label></div>
            <div class="form-group">
                <div class="col-md-3"><label class="control-label" for="nmis_mpwr_code">NMIS Manpower Code:</label></div>
                <div class="col-md-3"><input type="text" class="form-control" id="nmis_mpwr_code" name="nmis_mpwr_code" required /></div>
                <div class="col-md-3"><label class="control-label" for="nmis_entry_date">NMIS Entry Date:</label></div>
                <div class="col-md-3">
                    <div class='input-group date datetime-picker' data-date-format="YYYY/MM/DD">
                        <input type='text' id="nmis_entry_date" name="nmis_entry_date" class="form-control input-group-child" required />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="mpwr_pro">
            <div class="row group-header"><label>Manpower Profile</label></div>
            <div class="form-group">
                <div class="col-md-12"><label for="last_name">Name:</label></div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="last_name" placeholder="Last name" required />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="first_name" placeholder="First name" required />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="middle_name" placeholder="Middle name" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><label for="last_name">Mailing Address</label></div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="street" placeholder="Number, Street" required />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="barangay" placeholder="Barangay(Optional)" />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="district" placeholder="District" required />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="city" placeholder="City" required />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="province" placeholder="Province" required />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="region" placeholder="Region" required />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Zip Code(Optional)" max="4" />
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="po_box_no" id="po_box_no" placeholder="P.O. Box(Optional)" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3"><label class="control-label" for="gender">Gender:</label></div>
                <div class="col-md-3">
                    <select class="form-control" name="gender" required >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="col-md-3"><label class="control-label" for="civil_status">Civil Status:</label></div>
                <div class="col-md-3">
                    <select class="form-control" name="civil_status" required >
                        <option value="0">Single</option>
                        <option value="1">Married</option>
                        <option value="2">Widow / Widower</option>
                        <option value="3">Separated</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-6"><label for="add_contact"><i>Contact Info.(Optional):</i></label></div>
                        <div class="col-md-12 table-container">
                            <table id="contacts" class="table table-condensed table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2 btn-wrapper">
                            <button type="button" id="show_con_prop" class="btn btn-default" data-toggle="modal">Add</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="employment_type">
                        <div class="col-md-6"><label for="emp_type">Employment Type:</label></div>
                        <div class="col-md-6">
                            <select class="form-control" id="emp_type" name="emp_type" required >
                                <option value="1">Employed</option>
                                <option value="2">Self-employed</option>
                                <option value="3">Unemployed</option>
                                <option value="4">Undefined</option>
                                <option value="0">Pls. Specify</option>
                            </select>
                        </div>
                        <div class="conditional">
                            <div class="col-md-6 hidden-xs"></div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="spec_emp_type" placeholder="Employment Type" />
                            </div>
                        </div>
                        <div class="col-md-6 emp_status_g"><label for="emp_status"><i>Employment Status(Optional):</i></label></div>
                        <div class="col-md-6 emp_status_g">
                            <select class="form-control" name="emp_status" id="emp_status" required >
                                <option value="1">Casual</option>
                                <option value="2">Contractual</option>
                                <option value="3">Job Order</option>
                                <option value="4">Probationary</option>
                                <option value="5">Regular</option>
                                <option value="6">Permanent</option>
                                <option value="7">Trainee / OJT</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-12" id="psnl_info">
            <div class="row group-header"><label>Personal Information</label></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="birthdate">Birth date:</label></div>
                        <div class="col-md-7">
                            <div class='input-group date datetime-picker' data-date-format="YYYY/MM/DD">
                                <input type='text' id="birthdate" name="birthdate" class="form-control input-group-child" required />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="birthplace"><i>Birth Place:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="birthplace" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="citizenship"><i>Citizenship:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="citizenship" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="religion"><i>Religion:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="religion" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="ethnicity"><i>Ethnicity:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="ethnicity" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="disability"><i>Disability:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="disability" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="height"><i>Height:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="height" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="weight"><i>Weight:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="weight" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="eye_color"><i>Eye Color:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="eye_color" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="hair_color"><i>Hair Color:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="hair_color" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="blood_type"><i>Blood Type:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="blood_type" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="sss_no"><i>SSS No.:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="sss_no" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="gsis_no"><i>GSIS No.:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="gsis_no" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="tin"><i>TIN:</i></label></div>
                        <div class="col-md-7">
                            <input type='text' name="tin" class="form-control" placeholder="Optional" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="marks"><i>Distinguishing Marks:</i></label></div>
                        <div class="col-md-7">
                            <textarea class="form-control" name="marks" rows="3" placeholder="Optional" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="edu_bg">
            <div class="row group-header">
                <label>Educational Background (include the institution/school)</label>
            </div>
            <div class="row table-container">
                <table class="table table-condensed table-hover table-bordered" id="edu_bg_tbl">
                    <thead>
                        <tr>
                            <th>School</th>
                            <th>Educational Level</th>
                            <th>School Year</th>
                            <th>Degree</th>
                            <th>Minor</th>
                            <th>Major</th>
                            <th>Units Earned</th>
                            <th>Honors Received</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <button type="button" id="show_edu_bg" class="btn btn-default" data-toggle="modal">Add</button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row group-header"><label for="program_title">Course / Training Program Title</label></div>
            <div class="form-group">
                <textarea name="program_title" id="program_title" class="form-control" rows="3" required ></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-10"><label for="add_sched">Schedule</label></div>
                        <div class="col-md-1"><button type="button" id="add_sched" class="btn btn-default" data-toggle="modal">Add</button></div>
                    </div>
                    <div class="row table-container">
                        <table id="sched" class="table table-condensed table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>School Year</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-md-10"><label for="add_dur">For Training</label></div>
                        <div class="col-md-1"><button type="button" id="add_dur" class="btn btn-default" data-toggle="modal">Add</button></div>
                    </div>
                    <div class="row table-container">
                        <table id="training_dur" class="table table-condensed table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">DURATION (No. of training hours)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Date Start</td>
                                    <td id="cell_date_start"></td>
                                </tr>
                                <tr>
                                    <td>Date Finish</td>
                                    <td id="cell_date_finish"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary pull-right" id="add_mpwr_pro">Add</button>
        </div>
    </div>
</form>
