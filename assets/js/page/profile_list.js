$(document).ready(function(){
    $.post('get_profile_list', function(data){
        var info = JSON.parse(data);
        console.log(info);
        var html = '';
        for(var i = 0; i < info.length; i++){
            html += '<tr id="' + i + '">';
            for (var key in info[i]) {
               if(info[i].hasOwnProperty(key) && (key === 'last_name' || key === 'first_name' || key === 'middle_name' || key === 'profile_pic')){
                   if(key === 'profile_pic'){
                       var style = 'background-image: url(' + info[i][key]['src'] + ')';
                       html += '<td><div class="id_picture" id="user_' + i + '" style="' + style + '"></div></td>';
                   } else {
                       html += '<td>' + info[i][key] + '</td>';
                   }
               }
            }
            html += '</tr>';
        }
        $('#profile_list > tbody').html(html);
    });
});


