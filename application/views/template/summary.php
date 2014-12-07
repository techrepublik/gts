<div class="content" id="summary">
    <div class="row">
        <div class="col-sm-12">
            <?php if(!empty($total)) { echo $total; } ?>
        </div>
    </div>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <div class="col-sm-1">
                <label>Table <?php if(!empty($table_no)) { echo $table_no; } ?></label>
            </div>
            <div class="col-sm-10">
                <?php if(!empty($table_dropdown)) { echo $table_dropdown; } ?>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-default">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <?php if(!empty($summary)) { echo $summary; } ?>
        </div>
    </div>
</div>
