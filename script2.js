function search() {
    var searchInput = $('#searchInput').val();
    $.ajax({
        type: 'POST',
        url: 'search.php',
        data: { searchInput: searchInput },
        success: function (response) {
            $('#searchResults').html(response);
        }
    });
}
