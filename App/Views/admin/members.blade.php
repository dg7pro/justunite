@extends('lays.app')

@section('content')

    <div class="container mt-5">

        <div id="user_type_div">
            <div class="form-check form-check-inline">
                <input class="form-check-input user-type" type="radio" name="user_type" id="all_user" value="all" checked>
                <label class="form-check-label" for="all_user">All</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input user-type" type="radio" name="user_type" id="admin" value="admin">
                <label class="form-check-label" for="admin">Admin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input user-type" type="radio" name="user_type" id="blocked" value="blocked" >
                <label class="form-check-label" for="blocked">Blocked</label>
            </div>
        </div>


        <div class="form-group">
            <input type="text" id="search_box" name="search_box" class="form-control"
                   placeholder="Type your search query here...">
        </div>
        <div class="table-responsive" id="dynamic_content"></div>


    </div>


@endsection


@section('extra_js')
    <script>

        $(document).ready(function (){

            load_data(1);

            function load_data(page, query=''){
                var ut = $("input[name='user_type']:checked").val();
                $.ajax({
                    url: "/Adjax/search-user-blocked",
                    method: "POST",
                    data:{
                        page:page,
                        query:query,
                        category:ut
                    },
                    success:function(data){
                        $('#dynamic_content').html(data);
                    }
                });
            }

            $(document).on('click','.user-type',function(){
                console.log('radio changed');
                var query = $('#search_box').val();
                load_data(1, query);
            });

            $(document).on('click', '.page-link', function(){
                var page = $(this).data('page_number');
                var query = $('#search_box').val();
                load_data(page, query);
            });

            $('#search_box').keyup(function(){
                var query = $('#search_box').val();
                load_data(1, query);
            });

        });

    </script>

@endsection

