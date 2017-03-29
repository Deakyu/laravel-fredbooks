/**
 * Created by Deakyu on 3/25/2017.
 */

// Thumbnail generator
function previewFile() {
    var preview = document.querySelector('img');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    };

    if(file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }

}



var page = 1;
var bookPanel = $('#book-panel');

bookPanel.on('scroll', function() {
    // if($(window).scrollTop() + $(window).height() >= $(document).height()) {
    //     page++;
    //     loadMoreData(page);
    // }
    if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight - 5) {
        page++;
        loadMoreData(page);
    }
});


// $('#more-button').on('click', function() {
//    page++;
//    loadMoreData(page);
// });

function loadMoreData(page) {
    $.ajax(
        {
            url: '/book?page=' + page,
            type: "get",
            beforeSend: function() {
                $('.ajax-load').show();
            }
        }
    )
        .done(function(data) {
            if(data.html == " ") {
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $('#book-panel').append(data.html);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            alert('server not responding');
        });
}