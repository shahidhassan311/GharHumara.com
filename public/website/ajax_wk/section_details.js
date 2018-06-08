$(document).ready(function () {
    var hall_section_id = $("input[name='hall_section_ids']").val();
    var token = $("input[name='token']").val();
    $.ajax({
        url: 'http://weddecore.com/section_details',
        method: 'POST',
        data: {hall_section_id: hall_section_id, _token: token},
        success: function (data) {
            data.image.forEach(function (img) {
                // console.log(img.images);
            });
            data.options.forEach(function (val) {
                document.getElementById('address_ajax').innerHTML = val.address;
                document.getElementById('hall_section_ajax').innerHTML = val.section_name;
                document.getElementById('amount_ajax').innerHTML = "Rs " + val.amount;
                document.getElementById('hall_details_ajax').innerHTML = val.detail_section;
                if (val.images !== null){
                    $("#image_ajax").attr("src", "http://weddecore.com/uploads/" + val.images);
                }else{
                    $("#image_ajax").attr("src", "http://weddecore.com/placeholder.png");
                }
            });
        }
    });

});
function sectionid(id) {
    var token = $("input[name='token']").val();
    $.ajax({
        url: 'http://weddecore.com/section_click_where_details',
        method: 'POST',
        data: {hall_section_id: id, _token: token},
        success: function (data) {
            console.log(data);
            data.image.forEach(function (img) {
                // console.log(img.images);
            });
            data.options.forEach(function (val) {
                document.getElementById('address_ajax').innerHTML = val.address;
                document.getElementById('hall_section_ajax').innerHTML = val.section_name;
                document.getElementById('amount_ajax').innerHTML = "Rs " + val.amount;
                document.getElementById('hall_details_ajax').innerHTML = val.detail_section;
                if (val.images !== null){
                    $("#image_ajax").attr("src", "http://weddecore.com/uploads/" + val.images);
                }else{
                    $("#image_ajax").attr("src", "http://weddecore.com/placeholder.png");
                }
            });
        }
    });
}
