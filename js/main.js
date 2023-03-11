

jQuery(document).ready(function($) {
    $('#circle-button').on('click', function() {
        alert('Hello World!');
    });

    $('#mobile-menu-toggle').click(function() {
        $('#mobile-menu').toggleClass('show');
        var menu_toggle = $('#mobile-menu-toggle');
        var svg_code_cross_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>'; // Menu Cross Icon
        var svg_code_list_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>';
        var body = $('body');
        if ($('#mobile-menu').hasClass('show')) {
            menu_toggle.html(svg_code_cross_icon);
            body.addClass('body-state-mobile');
        } else {
            menu_toggle.html(svg_code_list_icon);
            body.removeClass('body-state-mobile');
        }
    });
});