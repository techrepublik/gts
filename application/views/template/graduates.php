<div class="content" id="graduate-list">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <div class="col-sm-1">
                <label>Year</label> 
                <?php if(!empty($year_dropdown)) { echo $year_dropdown; } ?>
            </div>
            <div class="col-sm-3">
                <label>College</label> 
                <?php if(!empty($college_dropdown)) { echo $college_dropdown; } ?>
            </div>
            <div class="col-sm-3">
                <label>Department</label> 
                <?php if(!empty($department_dropdown)) { echo $department_dropdown; } ?>
            </div>
            <div class="col-sm-1">
                <label style="color:white">Space</label> 
                <button type="submit" class="btn btn-default">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <?php if(!empty($graduates)) { echo $graduates; } ?>
        </div>
        <div class="col-sm-12">
            <?php if(!empty($pagination)) { echo $pagination; } ?>
        </div>
    </div>
</div>
