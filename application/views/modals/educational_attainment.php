<div class="modal fade" id="educational_attainment_modal" tabindex="-1" role="dialog" aria-labelledby="educational_attainment_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="educational_attainment_form"  class="form-horizontal" method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/user/save_attainment'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="educational_attainment_modal_label">
                        Educational Attainment
                        <a href="#" data-toggle="tooltip" data-placement="right" title="
                           <ul>
                              <li>Degree means Program of Study or Program of Discipline, example <i>BS in Teacher Education</i></li>
                              <li>Specialization means major field in study, example <i>Mathematics</i></i></li>
                              <li>Honor or Awards means academic awards received in college or while earning the degree</li>
                          </ul>
                        "><span class="glyphicon glyphicon-question-sign"></span></a>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="EducationDegree">Degree and specialization:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="EducationDegree" id="EducationDegree" maxlength="250" required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="School">College or university:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="School" id="School" maxlength="250" required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="YearGraduated">Year Graduated:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control datepicker year-only" name="YearGraduated" id="YearGraduated" data-date-format="yyyy" maxlength="4" required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="control-label" for="Honors">Honors and Awards:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="Honors" id="Honors" maxlength="250" /></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="AttainmentId" id="AttainmentId" value="0" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
