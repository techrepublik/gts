<div class="modal fade" id="degree_reasons_modal" tabindex="-1" role="dialog" aria-labelledby="degree_reasons_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="degree_reasons_form"  class="form-horizontal" method="post" accept-charset="utf-8" action="<?php echo base_url('index.php/user/save_reasons'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="degree_reasons_modal_label">
                        Reason(s) for taking course(s) or pursuing degree(s)
                        <a href="#" data-toggle="tooltip" data-placement="right" title="You may check(<span class='glyphicon glyphicon-ok'></span>) more than one answer.">
                            <span class="glyphicon glyphicon-question-sign"></span>
                        </a>
                    </h4>
                </div>
                <div class="modal-body">
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
                                        <td class="text-center"><input type="checkbox" name="Undergraduate[]" value="<?php echo $reason->AnswerSelectionValue; ?>" <?php if( ! empty($degree_reasons_answers['Undergraduate']) && in_array($reason->AnswerSelectionValue, $degree_reasons_answers['Undergraduate'])){ echo 'checked'; } ?>></td>
                                        <td class="text-center"><input type="checkbox" name="Graduate[]" value="<?php echo $reason->AnswerSelectionValue; ?>" <?php if( ! empty($degree_reasons_answers['Graduate']) && in_array($reason->AnswerSelectionValue, $degree_reasons_answers['Graduate'])){ echo 'checked'; } ?>></td>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="my-label col-md-2">Other reasons:</label>
                        <div class="col-md-10">
                            <textarea name="Others" class="form-control" rows="3" maxlength="250"><?php if( ! empty($degree_reasons_answers['Others'])) echo $degree_reasons_answers['Others']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
