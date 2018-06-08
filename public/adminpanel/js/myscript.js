$( document ).ready(function() {
    $("#search_filter").on('click',function(){
        var g = $('#hall_id').val();
        var hall_id = $('#browsers option[value=' + g +']').attr('data-id');
        var hall_month = $("#hall_month").val();
        var hall_year = $("#hall_year").val();
        var token = $("input[name='_token']").val();
        var table = $("table#sample-data-table tbody");
        $.ajax({
            url: 'http://weddecore.com/search_filter_data',
            method: 'POST',
            data: {hall_id:hall_id,hall_month:hall_month,hall_year:hall_year, _token:token},
            success: function(data) {

                if(data[0] !== "data not found"){
                    var _html = "";
                    table.empty();
                    data.options.forEach(function (val) {
                        _html += "<tr>";
                        _html += "<td>"+val.booking_id+"</td>";
                        _html += "<td>"+val.hall_name+"</td>";
                        _html += "<td>"+val.section_name+"</td>";
                        _html += "<td>"+val.booking_date+"</td>";
                        _html += "<td>"+val.message+"</td>";
                        _html += "<td>"+val.status+"</td>";
                        _html += "</tr>";
                    });
                    table.append(_html);
                }else{
                    table.empty();
                    _html += "<tr><td>No record found!</td></tr>";
                    table.append(_html);
                }


            }
        });
    });


});
$(function () {
    $("select[name='id_country']").change(function(){
        var id_country = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: 'http://weddecore.com/selectAjax',
            method: 'POST',
            data: {id_country:id_country, _token:token},
            success: function(data) {
                $("select[name='id_state']").html('');

                var _html = "<option value="+data.options.id+">"+data.options.section_name+"</option>";
                $("select[name='id_state']").html(_html);
            }
        });
    });




});