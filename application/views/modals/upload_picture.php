<div class="modal fade" id="upload_picture" tabindex="-1" role="dialog" aria-labelledby="upload_picture_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" class="form-horizontal"  action="user/upload_picture">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="upload_picture_label">Upload Picture</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" class="filestyle" data-buttonText="Choose picture">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
