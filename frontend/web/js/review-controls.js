$(document).ready(function () {
// onClick new options list of new select
    var default_text = $('.sorting-dropdown-menu > li.selected').text();

    if (default_text)
        $('.ae-select-content').text($('.sorting-dropdown-menu > li.selected').text());

    var newOptions = $('.sorting-dropdown-menu > li');

    newOptions.click(function () {
        $('.ae-select-content').text($(this).text());
        $('.sorting-dropdown-menu > li').removeClass('selected');
        $(this).addClass('selected');
    });

    var aeDropdown = $('.ae-dropdown');
    aeDropdown.click(function () {
        $('.sorting-dropdown-menu').toggleClass('ae-hide');
    });


    var MenuItemClicker = function () {
        var href = $(this).attr('href');
        var text = $(this).closest('li').attr('title');

        $(".review-loader").show();
        $('.sorting-dropdown-menu').toggleClass('ae-hide');

        $.get(href, function (widget_html) {

            $("#sortreviews").html(widget_html);


            $('.ae-select-content').text(text);

            $(".review-loader").hide();
        });

        return false;
    };


    $(".sorting-dropdown-menu li a").on('click', MenuItemClicker);

});

