$(document).ready(function() {
    $(document).on('click', '.category_checkbox', function () {
        var ids = [];
        var counter = 0;
        $('#catFilters').empty();
        $('.category_checkbox').each(function () {
            if ($(this).is(":checked"))
            ids.push($(this).attr('id'));
            $('#catFilters').append(`<div class="text-black"> 
            ${$(this).attr('attr-name')} 
            <button type="button" class="bg-rfg-accent" </button></div>`);
            counter++;

        });
    });

});