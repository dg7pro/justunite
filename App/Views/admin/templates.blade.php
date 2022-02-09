@extends('lays.app')

@section('content')

    <div class="container mt-5">

        <nav class="navbar navbar-light bg-light mb-4">
            <form class="container-fluid justify-content-start">
                <h4>Language Templates</h4>
                <button class="btn btn-sm btn-outline-success ms-3" onclick="showNewTemplateForm()" type="button">Add Template +</button>
            </form>
        </nav>

        <div id="lang_type_div">
            <div class="form-check form-check-inline">
                <input class="form-check-input user-type" type="radio" name="lang_type" id="all_lang" value="all" checked>
                <label class="form-check-label" for="all_lang">All</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input user-type" type="radio" name="lang_type" id="english" value="english">
                <label class="form-check-label" for="english">English</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input user-type" type="radio" name="lang_type" id="hindi" value="hindi" >
                <label class="form-check-label" for="hindi">Hindi</label>
            </div>
        </div>


        <div class="form-group">
            <input type="text" id="search_box" name="search_box" class="form-control"
                   placeholder="Type your search query here...">
        </div>
        <div class="table-responsive mt-3" id="dynamic_content"></div>


        <!-- Modal -->
        <div class="modal fade" id="modal-content" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="template-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="template-name">
                        </div>
                        <div class="mb-3">
                            <label for="template-lang" class="form-label">Language</label>
                            <select class="form-select" id="template-lang" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="english">English</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="template-content" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="template-content" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateTemplateInfo()">Save changes</button>
                        <input type="hidden" name="" id="template-id">
                    </div>
                </div>
            </div>
        </div>

        <!-- New Template Modal -->
        <div class="modal fade" id="modal-new-template" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="new-template-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="new-template-name">
                        </div>
                        <div class="mb-3">
                            <label for="new-template-lang" class="form-label">Language</label>
                            <select class="form-select" id="new-template-lang" aria-label="Default select example">
                                <option selected></option>
                                <option value="english">English</option>
                                <option value="hindi">Hindi</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="new-template-content" class="form-label">Example textarea</label>
                            <textarea class="form-control" id="new-template-content" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="createNewTemplate()">Create</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection


@section('extra_js')
    <script>

        function load_data(page, query=''){
            var ut = $("input[name='lang_type']:checked").val();
            $.ajax({
                url: "/ajaxTemplate/fetch-templates",
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

        $(document).ready(function (){

            load_data(1);

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


        function getTemplateInfo(id){
            console.log(id);
            $.post("/ajaxTemplate/fetch-single-template",{templateId:id},function (data, status) {

                console.log(data);
                console.log('working');
                var template = JSON.parse(data);
                $('#template-name').val(template.name);
                $('#template-content').val(template.content);
                $('#template-id').val(template.id);
                $('#template-lang').val(template.lang);

            });
            $('#modal-content').modal("show");
        }

        function updateTemplateInfo(){

            var name = $('#template-name').val();
            var lang = $('#template-lang').val();
            var content = $('#template-content').val();
            var id = $('#template-id').val();

            $.post("/ajaxTemplate/update-single-template",{
                name:name,
                lang:lang,
                content:content,
                id:id

            },function (data, status) {
                console.log(data);
                $('#modal-content').modal("hide");
                load_data(1);
            });
        }

        function showNewTemplateForm(){

            document.getElementById("new-template-name").value=null;
            document.getElementById("new-template-lang").value=null;
            document.getElementById("new-template-content").value=null;

            $('#modal-new-template').modal("show");
        }

        function createNewTemplate(){

            var name = $('#new-template-name').val();
            var lang = $('#new-template-lang').val();
            var content = $('#new-template-content').val();

            $.post("/ajaxTemplate/insertNewTemplateRecord",{
                name:name,
                lang:lang,
                content:content

            },function (data, status) {
                console.log(data);
                $('#modal-new-template').modal("hide");
                load_data(1);
            });
        }

    </script>

@endsection

