$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$(document).ready(function(){
    $('#error_list').hide();
    $("#nmis_mpwr_code").mask("9 9 - 9 9 9 9 9 9 9");
    $("#school_year").mask("9999 - 9999");
    $("#units_earned").mask("9999");
    
    $('.datetime-picker').datetimepicker({
        pickTime: false
    });
    
    $('.conditional').hide();
    check_emp_type();
    check_con_type();
    get_cache('con_prop', '#contacts');
    get_cache('edu_bg', '#edu_bg_tbl');
    get_cache('sched', '#sched');
    get_cache('tr_dur', '#training_dur');
    get_cache('profile_pic');
    
    $('#emp_type').change(function() {
        check_emp_type();
    });
    
    $('#con_type').change(function(){
        check_con_type();
    });
    
    $('#show_con_prop').click(function(){
        $('#contact_properties').modal('show');
    });
    
    $('#show_edu_bg').click(function(){
        $('#educational_background').modal('show');
    });
    
    $('#add_sched').click(function(){
        $('#schedule').modal('show');
    });
    
    $('#add_dur').click(function(){
        $('#training_duration').modal('show');
        if($('#add_dur').html() === 'Edit'){
            $.post('index.php/test/get_temp_data/tr_dur', function(data){
                var info = JSON.parse(data);
                for (var key in info) {
                   if(info.hasOwnProperty(key)){
                       var obj = info[key];
                       $('#' + key).val(obj);
                   }
                }
            });
        }
    });
    
    $('.id_picture').click(function(){
        $('#upload_picture').modal('show');
    });
    
    $('#edu_bg_form').submit(function(e){
        e.preventDefault();
        save_edu_bg();
        return false;
    });
    
    $('#contact_prop_form').submit(function(e){
        e.preventDefault();
        save_con_prop();
        return false;
    });
    
    $('#sched_form').submit(function(e){
        e.preventDefault();
        save_sched();
        return false;
    });
    
    $('#tr_dur_form').submit(function(e){
        e.preventDefault();
        save_dur();
        return false;
    });
    
    
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        var input = $(this).parents('.input-group').find(':text');
        if( input.length ) {
            input.val(label);
        } else {
            if( label ) alert(label);
        }
    });
    
    $('#upload_pic_form').submit(function(e){
        e.preventDefault();
        $.ajaxFileUpload({
            url             :'index.php/test/upload_pic/',
            secureuri       :false,
            fileElementId   :'file_loc',
            dataType        : 'json',
            success : function (data, status)
            {
                if(data.status !== 'error')
                {
                    $('.btn-file :file').parents('.input-group').find(':text').val('');
                    $('.id_picture').css('background-image', 'url(' + data.file['src'] + ')');
                    $('.id_picture').prop('title', data.file['file_name']);
                    $('#upload_picture').modal('hide');
                    $('.id_picture').removeClass('red-border');
                }
                alert(data.msg);
            }
        });
        return false;
    });
    
    $("#contacts").on("click", "tr", function() {
        var id = parseInt($(this).attr('id'));
        $.post('index.php/test/get_temp_data/con_prop', function(data){
            var info = JSON.parse(data);
            $('#contact_prop_id').val(id);
            for (var key in info[id]) {
               if(info[i].hasOwnProperty(key)){
                   $('#' + key).val(info[i][key]);
               }
            }
            $('#contact_properties').modal('show');
        });
    });
    
    $("#edu_bg_tbl").on("click", "tr", function() {
        var id = parseInt($(this).attr('id'));
        $.post('index.php/test/get_temp_data/edu_bg', function(data){
            var info = JSON.parse(data);
            $('#edu_bg_id').val(id);
            for (var key in info[id]) {
               if(info[i].hasOwnProperty(key)){
                   $('#' + key).val(info[i][key]);
               }
            }
            $('#educational_background').modal('show');
        });
    });
    
    $("#sched").on("click", "tr", function() {
        var id = parseInt($(this).attr('id'));
        $.post('index.php/test/get_temp_data/sched', function(data){
            var info = JSON.parse(data);
            $('#sched_id').val(id);
            for (var key in info[id]) {
               if(info[i].hasOwnProperty(key)){
                   $('#' + key).val(info[i][key]);
               }
            }
            $('#schedule').modal('show');
        });
    });
    
    $('#manpower_profile_form').submit(function(e) {
        e.preventDefault();
        var valid = validate_additional_info();
        if(valid){
            var data = $(this).serializeArray();
            data = JSON.stringify(data);
            $.post('index.php/test/save_profile', {manpower_profile : data}, function(){
                clear_form('#manpower_profile_form');
                window.location.assign('index.php/test/profile_list');
            });
        }
        return false;
        
    });
});

function check_emp_type(){
    if(parseInt($('#emp_type').val()) === 0){
        $('#employment_type .conditional').show();
    } else {
        $('#employment_type .conditional').hide();
    }
}

function check_con_type(){
    if(parseInt($('#con_type').val()) === 0){
        $('#contact_properties .conditional').show();
        $('#spec_con_type').prop('required', '');
    } else {
        $('#contact_properties .conditional').hide();
        $('#spec_con_type').removeAttr('required');
    }
}

