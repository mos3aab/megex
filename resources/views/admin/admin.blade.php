@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">Customize Home Page</h3>

        </div>
    </div>

    <div class="card">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Option </th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($options))
                    @foreach ($options as $opt)
                        <tr>
                            <td>{{ $opt->option }}</td>
                            <td> <a class="btn btn-primary btn-lg set_option" data-option="{{ $opt->option }}"
                                    data-id="{{ $opt->id }}" data-value="{{ $opt->value }}" data-toggle="modal"
                                    data-target="#modelId">Edit</a> </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>


        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @csrf
                    <div class="modal-body">
                        Body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            var prods = {!! json_encode(isset($products) ? $products : null) !!};
            checkDataSection();

            function checkDataSection() {
                $(".set_option").unbind();
                $(".set_option").on('click', function() {
                    var value = $(this).data('value');
                    var option = $(this).data('option');
                    var id = $(this).data('id');
                    var token = $("input[name='_token").val();
                    $('.modal-title').empty();
                    $('.modal-body').empty();
                    $('.modal-title').html(option);
                    var html = '*products which have images <br>';
                    $.each(prods, function(i, v) {
                        html += "<input type='checkbox' name='product[]' class='prodItem prod" + v
                            .id + "' value ='" + v.id + "'>  " + v.name + " <br>";
                    });
                    $('.modal-body').html(html);

                    if (typeof(value) == "string") {
                        var arr = value.split(",");
                        $.each(arr, function(key, val) {
                            $('.prod' + val + '').prop('checked', true);
                        });
                    } else {
                        $('.prod' + value + '').prop('checked', true);
                    }

                    $("#save").unbind();
                    $('#save').click(function(e) {
                        var list = '';
                        $("input[type=checkbox]:checked").each(function(k, v) {
                            if (k == $("input[type=checkbox]:checked").length - 1) list +=
                                v['value'];
                            else list += v['value'] + ',';
                        })

                        $.ajax({
                            type: "post",
                            url: "/admin",
                            data: {
                                id: id,
                                list: list,
                                _token: token
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response == true) {
                                    $("#modelId").modal("hide");
                                    location.reload();
                                    checkDataSection();

                                }
                            }
                        });
                    });

                });
            }

        });
    </script>
@endsection
