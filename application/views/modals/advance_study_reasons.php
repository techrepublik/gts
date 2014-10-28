<div class="modal fade" id="adv_study_reasons_modal" tabindex="-1" role="dialog" aria-labelledby="adv_study_reasons_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="eadv_study_reasons_form"  class="form-horizontal" method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/user/save_adv_study_reasons'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="adv_study_reasons_modal_label">
                        What made you pursue advance studies?
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <select class="form-control" id="answers_5_15">
                                <option value="For promotion">For promotion</option>
                                <option value="For professional development">For professional development</option>
                                <option value="-1">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="display:none">
                        <div class="col-md-12">
                            <textarea name="answers_5_15" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="AnswerId" id="AnswerId" value="0" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
