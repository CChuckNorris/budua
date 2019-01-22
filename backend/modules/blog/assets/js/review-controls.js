$(document).ready(function () {
// onClick new options list of new select
    var default_text = $('.sortcontrols-menu > li.selected').text();

    if (default_text)
        $('.ae-select-content').text($('.sortcontrols-menu > li.selected').text());

    var newOptions = $('.sortcontrols-menu > li');

    newOptions.click(function () {
        $('.ae-select-content').text($(this).text());
        $('.sortcontrols-menu > li').removeClass('selected');
        $(this).addClass('selected');
    });

    var aeDropdown = $('.ae-dropdown');
    aeDropdown.click(function () {
        $('.sortcontrols-menu').toggleClass('ae-show ae-hide');
    });


    var MenuItemClicker = function () {
        var href = $(this).attr('href');
        var text = $(this).closest('li').attr('title');

        $(".review-loader").show();
        $('.sortcontrols-menu').toggleClass('ae-show eae-hide');

        $.get(href, function (widget_html) {

            $("#sortreviews").html(widget_html);


            $('.ae-select-content').text(text);

            $(".review-loader").hide();
        });

        return false;
    };


    $(".sortcontrols-menu li a").on('click', MenuItemClicker);

});

