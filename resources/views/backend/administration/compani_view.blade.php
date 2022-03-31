@extends('backend.layoute.app')
@section('content')

<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">live view Tables</h6>
                <a class="btn btn-success" href="{{url('/live_information')}}">add </a>
            </div>
            <div class="table-responsive">

                <table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>id</th>
                            <th>team one</th>
                            <th>team two </th>
                            <th> match title</th>
                            <th> Date & Time</th>
                            <th>action</th>

{{-- <form class="delete-form" action="{{ route('live_matches.store,'+item.id+'') }}" method="POST">
    @method('delete')
<button type="submit" class="btn btn-sm btn-danger delet">delete</button>
</form> --}}
                        </tr>
                    </thead>

                    <tbody id="append">

                    </tbody>

                    {{-- <tbody> --}}

{{--
                        @foreach ($user as $user)

                        <tr>

                            <td id="sid">{{ $user->id }}</td>
                            <td>{{ $user->team_one_name }}</td>
                            <td>{{ $user->team_one_image_type }}</td>
                            <td>
                                @if ($user->team_one_url == '')
                                <img src="{{ asset('/public/Image/'.$user->team_one_image) }}" width="70px" height="70px" class="rounded"
                                    alt="" srcset="">
                                @else
                                <a class="btn" href="{{ $user->team_one_url }}" target="_blank" rel="noopener noreferrer">image url</a>
                                @endif
                            </td>
                            <td>{{ $user->match_date }}
                            <br>
                            {{ $user->match_time }}
                            </td>
                            <td>{{ $user->team_two_name }}</td>
                            <td>{{ $user->team_two_image_type }}</td>
                            <td>
                                @if ($user->team_two_url == '')
                                <img src="{{ asset('/public/Image/'.$user->team_two_image) }}" width="70px" height="70px" class="rounded"
                                    alt="" srcset="">
                                @else

                                <a class="btn" href="{{ $user->team_two_url }}" target="_blank">image url</a>
                                @endif
                            </td>
                            <td>
                                <a href="javascript::void(0)" onclick="" class="btn btn-sm btn-success">Edit</a>
                                <a href="javascript::void(0)" onclick="" class="btn btn-sm btn-primary">Delet</a>
                            </td>
                        </tr>
                        @endforeach --}}

                    {{-- </tbody> --}}

                </table>

            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>


@endsection

@section('js_content')
<script>
    $(document).ready(function () {
        lodtable()
        function lodtable(){
            $.ajax({
                type: "get",
                url: "{{ url('face/data') }}",

                // dataType: "json",
                success: function (response) {
                    // console.log(response.user)
                    // alert (response.user->team_one_name)
                    $('tbody').html("");
                    $.each(response.user, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.team_one_name+'</td>\
                            <td>'+item.team_two_name+'</td>\
                            <td>'+item.match_title+'</td>\
                            <td>'+item.match_date +'<br>' +item.match_time+'</td>\
                            <td><button type="button" class="btn btn-sm btn-success">edit</button>\
                                <button value="'+item.id+'" class="btn btn-sm btn-danger delet">delete</button></td>\
                            </tr>');
                    });
                }
            });
        }

     $(document).on("click",".delet", function () {
        var id = $(this).val();
        // alert(id)
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            type: "DELETE",
            url: "/live/delet/"+id,
            success: function (response) {
                alert(response.success);
                lodtable();
            }
        });

     });


    });

</script>
@endsection
