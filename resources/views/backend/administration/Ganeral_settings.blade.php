@extends('backend.layoute.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">General Settings</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Administration</li>
        <li class="breadcrumb-item active" aria-current="page">General Settings</li>
    </ol>
</div>

<div class="card-title" style="display: none;">{{ _lang('General Settings') }}</div>
<div class="row">
    <div class="col-md-3 ">
        <div class="nav flex-column nav-pills nav-primary nav-pills-no-bd" id="v-pills-tab-without-border"
            role="tablist" aria-orientation="vertical">
            <a class="nav-link active show" id="v-pills-general-settings-tab" data-toggle="pill"
                href="#v-pills-general-settings" role="tab" aria-controls="v-pills-general-settings"
                aria-selected="true">{{ _lang('General Settings') }}</a>
            <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab"
                aria-controls="v-pills-notification" aria-selected="false">{{ _lang('Notification') }}</a>
            <a class="nav-link" id="v-pills-links-tab" data-toggle="pill" href="#v-pills-links" role="tab"
                aria-controls="v-pills-email" aria-selected="false">{{ _lang('App & Social Links') }}</a>
            <a class="nav-link" id="v-pills-logo-tab" data-toggle="pill" href="#v-pills-logo" role="tab"
                aria-controls="v-pills-logo" aria-selected="false">{{ _lang('Logo & Icon') }}</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content" id="v-pills-without-border-tabContent">
            <div class="tab-pane fade active show" id="v-pills-general-settings" role="tabpanel"
                aria-labelledby="v-pills-general-settings-tab">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3 header-title card-title">{{ _lang('General Settings') }}</h3>
                        <form method="post" class="ajax-submit2 params-card" autocomplete="off"
                            action="{{ route('store_settings') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Company Name') }}</label>
                                        <input type="text" class="form-control" name="company_name"
                                            value="{{ get_option('company_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Site Title') }}</label>
                                        <input type="text" class="form-control" name="site_title"
                                            value="{{ get_option('site_title') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Timezone') }}</label>
                                        <select class="form-control select2" name="timezone" >
                                            <option value="">{{ _lang('Select One') }}</option>
                                            {{ create_timezone_option(get_option('timezone')) }}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Language') }}</label>
                                        <select class="form-control select2" name="language" >
                                            {{-- {{ load_language( get_option('language') ) }} --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ _lang('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-notification" role="tabpanel"
                aria-labelledby="v-pills-notification-tab">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3 header-title card-title">{{ _lang('Notification') }}</h3>
                        <form method="post" class="ajax-submit2 params-card" autocomplete="off"
                            action="{{ route('store_settings') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Notification Type') }}</label>
                                        <select class="form-control select2" name="notification_type"
                                            data-selected="{{ get_option('notification_type', 'onesignal') }}" required>
                                            <option value="onesignal">{{ _lang('One Signal') }}</option>
                                            <option value="fcm">{{ _lang('FCM') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 onesignal d-none">
                                    <div class="form-group">
                                        <label class="form-control-label">One Signal App ID</label>
                                        <input type="text" name="onesignal_app_id" class="form-control"
                                            value="{{ get_option('onesignal_app_id', 'N/A') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 onesignal d-none">
                                    <div class="form-group">
                                        <label class="form-control-label">One Signal Api Key</label>
                                        <input type="text" name="onesignal_api_key" class="form-control"
                                            value="{{ get_option('onesignal_api_key', 'N/A') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 fcm d-none">
                                    <div class="form-group">
                                        <label class="form-control-label">Firebase Server Key</label>
                                        <input type="text" name="firebase_server_key" class="form-control"
                                            value="{{ get_option('firebase_server_key', 'N/A') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 fcm d-none">
                                    <div class="form-group">
                                        <label class="form-control-label">Firebase Topics</label>
                                        <input type="text" name="firebase_topics" class="form-control"
                                            value="{{ get_option('firebase_topics', 'N/A') }}" disabled required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ _lang('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-links" role="tabpanel" aria-labelledby="v-pills-live-tab">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3 header-title card-title">{{ _lang('App & Social Links') }}</h3>
                        <form method="post" class="ajax-submit2 params-card" autocomplete="off"
                            action="{{ route('store_settings') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Facebook') }}</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ get_option('facebook') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Instagram') }}</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ get_option('instagram') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Twitter') }}</label>
                                        <input type="text" class="form-control" name="twitter"
                                            value="{{ get_option('twitter') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Youtube') }}</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ get_option('youtube') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ _lang('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3 header-title card-title">{{ _lang('Logo & Icon') }}</h3>
                        <form method="post" class="ajax-submit2 params-card" autocomplete="off"
                            action="{{ route('store_settings') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                               <div class="col-md-6">
                                       <div class="form-group">
                                        <label class="control-label">{{ _lang('Site Icon') }}</label>
                                        <input type="file" class="form-control dropify" name="icon" data-allowed-file-extensions="png PNG"
                                            data-default-file="{{ get_icon() }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{{ _lang('Site Icon') }}</label>
                                        <input type="file" class="form-control dropify" name="icon"
                                            data-allowed-file-extensions="png PNG" data-default-file="{{ get_icon() }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ _lang('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_content')
<script type="text/javascript">
    @if(get_option('notification_type', 'onesignal') == 'onesignal')
    $('.onesignal').removeClass('d-none').find('input').attr('disabled', false);
    $('.fcm').addClass('d-none').find('input').attr('disabled', true);
    @else
    $('.fcm').removeClass('d-none').find('input').attr('disabled', false);
    $('.onesignal').addClass('d-none').find('input').attr('disabled', true);
    @endif
    $('[name=notification_type]').on('change', function() {
        if($(this).val() == 'onesignal'){
            $('.onesignal').removeClass('d-none').find('input').attr('disabled', false);
            $('.fcm').addClass('d-none').find('input').attr('disabled', true);
        }else{
            $('.fcm').removeClass('d-none').find('input').attr('disabled', false);
            $('.onesignal').addClass('d-none').find('input').attr('disabled', true);
        }
    });
</script>
@endsection
