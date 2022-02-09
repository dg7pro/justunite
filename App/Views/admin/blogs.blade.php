@extends('lays.app')

@section('content')

    <div class="container mt-5">

        <div class="row mt-3 mb-3">
            <div class="col-lg-12">

                <h2><span class="ml-5">Articles</span>
                    <button onclick="showNewArticleForm()" type="button" class="pl-3 mb-1 ml-3 btn btn-sm btn-primary"> Create +</button></h2>

                <p class="mb-5">Add edit and manage articles of the blog (Only Administrator).</p>

                <div id="records_content"></div>

            </div>
        </div>


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
                            <label for="content-title" class="form-label">Name</label>
                            <input type="text" class="form-control" id="content-title">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateContentInfo()">Save changes</button>
                        <input type="hidden" name="" id="content-id">
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('extra_js')
    <script>

        $(document).ready(function(){
            readRecords();
        });

        //=================
        // Read Record
        //=================
        function readRecords() {

            var readrecord = "readrecord";
            $.ajax({
                url: "/ajaxBlog/fetch-contents",
                type: "POST",
                data: {
                    readrecord:readrecord
                },
                success: function(data,status){
                    //console.log(data);
                    $('#records_content').html(data);
                }
            })
        }

        function getContentInfo(id){
            console.log(id);
            $.post("/ajaxBlog/fetchSingleContentRecord",{contentId:id},function (data, status) {

                console.log(data);
                console.log('working');
                var content = JSON.parse(data);
                $('#content-title').val(content.title);
                $('#content-id').val(content.id);

            });
            $('#modal-content').modal("show");
        }

        function updateContentInfo(){

            var title = $('#content-title').val();
            var id = $('#content-id').val();

            $.post("/ajaxBlog/update-single-content-record",{
                title:title,
                id:id

            },function (data, status) {
                console.log(data);
                $('#modal-content').modal("hide");
                readRecords();
            });
        }

    </script>

@endsection

