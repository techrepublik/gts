<div class="modal fade" id="examinations_modal" tabindex="-1" role="dialog" aria-labelledby="examinations_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="examinations_form"  class="form-horizontal" method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/user/save_examination'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="examinations_modal_label">Professional Examination Passed</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="ExaminationName">Name of Examination:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="ExaminationName" id="ExaminationName" /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="ExaminationDate">Examination Date:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control datepicker" name="ExaminationDate" id="ExaminationDate" data-date-format="yyyy-mm-dd" /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5"><label class="my-label" for="Rating">Rating:</label></div>
                        <div class="col-md-7"><input type="text" class="form-control" name="Rating" id="Rating" /></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ExaminationId" id="ExaminationId" value="0" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
