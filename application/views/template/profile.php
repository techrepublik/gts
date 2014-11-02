<?php
$picture = ! isset($profile->Picture) ? 'default-profile-image.png' : $profile->Picture;
$active_tab = empty($active_tab) ? 'profile' : $active_tab;
$collapsed = empty($collapsed) ? ($active_tab == 'edu' ? 'edu_attainment' : '') : $collapsed;
?>
<div class="content" id="profile-page">
    <div class="row">
        <div class="hidden-xs col-sm-3 col-md-2 profile-sidebar">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="img-wrapper">
                        <a class="thumbnail">
                            <img class="profile-picture" onclick="picture_modal()" src="<?php echo base_url('assets/uploads/images/profile/'.$picture); ?>" alt="Profile Picture" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Last Login</div>
                        <div class="panel-body">
                            <?php echo empty($user) ? '0000-00-00 00:00:00' : $user->last_login; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Last IP Address</div>
                        <div class="panel-body">
                            <?php echo empty($user) ? '0:0:0' : $user->last_ip; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9 pull-right">
            <?php
            if( ! empty($errors))
            {
            ?>
            <div class="row">
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
            <ul class="nav nav-tabs">
                <li<?php echo $active_tab == 'profile' ? ' class="active"' : ''; ?>><a href="#profile" data-toggle="tab">Profile</a></li>
                <li<?php echo $active_tab == 'edu' ? ' class="active"' : ''; ?>><a href="#edu" data-toggle="tab">Educational Background</a></li>
                <li<?php echo $active_tab == 'training' ? ' class="active"' : ''; ?>><a href="#training" data-toggle="tab">Training / Advance Studies</a></li>
                <li<?php echo $active_tab == 'employment' ? ' class="active"' : ''; ?>><a href="#employment" data-toggle="tab">Employment Data</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane<?php echo $active_tab == 'profile' ? ' active' : ''; ?>" id="profile">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row display-head"><label class="col-sm-12 my-label">Last Name</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->LastName)){ echo $profile->LastName; }?></div></div>
                        </div>
                        <div class="col-md-3">
                            <div class="row display-head"><label class="col-sm-12 my-label">First Name</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->FirstName)){ echo $profile->FirstName; }?></div></div>
                        </div>
                        <div class="col-md-2">
                            <div class="row display-head"><label class="col-sm-12 my-label">Middle Name</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->MiddleName)){ echo $profile->MiddleName; }?></div></div>
                        </div>
                        <div class="col-md-1">
                            <div class="row display-head"><label class="col-sm-12 my-label">Ext.</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->ExtensionName)){ echo $profile->ExtensionName; }?></div></div>
                        </div>
                        <div class="col-md-3">
                            <div class="row display-head"><label class="col-sm-12 my-label">Current Last Name</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->LastName01)){ echo $profile->LastName01; }?></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row display-head"><label class="col-sm-12 my-label">Birth Date</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if(isset($profile->BirthDate)){ echo $profile->BirthDate; } ?></div></div>
                        </div>
                        <div class="col-md-4">
                            <div class="row display-head"><label class="col-sm-12 my-label">Sex</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if(isset($profile->Sex)){ echo $profile->Sex ? 'Male' : 'Female'; } ?></div></div>
                        </div>
                        <div class="col-md-4">
                            <div class="row display-head"><label class="col-sm-12 my-label">Civil Status</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->CivilStatus)){ echo $profile->CivilStatus; } ?></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row display-head"><label class="col-sm-12 my-label">Address</label></div>
                            <div class="row display-content">
                                <div class="col-sm-12">
                                    <div class="wrap-text"><?php if(isset($profile->Address)){ echo $profile->Address; } ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row display-head"><label class="col-sm-12 my-label">Location</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if(isset($profile->LocationOfResidence)){ echo $profile->LocationOfResidence ? 'City' : 'Municipality'; } ?></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row display-head"><label class="col-sm-12 my-label">Province</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->Province)){ echo $profile->Province; } ?></div></div>
                        </div>
                        <div class="col-md-6">
                            <div class="row display-head"><label class="col-sm-12 my-label">Region of Origin</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if( ! empty($profile->RegionOfOrigin)){ echo $profile->RegionOfOrigin; } ?></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row display-head"><label class="col-sm-12 my-label">Telephone Number</label></div>
                            <div class="row display-content"><div class="col-sm-12"><?php if(isset($profile->TelephoneNo)){ echo $profile->TelephoneNo; } ?></div></div>
                        </div>
                        <div class="col-md-6">
                            <div class="row display-head"><label class="col-sm-12 my-label">Cellphone Number</label></div>
                            <div class="row display-content">
                                <div class="col-sm-12">
                                    <?php if(isset($profile->CellphoneNo)){ echo $profile->CellphoneNo; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="<?php echo base_url('index.php/user/update'); ?>"><button type="button" class="btn btn-info">Change Profile</button></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane<?php echo $active_tab == 'edu' ? ' active' : ''; ?>" id="edu">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#edu_attainment">Educational Attainment (Baccalaureate Degree Only)</a>
                                </h4>
                            </div>
                            <div id="edu_attainment" class="panel-collapse collapse<?php echo $collapsed == 'edu_attainment'  ? ' in' : ''; ?>">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-condensed table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:39%">Degree and Specializations</th>
                                                        <th class="text-center" style="width:25%">College or University</th>
                                                        <th class="text-center" style="width:10%">Year Graduated</th>
                                                        <th class="text-center" style="width:25%">Honors or Awards Received</th>
                                                        <th class="text-center" style="width:1%"><span class="glyphicon glyphicon-cog"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if( ! empty($edu_attainment))
                                                    {
                                                        foreach($edu_attainment as $key => $attainment){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $attainment->EducationDegree; ?></td>
                                                        <td><?php echo $attainment->School; ?></td>
                                                        <td class="text-center"><?php echo $attainment->YearGraduated; ?></td>
                                                        <td class="text-center"><?php echo $attainment->Honors; ?></td>
                                                        <td class="row-buttons">
                                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#educational_attainment_modal" onclick="edit_education(<?php echo $key; ?>); return false;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                            <a href="<?php echo base_url('index.php/user/remove_attainment/'.$key); ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#educational_attainment_modal">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pro_exams">Professional Examination Passed</a>
                                </h4>
                            </div>
                            <div id="pro_exams" class="panel-collapse collapse<?php echo $collapsed == 'pro_exams'  ? ' in' : ''; ?>">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-condensed table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:74%">Name of Examination</th>
                                                        <th class="text-center" style="width:15%">Date Taken</th>
                                                        <th class="text-center" style="width:10%">Rating</th>
                                                        <th class="text-center" style="width:1%"><span class="glyphicon glyphicon-cog"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if( ! empty($pro_exams))
                                                    {
                                                        foreach($pro_exams as $key => $exam){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $exam->ExaminationName; ?></td>
                                                        <td class="text-center"><?php echo $exam->ExaminationDate; ?></td>
                                                        <td class="text-center"><?php echo $exam->Rating; ?></td>
                                                        <td class="row-buttons">
                                                            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#examinations_modal" onclick="edit_exam(<?php echo $key; ?>); return false;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                            <a href="<?php echo base_url('index.php/user/remove_examination/'.$key); ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#examinations_modal">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#degree_reasons">Reasons for taking courses or pursuing degrees</a>
                                </h4>
                            </div>
                            <div id="degree_reasons" class="panel-collapse collapse<?php echo $collapsed == 'degree_reasons'  ? ' in' : ''; ?>">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-condensed table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:60%">Reasons</th>
                                                        <th class="text-center" style="width:20%">Undergraduate/AB/BS</th>
                                                        <th class="text-center" style="width:20%">Graduate/MS/MA/PhD</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if( ! empty($degree_reasons))
                                                    {
                                                        foreach($degree_reasons as $reason){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $reason->AnswerSelectionValue; ?></td>
                                                        <td class="text-center">
                                                        <?php if( ! empty($degree_reasons_answers['Undergraduate']) && in_array($reason->AnswerSelectionValue, $degree_reasons_answers['Undergraduate'])){ ?>
                                                            <span class="glyphicon glyphicon-ok"></span>
                                                        <?php } ?>
                                                        </td>
                                                        <td class="text-center">
                                                        <?php if( ! empty($degree_reasons_answers['Graduate']) && in_array($reason->AnswerSelectionValue, $degree_reasons_answers['Graduate'])){ ?>
                                                            <span class="glyphicon glyphicon-ok"></span>
                                                        <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php if( ! empty($degree_reasons_answers['Others'])){ ?>
                                        <div class="col-md-12">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">Other Reasons</div>
                                                <div class="panel-body">
                                                    <?php
                                                    if( ! empty($degree_reasons_answers['Others']))
                                                    {
                                                        echo $degree_reasons_answers['Others']; 
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#degree_reasons_modal" style="margin-top:10px">Change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane<?php echo $active_tab == 'training' ? ' active' : ''; ?>" id="training">
                    <div class="panel panel-info">
                        <div class="panel-heading">List of Professional or Work-related Training Programs and Advance Studies</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:49%">Title of Training or Advance Study</th>
                                                <th class="text-center" style="width:10%">Duration</th>
                                                <th class="text-center" style="width:10%">Credits Earned</th>
                                                <th class="text-center" style="width:30%">Name of Training Institution/College/University</th>
                                                <th class="text-center" style="width:1%"><span class="glyphicon glyphicon-cog"></span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if( ! empty($trainings))
                                            {
                                                foreach($trainings as $key => $training){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $training->Title; ?></td>
                                                <td class="text-center"><?php echo $training->Duration; ?></td>
                                                <td class="text-center"><?php echo $training->CreditsEarned; ?></td>
                                                <td class="text-center"><?php echo $training->TrainingInstitutionName; ?></td>
                                                <td class="row-buttons">
                                                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#trainings_modal" onclick="edit_training(<?php echo $key; ?>); return false;"><span class="glyphicon glyphicon-pencil"></span></button>
                                                    <a href="<?php echo base_url('index.php/user/remove_training/'.$key); ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#trainings_modal" style="margin-top:10px">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-10">Reason for Pursuing Advance Studies</div>
                                        <div class="col-md-2 text-right"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#adv_study_reasons_modal" onclick="advance_study_reason(<?php echo ! empty($answers[5][15]) ? $answers[5][15][0]->AnswerId : 0; ?>, '<?php echo ! empty($answers[5][15]) ? $answers[5][15][0]->AnswerValue : ''; ?>'); return false;"><?php echo empty($answers[5][15]) ? 'Add' : 'Edit'; ?></button></div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php if( ! empty($answers[5][15])){ ?>
                                        <div class="col-md-12">
                                            <p><?php echo $answers[5][15][0]->AnswerValue; ?></p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane<?php echo $active_tab == 'employment' ? ' active' : ''; ?>" id="employment">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="questions-accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_6_17">
                                                Are you presently employed?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_6_17" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[6][17])){ ?>
                                            <p><?php echo $answers[6][17][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if( ! empty($answers[6][17]) && $answers[6][17][0]->AnswerValue == 'Never Employed'){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_7_18">
                                                Please state reason(s) why you are not yet employed.
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_7_18" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[7][18])){ ?>
                                            <ul>
                                            <?php
                                            foreach ($answers[7][18] as $Answer){
                                                if( ! empty($Answer->AnswerValue)){
                                            ?>
                                                <li><?php echo $Answer->AnswerValue; ?></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </ul>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_8_45">
                                                Present Employment Status
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_8_45" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[8][45])){ ?>
                                            <p><?php echo $answers[8][45][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if( ! empty($answers[8][45]) && $answers[8][45][0]->AnswerValue == 'Self-employed'){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_26_46">
                                                If self-employed, what skills acquired in college were you able to apply in your work?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_26_46" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[26][46])){ ?>
                                            <p><?php echo $answers[26][46][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_9_20">
                                                Present Occupation
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_9_20" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[9][20])){ ?>
                                            <p><?php echo $answers[9][20][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_10_21">
                                                Name of Company or Organization including address
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_10_21" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[10][21])){ ?>
                                            <p><?php echo $answers[10][21][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_11_22">
                                                Major line of business of the company you are presently employed in.
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_11_22" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[11][22])){ ?>
                                            <p><?php echo $answers[11][22][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_12_23">
                                                Place of work
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_12_23" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[12][23])){ ?>
                                            <p><?php echo $answers[12][23][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_13_24">
                                                Is this your first job after college?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_13_24" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[13][24])){ ?>
                                            <p><?php echo $answers[13][24][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_14_25">
                                                What are you reason(s) for staying on the job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_14_25" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[14][25])){ ?>
                                            <ul>
                                            <?php
                                            foreach ($answers[14][25] as $Answer){
                                                if( ! empty($Answer->AnswerValue)){
                                            ?>
                                            <li><?php echo $Answer->AnswerValue; ?></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </ul>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_15_27">
                                                Is this your first job related to the course you took up in college?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_15_27" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[15][27])){ ?>
                                            <p><?php echo $answers[15][27][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_16_28">
                                                What were your reason(s) for accepting the job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_16_28" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[16][28])){ ?>
                                            <ul>
                                            <?php
                                            foreach ($answers[16][28] as $Answer){
                                                if( ! empty($Answer->AnswerValue)){
                                            ?>
                                            <li><?php echo $Answer->AnswerValue; ?></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </ul>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_17_30">
                                                What were your reason(s) for changing job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_17_30" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[17][30])){ ?>
                                            <ul>
                                            <?php
                                            foreach ($answers[17][30] as $Answer){
                                                if( ! empty($Answer->AnswerValue)){
                                            ?>
                                            <li><?php echo $Answer->AnswerValue; ?></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </ul>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_18_32">
                                                How long did you stay in your first job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_18_32" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[18][32])){ ?>
                                            <p><?php echo $answers[18][32][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_19_34">
                                                How did you find your first job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_19_34" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[19][34])){ ?>
                                            <p><?php echo $answers[19][34][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_20_36">
                                                How long did it take to land your first job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_20_36" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[20][36])){ ?>
                                            <p><?php echo $answers[20][36][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_21_38">
                                               Job Level Position - First Job
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_21_38" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[21][38])){ ?>
                                            <p><?php echo $answers[21][38][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_21_39">
                                               Job Level Position - Current or Present Job
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_21_39" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[21][39])){ ?>
                                            <p><?php echo $answers[21][39][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_22_40">
                                                What is your initial gross monthly earning in your first job after college?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_22_40" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[22][40])){ ?>
                                            <p><?php echo $answers[22][40][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_23_41">
                                                Was the curriculum you had in college relevant to you first job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_23_41" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[23][41])){ ?>
                                            <p><?php echo $answers[23][41][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if( ! empty($answers[23][41]) && $answers[23][41][0]->AnswerValue == 'Yes'){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_24_42">
                                                If YES, what competencies learned in college did you find very useful in you first job?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_24_42" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[24][42])){ ?>
                                            <ul>
                                            <?php
                                            foreach ($answers[24][42] as $Answer){
                                                if( ! empty($Answer->AnswerValue)){
                                            ?>
                                            <li><?php echo $Answer->AnswerValue; ?></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </ul>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#questions-accordion" href="#item_25_44">
                                                List of suggestions to further improve your course curriculum.
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="item_25_44" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <?php if( ! empty($answers[25][44])){ ?>
                                            <p><?php echo $answers[25][44][0]->AnswerValue; ?></p>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="<?php echo base_url('index.php/user/employment_data'); ?>"><button type="button" class="btn btn-info">Modify</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>