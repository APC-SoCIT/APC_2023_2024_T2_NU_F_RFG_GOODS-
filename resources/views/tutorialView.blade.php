<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Search Data with Column Sorting & Pagination using Ajax - Laravelia</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body>
        <br/>
        <div class="container">
            <h3 class="text-center">Laravel Search Data with Filter & Pagination using Ajax - Laravelia</h3><br />
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control custom-select">
                            <option value="">Filter</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" name="searchInput" id="searchInput" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="10%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                            <th width="30%" class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer">Title <span id="post_title_icon"></span></th>
                            <th width="30%">Description</th>
                            <th width="30%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('foreach')
                    </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            </div>
        </div>
    </body>
</html>

<script>
$(document).ready(function(){
    const fetch_data = (page, status, search_term) => {
        if(status === undefined){
            status = "";
        }
        if(search_term === undefined){
            search_term = "";
        }
        $.ajax({ 
            url:"/tutorial/?page="+page+"&status="+status+"&search_term="+search_term,
            data: {
                page:page,
                status:status,
                search_term: search_term,
            },
            success:function(data){
                $('tbody').html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                // Handle the error appropriately (e.g., show an error message)
            }
        })
    }

    $('body').on('keyup', '#searchInput', function(){
        var status = $('#status').val();
        var search_term = $('#searchInput').val();
        var page = $('#hidden_page').val();
        fetch_data(page, status, search_term);
    });

    $('body').on('change', '#status', function(){
        var status = $('#status').val();
        var search_term = $('#searchInput').val();
        var page = $('#hidden_page').val();
        fetch_data(page, status, search_term);
    });

    $('body').on('click', '.pager a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var searchInput = $('#searchInput').val();
        var search_term = $('#status').val();
        fetch_data(page, status, search_term);
    });
});
</script>