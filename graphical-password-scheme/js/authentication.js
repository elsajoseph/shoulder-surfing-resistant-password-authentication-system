$('#authentication-form').bind('submit', function(event) {
    event.preventDefault();

    // Remove error messages, if any.
    $('#result').html('');

    var values = $(this).serializeArray();

    // console.log(values);

    // var selectedRow = $('.data-cell[data-selected="true"]').attr('data-row');
    // var selectedColumn = $('.data-cell[data-selected="true"]').attr('data-column');

    // values.push({name: 'selected_row', value: selectedRow});
    // values.push({name: 'selected_column', value: selectedColumn});

    $.post("authentication.php", values, function(data){
        $("#result").html(data);
    });
});