function save_edu_bg(){
    var school = $('#school').val();
    var edu_lvl = $('#edu_lvl').val();
    var school_year = $('#school_year').val();
    var degree = $('#degree').val();
    if(school.length > 0 && edu_lvl.length > 0 && school_year.length > 0 && degree.length > 0){
        var data = $('#edu_bg_form').serializeArray();
        data = JSON.stringify(data);
        $.post('index.php/test/save_additional_info/edu_bg/edu_bg_id', {edu_bg : data}, function(){
            get_cache('edu_bg', '#edu_bg_tbl');
            clear_form('#edu_bg_form');
            $('#educational_background').modal('hide');
            $('#edu_bg_tbl').parent().removeClass('red-border');
        });
    }
}

function save_con_prop(){
    var con_type = $('#con_type').val();
    var spec_con_type = $('#spec_con_type').val();
    var con_details = $('#con_details').val();
    con_type = (con_type === '0' && spec_con_type.length === 0) ? false : con_type;
    if(con_type && con_details.length > 0){
        var data = $('#contact_prop_form').serializeArray();
        data = JSON.stringify(data);
        $.post('index.php/test/save_additional_info/con_prop/contact_prop_id', {con_prop : data}, function(){
            get_cache('con_prop', '#contacts');
            clear_form('#contact_prop_form');
            $('#contact_properties').modal('hide');
        });
    }
}

function save_sched(){
    var sched_sem = $('#sched_sem').val();
    var sched_sy = $('#sched_sy').val();
    if(sched_sem.length > 0 && sched_sy.length > 0){
        var data = $('#sched_form').serializeArray();
        data = JSON.stringify(data);
        $.post('index.php/test/save_additional_info/sched/sched_id', {sched : data}, function(){
            get_cache('sched', '#sched');
            clear_form('#sched_form');
            $('#schedule').modal('hide');
            $('#sched').parent().removeClass('red-border');
        });
    }
}

function save_dur(){
    var date_start = $('#date_start').val();
    var date_finish = $('#date_finish').val();
    if(date_start.length > 0 && date_finish.length > 0){
        var data = $('#tr_dur_form').serializeArray();
        data = JSON.stringify(data);
        $.post('index.php/test/save_additional_info/tr_dur/tr_dur_id', {tr_dur : data}, function(){
            get_cache('tr_dur', '#training_dur');
            clear_form('#tr_dur_form');
            $('#training_duration').modal('hide');
            $('#training_dur').parent().removeClass('red-border');
        });
    }
}

function get_cache(cache, table_id){
    $.post('index.php/test/get_temp_data/' + cache, function(data){
        var info = JSON.parse(data);
        console.log(cache + ' cache:' + info);
        if(info){
            if(cache === 'tr_dur'){
                for (var key in info) {
                   if(info.hasOwnProperty(key)){
                       var obj = info[key];
                       $('#cell_' + key).html(obj);
                   }
                }
                $('#add_dur').html('Edit');
            } else if(cache === 'profile_pic') {
                $('.id_picture').css('background-image', 'url(' + info['src'] + ')');
                $('.id_picture').prop('title', info['file_name']);
            } else {
                var html = '';
                for(var i = 0; i < info.length; i++){
                    html += '<tr id="' + i + '">';
                    for (var key in info[i]) {
                       if(info[i].hasOwnProperty(key) && key !== 'spec_con_type'){
                           var obj = key === 'con_type' ? $('#con_type > option[value="' + info[i][key] + '"]').text() : info[i][key];
                           html += '<td>' + obj + '</td>';
                       }
                    }
                    html += '</tr>';
                }
                $(table_id + ' > tbody').html(html);
            }
        }
    });
}

function validate_additional_info(){
    var edu_bg = $('#edu_bg_tbl tbody:nth-child(1)').attr('id');
    var sched = $('#sched tbody:nth-child(1)').attr('id');
    var training_dur = $('#emp_status option:selected').val() === '7' ? $('#training_dur tbody:nth-child(1)').attr('id') : 1;
    var pic = $('.id_picture').attr('title');
    

/*var attr = $(this).attr('name');

// For some browsers, `attr` is undefined; for others,
// `attr` is false.  Check for both.
if (typeof attr !== typeof undefined && attr !== false) {
    // ...
}

*/
    if(pic === '' || edu_bg === undefined || sched === undefined || training_dur === undefined){
        $('#error_list').show();
        var error_list = '';
        if(pic === ''){
            $('.id_picture').prop('style', 'border: red 1px solid !important;');
            if( ! $('.id_picture').hasClass('red-border')) $('.id_picture').addClass('red-border');
            error_list += '<li>Picture is required.</li>';
        } 
        
        if(edu_bg == null){
            $('#edu_bg_tbl').parent().prop('style', 'border: red 1px solid !important;');
            if( ! $('#edu_bg_tbl').parent().hasClass('red-border')) $('#edu_bg_tbl').parent().addClass('red-border');
            error_list += '<li>Educational Background is required.</li>';;
        } 
        
        if(sched == null){
            $('#sched').parent().prop('style', 'border: red 1px solid !important;');
            if( ! $('#sched').parent().hasClass('red-border')) $('#sched').parent().addClass('red-border');
            error_list += '<li>Schedule is required.</li>';
        } 
        
        if(training_dur == null){
            if( ! $('#training_dur').parent().hasClass('red-border')) $('#training_dur').parent().addClass('red-border');
            error_list += '<li>Training Duration is required for OJT/Trainee.</li>';
        }
        $('#error_list > ul').html(error_list);
        return false;
    } else {
        $('#error_list').hide();
        return true;
    }
}

function clear_form(form_id){
    $(form_id).find('input:not(:hidden), textarea').val('');
    $(form_id).find('select').val('1');
}


