@section('header')
    <link rel="stylesheet" href="/assets/css/richtext.min.css">
    <link rel="stylesheet" href="/assets/css/all.css">
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <style>
        nav[aria-label="Pagination Navigation"] div:nth-child(1){
            display:none!important;
        }
        ul li a span{
            color: #6a6a6a;
        }
    </style>
@stop
@include('admin.content.header')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Properties List
            <div class="add_new cp" style="float:right">
                <i class="lni lni-plus"></i> Add
            </div>
        </h6>
        <hr>
        <div class="card">
            <div class="card-body">
                <div class="row content">
                    <div class="col-lg-122 text-center">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-start">Title</th>
                                <th class="text-start">Area</th>
                                <th class="text-start">Age</th>
                                <th class="text-start">Price</th>
                                <th class="text-start">Url</th>
                                <th class="text-start">Description</th>
                                <th>Tools</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($dataList)==0)
                                <th colspan="5"><p class="text-center mt-5 mb-5" style="font-weight: 400;color:#bfbfbf!important">No information found</p></th>
                            @else
                                @foreach($dataList as $list)
                                    <tr>
                                        <th class="vertical-align" scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-start text-capitalize">{{$list->title}}</td>
                                        <td class="text-start text-capitalize">{{$list->area}}</td>
                                        <td class="text-start text-capitalize">{{$list->age}}</td>
                                        <td class="text-start text-capitalize">{{$list->price}}</td>
                                        <td class="text-start text-capitalize"><a target="_blank" href="/{{$list->slug}}">{{$list->slug}}</a></td>
                                        <td class="text-start" style="max-width: 200px;"><p class="ellipsis m-0">{{$list->description}}</p></td>
                                        <th scope="row">
{{--                                            @if($list->type!="system")--}}
{{--                                                <span class="oprator_delete cp me-2" src="" caption="{{ $list->name }}">--}}
{{--                                                    <i class="lni lni-trash"></i>--}}
{{--                                                </span>--}}
{{--                                            @endif--}}
                                            <i class="lni lni-pencil edit cp" id="{{$list->id}}"></i>
                                        </th>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {!! $dataList->withQueryString()->links()!!}
    </div>
