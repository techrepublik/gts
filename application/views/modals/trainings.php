<div class="modal fade" id="trainings_modal" tabindex="-1" role="dialog" aria-labelledby="trainings_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="examinations_form"  class="form-horizontal" method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/user/save_training'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="trainings_modal_label">Professional or Work-related Training Program or Advance Study</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="Title">Title of Training or Advance Study:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="Title" id="Title" maxlength="250" required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="Duration">Duration(hours):</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="Duration" id="Duration" required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="CreditsEarned">Credits Earned:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="CreditsEarned" id="CreditsEarned" maxlength="11" required /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="TrainingInstitutionName">Name of Training Institution/College/University:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="TrainingInstitutionName" id="TrainingInstitutionName" maxlength="250" required /></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="TrainingId" id="TrainingId" value="0" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
