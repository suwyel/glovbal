@extends('backend.layoute.app')

@section('content')
    <style>
        .h2,
        h2 {
            font-size: 1rem;
        }

    </style>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Live Matches List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Live Matches List</li>

        </ol>
    </div>

    <h2 class="card-title d-none">{{ _lang('Add New') }}</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
    <form method="post" class="ajax-submit2s" autocomplete="off" action="{{ route('live_matches.store') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Match Information') }}</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('series') }}</label>
                                    <input type="text" class="form-control" name="match_title"
                                        value="{{ old('match_title') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                                        <div class="col-6">
                                            <label class="control-label ">{{ _lang('Match date') }}</label>
                                            <input type="date" class="form-control flatpickr" name="match_date"
                                                value="{{ old('match_date') }}" required>
                                        </div>
                                        <div class="col-6">
                                            <label class="control-label">{{ _lang('Match time') }}</label>
                                            <input type="time" class="form-control" name="match_time"
                                                value="{{ old('match_time') }}" required>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Team One Information') }}</h2>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Name') }}</label>
                                    <input type="text" class="form-control" name="team_one_name"
                                        value="{{ old('team_one_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Type') }}</label>
                                    <select class="form-control select2" name="team_one_image_type"
                                        data-selected="{{ old('team_one_image_type', 'none') }}">
                                        <option value="none">{{ _lang('None') }}</option>
                                        <option value="url">{{ _lang('Url') }}</option>
                                        <option value="image">{{ _lang('Image') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Url') }}</label>
                                    <input type="text" class="form-control" name="team_one_url"
                                        value="{{ old('team_one_url') }}">
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image') }}</label>
                                    <input type="file" class="form-control dropify" name="team_one_image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ml-2">
                                <h2 class="b">{{ _lang('Team Two Information') }}</h2>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Name') }}</label>
                                    <input type="text" class="form-control" name="team_two_name"
                                        value="{{ old('team_two_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Type') }}</label>
                                    <select class="form-control select2" name="team_two_image_type"
                                        data-selected="{{ old('team_two_image_type', 'none') }}">
                                        <option value="none">{{ _lang('None') }}</option>
                                        <option value="url">{{ _lang('Url') }}</option>
                                        <option value="image">{{ _lang('Image') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image Url') }}</label>
                                    <input type="text" class="form-control" name="team_two_url"
                                        value="{{ old('team_two_url') }}">
                                </div>
                            </div>
                            <div class="col-md-12 d-none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Image') }}</label>
                                    <input type="file" class="form-control dropify" name="team_two_image"
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 ml-2">
                            <h2 class="b">{{ _lang('Streaming Sources') }}</h2>
                        </div>
                        <div class="field-group params-card mx-4 my-2 row" style="width: 100%;">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-xs remove">-</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Stream Title</label>
                                    <input type="text" class="form-control" name="stream_title[]" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Stream Type') }}</label>
                                    <select class="form-control select2" name="stream_type[]" data-selected="web"
                                        required>
                                        <option value="web">Web</option>
                                        <option value="m3u8">m3u8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Stream Url') }}</label>
                                    <input type="text" class="form-control" name="stream_url[]"
                                        value="{{ old('stream_url') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-sm add-more">Add More</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        </div>


        <div class="col-md-12 text-right mt-3">
            <button type="reset" class="btn btn-danger btn-sm">{{ _lang('Reset') }}</button>
            <button type="submit" class="btn btn-primary btn-sm">{{ _lang('Save') }}</button>
        </div>

        </div>
    </form>
    <div class="d-none">

        <div class="field-group params-card mx-4 my-2 row repeat" style="width: 100%;">
            <div class="col-md-12 text-right">
                <div class="form-group">
                    <button type="button" class="btn btn-danger btn-xs remove">-</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Stream Title</label>
                    <input type="text" class="form-control" name="stream_title[]" required="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Stream Type') }}</label>
                    <select class="form-control" name="stream_type[]" data-selected="web" required>
                        <option value="web">Web</option>
                        <option value="m3u8">m3u8</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">{{ _lang('Stream Url') }}</label>
                    <input type="text" class="form-control" name="stream_url[]" value="{{ old('stream_url') }}"
                        required>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_content')
    <script type="text/javascript">
        $('[name=team_one_image_type]').on('change', function() {
            $('[name=team_one_image]').closest('.col-md-12').addClass('d-none');
            $('[name=team_one_url]').parent().parent().addClass('d-none');

            if ($(this).val() == 'url') {
                $('[name=team_one_url]').parent().parent().removeClass('d-none');

            } else if ($(this).val() == 'image') {
                $('[name=team_one_image]').closest('.col-md-12').removeClass('d-none');
            } else {
                $('[name=team_one_image]').closest('.col-md-12').addClass('d-none');
                $('[name=team_one_url]').parent().parent().addClass('d-none');
            }
        });
        $('[name=team_two_image_type]').on('change', function() {
            $('[name=team_two_image]').closest('.col-md-12').addClass('d-none');
            $('[name=team_two_url]').parent().parent().addClass('d-none');

            if ($(this).val() == 'url') {
                $('[name=team_two_url]').parent().parent().removeClass('d-none');

            } else if ($(this).val() == 'image') {
                $('[name=team_two_image]').closest('.col-md-12').removeClass('d-none');
            } else {
                $('[name=team_two_image]').closest('.col-md-12').addClass('d-none');
                $('[name=team_two_url]').parent().parent().addClass('d-none');
            }
        });

        $('[name=team_one_image]').on('keyup', function() {
            $('.image_one').html('<img src="' + $(this).val() +
                '" style="width: 50px;height: 50px; border-radius: 10px;">');
        });
        $('[name=team_two_image]').on('keyup', function() {
            $('.image_two').html('<img src="' + $(this).val() +
                '" style="width: 50px;height: 50px; border-radius: 10px;">');
        });

        $('.add-more').on('click', function() {
            var form = $('.repeat').clone().removeClass('repeat');
            form.find('.remove').addClass('remove-row');
            form.find('input').val('');
            form.find('[name=stream_type]').select2();
            $(this).closest('.col-md-12').before(form);
        });

        $(document).on('click', '.remove-row', function() {
            $(this).closest('.field-group').remove();
        });

        $(document).on('change', '[name=stream_type]', function() {
            $(this).closest('.field-group').find('.own').addClass('d-none').find('input').attr('disabled', true);

            if ($(this).val() == 'own') {
                $(this).closest('.field-group').find('.own').removeClass('d-none').find('input').attr('disabled',
                    false);
            } else if ($(this).val() == 'bingsport') {
                $(this).closest('.field-group').find('.own').addClass('d-none').find('input').attr('disabled',
                true);;
            }
        });
    </script>
@endsection