</div>
<div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="pageModalLbl" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pageModalLbl">Page Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('admin_properties_submit')}}" id="submit_form">
                @csrf
                <div class="modal-body">
                    <div class="loading text-center mt-2 mb-5"><div class="spinner-grow mx-auto mt-5" role="status"> <span class="visually-hidden">Loading...</span></div></div>
                    <div class="row content d-none">
                        <div class="col-md-6">
                            <label for="title" class="form-label text-capitalize">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <input type="hidden" class="form-control" name="mode">
                            <input type="hidden" class="form-control" id="imagePath" name="image">
                        </div>
                        <div class="col-md-6">
                            <label for="slug" class="form-label text-capitalize">Url</label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>
                        <div class="col-md-6">
                            <label for="area" class="form-label text-capitalize">Area</label>
                            <input type="text" class="form-control" id="area" name="area">
                        </div>
                        <div class="col-md-6">
                            <label for="age" class="form-label text-capitalize">Age</label>
                            <input type="text" class="form-control" id="age" name="age">
                        </div>
                        <div class="col-md-6">
                            <label for="amenity" class="form-label text-capitalize">Amenity</label>
                            <input type="text" class="form-control" id="amenity" name="amenity">
                        </div>

                        <div class="col-md-6">
                            <label for="price" class="form-label text-capitalize">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="col-md-4">
                            <label for="country" class="form-label text-capitalize">Country</label>
                            <input type="text" class="form-control" id="country" name="country">
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label text-capitalize">State</label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label text-capitalize">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="description" class="form-label text-capitalize">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="keys" class="form-label text-capitalize">Keywords</label>
                            <select class="form-control" id="keys" multiple="multiple"></select>
                            <input type="hidden" class="form-control" name="keywords">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="content" class="form-label text-capitalize">Page content</label>
                            <textarea class="content" id="content" name="content"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label text-capitalize">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label text-capitalize">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="Once_Image_Box cp mt-3" onclick="FM_Once(500,10)" style="height: 90px;background-position: center center;background-size: cover;width: 350px;background-image: url(&quot;/cdn/1637061773.jpg&quot;);" file="cdn/1637061773.jpg"></div>
                            <input type="hidden" class="form-control" name="id">
                        </div>

                        <div class="col-lg-12 errors row mx-auto"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary px-5 save">Save</button>
                    <button type="button" class="btn btn-outline-secondary px-5" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script')
    <script src="/assets/js/jquery.richtext.js"></script>
    <script src="/assets/plugins/select2/js/select2.min.js"></script>
    <script src="https://sandb.money/assets/js/jquery.form.js" ></script>
    <script>

        $( document ).ready(function() {
            $(document.body).on("change","#keys",function(){
                $('input[name=keywords]').val($('#keys').val());
            });

            $('.content[id=content]').richText({height: 250});
            $("#keys").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $('#submit_form').ajaxForm({
                beforeSend:function(){
                    $('.errors').html('');
                    $('button[type=submit]').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    $('button[type=submit]').prop("disabled",true);
                },
                uploadProgress:function(event, position, total, percentComplete)
                {

                },
                success:function(data)
                {
                    location.reload();
                },
                error: function(error){
                    $('button[type=submit]').html('Submit');
                    $('button[type=submit]').prop("disabled",false);
                    $.each( error.responseJSON.errors, function( key, value ) {
                        $('.errors').append('<div class="col-6 alert alert-danger" style="margin-left: 12px;width: calc( 50% - 30px );">'+ value[0] +'</div>');
                    });
                }
            });

        });
        $(".add_new").click(function() {
            $('.Once_Image_Box').css("background-image","url(/assets/images/default/default_super_wide.jpg)");
            $('.errors').html('');
            $('#pageModal').modal('show');
            $('#pageModal .loading').addClass('d-none');
            $('input[name=id]').val('');
            $('input[name=title]').val('');
            $('input[name=keywords]').val('');
            $('input[name=description]').val('');
            $('#pageModal .content').removeClass('d-none');
            $('input[name=area]').val('');
            $('input[name=country]').val('');
            $('input[name=state]').val('');
            $('input[name=city]').val('');
            $('input[name=image]').val('');
            $('input[name=amenity]').val('');
            $('input[name=price]').val('');
            $('input[name=age]').val('');
            $('input[name=slug]').val('');
            $('input[name=status]').val('');
            $('input[name=mode]').val('new');
            $('#keys').val(null).trigger("change");
            $(".richText-editor").first().html("");
        });
        $(".edit").click(function() {
            $(".add_new").trigger( "click" );
            $('input[name=mode]').val('edit');
            $('#pageModal .loading').removeClass('d-none');
            $('#pageModal .content').addClass('d-none');
            $('#pageModal .referral_user_image').addClass('d-none');
            var formData = new FormData();
            formData.append('id',$(this).attr('id'));

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            $.ajax({
                type: 'POST',
                url:  "{{ route('admin_properties_edit') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function(resultData) {
                    $('input[name=id]').val(resultData.id);
                    $('input[name=title]').val(resultData.title);
                    $('input[name=description]').val(resultData.description);
                    $('input[name=content]').val(resultData.content);
                    $('input[name=area]').val(resultData.area);
                    $('input[name=country]').val(resultData.country);
                    $('input[name=state]').val(resultData.state);
                    $('input[name=city]').val(resultData.city);
                    $('input[name=image]').val(resultData.image);
                    $('input[name=amenity]').val(resultData.amenity);
                    $('input[name=price]').val(resultData.price);
                    $('input[name=age]').val(resultData.age);
                    $('input[name=slug]').val(resultData.slug);
                    $('input[name=status]').val(resultData.status);
                    $('#pageModal .loading').addClass('d-none');
                    $('#pageModal .content').removeClass('d-none');
                    $('.Once_Image_Box').css("background-image","url(/"+ resultData.image +")");
                    $(".richText-editor").first().html(resultData.content);
                    $("textarea").val(resultData.content);

                    var keywords = resultData.keywords;
                    var keywords_data = keywords.split(",");
                    for(var i=0;i<keywords_data.length;i++)
                    {
                        var keys = new Option(keywords_data[i], keywords_data[i], true, true);
                        $("#keys").append(keys).trigger('change');
                    }
                }
            });
        });
    </script>
@stop
@include('admin.plugins.filemanager.index')
@include('admin.content.delete')
@include('admin.content.footer')
