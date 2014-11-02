$('.datetime-picker:not(#year_graduated)').datetimepicker({
    pickTime: false
});

$('.datepicker.year-only').datepicker({
    minViewMode: 2
});

$('.datepicker').datepicker();

$('a[data-toggle="tooltip"]').tooltip({
    html: true
});

/*$('.next-btn').prop('disabled', true);*/

function select_toggle(select){
    if($(select).val() == -1){
        $('#'+select.id+'_extra').closest('.form-group').show();
    } else {
        $('#'+select.id+'_extra').closest('.form-group').hide();
    }
}

$('[id*="view_"]').each(function(){
    var view = this;
    $(view).find('select, input:not(.optional)').on('keyup', function(){
        var fields = $(view).find('select, input:not(.optional)');
        var empty = false;
        $(fields).each(function(){
            if($(this).val().length <= 0){
                empty = true;
            }
        });

        if(empty){
            $(view).find('.next-btn').prop('disabled', true);
        } else {
            $(view).find('.next-btn').each(function(){
                this.disabled = false;
            });
        }
    });
});



$.each($('select'), function(){
    select_toggle(this);
});

$('select').on('change',function(){
    select_toggle(this);
});

$('[id*="view_"]:not(#view_1)').each(function(e) {
    if (typeof e !== '0') $(this).hide();
});

$('.next-btn').click(function(){
    $(this).closest('[id*=view_]').hide();
    $(this).closest('[id*=view_]').next('[id*=view_]').show();
    return false;
});

$('.prev-btn').click(function(){
    $(this).closest('[id*=view_]').hide();
    $(this).closest('[id*=view_]').prev('[id*=view_]').show();
    return false;
});

$('.add-field').on('click', function(e){
    var input_wrapper = $(this).closest('.form-group').find('div[class*="fields_"]:not(".fields_0")');
    var x = input_wrapper.length + 1;
    $(this).closest('.form-group').find('.fields').append('<div class="fields_'+x+' form-group"></div>');
    $(this).closest('.form-group').find('.fields_'+x).html($(this).closest('.form-group').find('.fields_0').html());
    $('.datepicker.year-only').datepicker({
        minViewMode: 2
    });
    $('.datepicker').datepicker();
    return false;
});

$('.remove-field').on('click', function(e){
    var input_wrapper = $(this).closest('.form-group').find('div[class*="fields_"]').last();
    if( ! input_wrapper.hasClass('fields_0')){
        input_wrapper.remove();
    }
    return false;
});