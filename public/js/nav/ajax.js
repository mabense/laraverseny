
function updateSegments(result) {
    $template = $('#ajax').prop('content');
    $('title').html( $($template).find('title').text() + result['title']);
    $('#page').html(result['page']);
    $('footer').html(result['feedback']);

    $('aside').fadeOut();
}

$(document).ready(function() {


    $("a").on('click', function(event) {
        // AJAX navigation on links
        
        event.preventDefault();
        // event.stopPropagation();
        // event.stopImmediatePropagation();

        let state = {
            url: this.href,
            type: 'GET',
            success: function(result) {
                updateSegments(result);
            }
        };

        history.pushState({}, '', this.href);

        jQuery.ajax(state);
    });


});


$(window).on('popstate', function(event) {
    // AJAX navigation on browser's back button
    
    event.preventDefault();
    // event.stopPropagation();
    // event.stopImmediatePropagation();

    jQuery.ajax({
        url: location.href,
        type: 'GET',
        success: function(result) {
            updateSegments(result);
        }
    });
});