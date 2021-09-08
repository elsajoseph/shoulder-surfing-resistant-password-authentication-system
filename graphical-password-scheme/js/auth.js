// For Rows
$('#btn-row-increment').on('click', function() {
    // console.log('------ ROW INCREMENT -----');
    var navigatorRows = $('.navigator-row');
    navigatorRows.each(function(index) {
        let dataCode = $(this).attr('data-code');
        let newDataCode = ( ( parseInt(dataCode) + 1 ) % 4);
        $(this).attr('data-code', newDataCode);
        $(this).text(newDataCode);
        // console.log(dataCode, newDataCode);
    });

    $('.data-cell').each(function(index) {
        let dataCode = $(this).attr('data-row');
        let newDataCode = ( ( parseInt(dataCode) + 1 ) % 4);
        $(this).attr('data-row', newDataCode);
    });

//     var dataJson = $('#data-json').val();
//     var json = $.parseJSON(dataJson);
//     json[0][1]['row'] = newDataCode;
});

// For Columns
$('#btn-column-increment').on('click', function() {
    var navigatorColumns = $('.navigator-column');
    navigatorColumns.each(function(index) {
        let dataCode = $(this).attr('data-code');
        let newDataCode = ( ( parseInt(dataCode) + 1 ) % 4);
        $(this).attr('data-code', newDataCode);
        $(this).text(newDataCode);
        });

    $('.data-cell').each(function(index) {
        let dataCode = $(this).attr('data-column');
        let newDataCode = ( ( parseInt(dataCode) + 1 ) % 4);
        $(this).attr('data-column', newDataCode);
    });
    
});


$('#login-submit').on('click', function() {
    event.preventDefault();
    var jsonData = new Array();

    // Remove error messages, if any.
    $('#result').html('');

    $('.table-row').each(function(index, row) {

       var currentRow = new Array();

        $(row).find('.data-cell').each(function(key, element) {

            currentRow.push({
                default_row: $(element).attr('data-default-row'),
                default_column: $(element).attr('data-default-column'),
                row: $(element).attr('data-row'),
                column: $(element).attr('data-column'),
            });

        });
        jsonData.push(currentRow);

    });

    $.post("final.php", {username: $('#username').val(), value:jsonData}, function(data){
        $("#result").html(data);
    });

});

// Logic
/*
Data Index should be Choosen Image row and column: 3 3
Data Code should be the session code: 3 0
*/