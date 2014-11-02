function picture_modal(){
    $('#upload_picture').modal('show');
}

function year_selection(){
    var min = 1952, max = new Date().getFullYear();
    var years = [];    
    for (var i = min; i<=max; i++){
        years.push(i.toString());
    }
     return years;
}

function edit_education(id){
    $.post(base_url+'index.php/request/edu/'+id, function(data){
        console.log(data);
        $('#AttainmentId').val(data.AttainmentId);
        $('#EducationDegree').val(data.EducationDegree);
        $('#School').val(data.School);
        $('#YearGraduated').val(data.YearGraduated);
        $('#Honors').val(data.Honors);
    });
}

function edit_exam(id){
    $.post(base_url+'index.php/request/exam/'+id, function(data){
        console.log(data);
        $('#ExaminationId').val(data.ExaminationId);
        $('#ExaminationName').val(data.ExaminationName);
        $('#ExaminationDate').val(data.ExaminationDate);
        $('#Rating').val(data.Rating);
    });
}

function edit_training(id){
    $.post(base_url+'index.php/request/training/'+id, function(data){
        console.log(data);
        $('#TrainingId').val(data.TrainingId);
        $('#Title').val(data.Title);
        $('#Duration').val(data.Duration);
        $('#CreditsEarned').val(data.CreditsEarned);
        $('#TrainingInstitutionName').val(data.TrainingInstitutionName);
    });
}

function advance_study_reason(id, val){
    $('#adv_study_reasons_modal').find('#AnswerId').val(id);
    var exists = 0 != $('#answers_5_15 option[value='+val+']').length;
    if(exists){
        $('#answers_5_15').val(val);
        $('textarea[name="answers_5_15"]').closest('.form-group').hide();
    } else {
        $('#answers_5_15').val('-1');
        $('textarea[name="answers_5_15"]').closest('.form-group').show();
    }
    $('textarea[name="answers_5_15"]').val(val);
}

function toggle_conditional(){
    if($('[name="answers[6][17]"]:checked').val() == 'Never Employed'){
        $('#not_employed_reason').show();
    } else {
        $('#not_employed_reason').hide();
    }
    if($('[name="answers[23][41]"]:checked').val() == 'Yes'){
        $('#competencies').show();
    } else {
        $('#competencies').hide();
    }
}

function get_answers(){
    $.post(base_url+'index.php/request/answers/', function(data){
        $.each( data, function( x, answer_fields ){
            $.each( answer_fields, function( y, answers ){
                $.each( answers , function( z, answer ){
                    var AnswerValue = answer.AnswerValue;
                    var AnswerFieldId = answer.AnswerFieldId;
                    var QuestionId = answer.QuestionId;
                    if(AnswerValue !== null && AnswerValue.length > 0){
                        console.log(answer);
                        var name = 'answers['+QuestionId+']['+AnswerFieldId+']';
                        var select_e = 'select[data-input-name="'+name+'"]';
                        var select = 'select[name="'+name+'"]';
                        var radio = 'input[type="radio"][name="'+name+'"][value="'+AnswerValue+'"]';
                        var multiple = 'input[type="checkbox"][name="'+name+'[]"][value="'+AnswerValue+'"]';
                        var others = 'input[type="text"][name="'+name+'[]"]';
                        if($(select_e).length > 0){
                            if($(select_e).find('option[value="'+AnswerValue+'"]').length > 0){
                                $(select_e).val(AnswerValue);
                            } else {
                                $(select_e).val('-1');
                                $('[name="'+name+'"]').closest('.form-group').show();
                            }
                            $('[name="'+name+'"]').val(AnswerValue);
                        } else if($(select).length > 0){
                            $(select).val(AnswerValue);
                        } else if($(radio).length > 0){
                            $(radio).prop('checked', true);
                        } else if($(multiple).length > 0){
                            $(multiple).prop('checked', true);
                        } else {
                            $(others).val(AnswerValue);
                            $('[name="'+name+'"]').val(AnswerValue);
                        }
                        toggle_conditional();
                    }
                });
            });
        });
    }, 'json');
}
if (document.getElementById('employment-data-form')) {
    get_answers();
}

$('.datepicker.year-only').autocomplete({
    source: year_selection(),
    minLength: 0
});

$('.datepicker:not(.year-only)').datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy-mm-dd'
});

$('.datepicker.year-only').on('focus',function () {
    $(this).autocomplete( 'search', '' );
});

$('a[data-toggle="tooltip"]').tooltip({
    html: true
});

$('.modal').on('hidden.bs.modal', function () {
    $(this).find('form').find('input[type=text], input[type=hidden], textarea').val('');
});

$('[name="answers[6][17]"]').on('click',function(){
    if($(this).val() == 'Never Employed'){
        $('#not_employed_reason').show();
    } else {
        $('#not_employed_reason').hide();
    }
});

$('[name="answers[23][41]"]').on('click',function(){
    if($(this).val() == 'Yes'){
        $('#competencies').show();
    } else {
        $('#competencies').hide();
    }
});

$('#answers_5_15').on('change',function(){
    if($(this).val() != '-1'){
        $('textarea[name="answers_5_15"]').val($(this).val());
        $('textarea[name="answers_5_15"]').closest('.form-group').hide();
    } else {
        $('textarea[name="answers_5_15"]').val('');
        $('textarea[name="answers_5_15"]').closest('.form-group').show();
    }
});

$('.optional').closest('.form-group').hide();
$('select.answer-selection').on('change', function(){
    var input_name = $(this).attr('data-input-name');
    if($(this).val().toString() !== '-1'){
        $('[name="'+input_name+'"]').val($(this).val());
        $('[name="'+input_name+'"]').closest('.form-group').hide();
    } else {
        $('[name="'+input_name+'"]').val('');
        $('[name="'+input_name+'"]').closest('.form-group').show();
    }
});

$('#college').on('change', function(){
    console.log($(this).val());
    get_dept($(this).val());
});

function get_dept(college){
    $.post(base_url+'index.php/request/get_departments/'+college, function(data){
        console.log(data);
        data = JSON.parse(data);
        $('#department').html('');
        $.each(data, function(key, value) {
             $('#department').append('<option value="' + key + '">' + value + '</option>');
        });
        $('#department').val('All');
    });
}

var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

$.fn.modal.Constructor.prototype.enforceFocus = function() {};

$.confModal.on('hidden', function() {
    $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
});

$.confModal.modal({ backdrop : false });