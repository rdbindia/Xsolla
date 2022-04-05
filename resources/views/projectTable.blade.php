@include('header')

<body>

<div class="">
    <button data-toggle="modal" data-target="#myModal" id="add_new_btn" class="btn btn-primary btn-lg"><span
            class="glyphicon glyphicon-edit"></span> Add new Project
    </button>
    <div class="row m-5">
        <table id="dtBasicExample" class="table table-striped">
            <thead>
            <tr>
                <th>{{__('UUID')}}</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Description')}}</th>
                <th>{{__('Code')}}</th>
                <th>{{__('Status')}}</th>
                <th class="text-center">{{__('UUID')}}Action</th>
            </tr>
            </thead>
            <tbody>
            @if($tableData)
                @foreach($tableData as $data)
                    <tr>
                        <td>{{$data['project_id']}}</td>
                        <td>{{$data['project_name']}}</td>
                        <td>{{$data['project_description']}}</td>
                        <td>{{$data['project_code']}}</td>
                        <td>@if($data['project_status']) <span class="label label-success">Active</span> @else <span
                                class="label">Inactive</span> @endif</td>
                        <td class="text-center">
                            <a class='btn btn-info btn-lg editProject' href="#" data-toggle="modal"
                               data-target="#myModal" data-id="{{$data['project_id']}}">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-lg deleteProject" data-id="{{$data['project_id']}}"
                               data-target="#deleteModal">
                                <span class="glyphicon glyphicon-remove"></span> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        @include('modal/createProject')

    </div>
</div>
</body>
@include('footer')
<script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "order": [[0, "desc"]]
        });
        $('.dataTables_length').addClass('bs-select');

        // display a modal (small modal)
        $('#createProject').click(function (event) {
            event.preventDefault();
        });


        $('#ajaxSubmit').click(function (e) {
            e.preventDefault();

            let project_id = $('#project_id').val();
            let url = "<?=env('APP_URL') . '/api/store' ?>";
            if (project_id != '') {
                url = "<?=env('APP_URL') . '/api/update/' ?>" + project_id;
            }

            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json',
                data: {
                    project_id: $('#project_id').val(),
                    project_name: $('#project_name').val(),
                    project_description: $('#project_description').val(),
                    is_active: $('#is_active').is(':checked'),
                    _token: $('meta[name="_token"]').attr('content'),
                },
                success: function (result) {
                    if (result.errors) {
                        $('.validate').html('');

                        $.each(result.errors, function (key, value) {
                            $('.validate').show();
                            $('.validate').append('<li>' + value + '</li>');
                        });
                    } else {
                        $('.validate').hide();
                        $('#open').hide();
                        $('#myModal').modal('hide');
                    }

                    setTimeout(function () {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('.editProject').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "<?=env('APP_URL') . '/api/projectData/edit/'?>" + id,
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $('#project_id').val(result.project_id);
                    $('#project_name').val(result.project_name);
                    $('#project_description').val(result.project_description);
                    $('#is_active').prop("checked", false);
                    if (result.project_status) {
                        $('#is_active').prop("checked", true);
                    }
                    $('#myModal').modal('show');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }

            });
        });

        $('.deleteProject').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "<?=env('APP_URL') . '/api/destroy/'?>" + id,
                method: 'post',
                dataType: 'json',
                success: function (result) {
                    $('#deleteModal').modal('show');
                    setTimeout(function () {
                        window.location.reload(1);
                    }, 1000);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>
