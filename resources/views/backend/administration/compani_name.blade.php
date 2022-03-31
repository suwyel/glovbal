<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>welcome</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: rgb(200, 199, 199);
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;

            margin: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center d-flex vh-100 align-items-center">
            <div class="col-6 ">
                <div class="step-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card card-signin my-5">
                                    <div class="card-header text-center">
                                        System Settings
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('compani/info/sav') }}" method="post" autocomplete="off">
                                            {{ csrf_field() }}

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Company Name</label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Site Title</label>
                                                    <input type="text" class="form-control" name="site_title" required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Timezone</label>
                                                    <select class="form-control select2" name="timezone" required>
                                                        <option value="">Select One</option>
                                                        {{ create_timezone_option() }}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Language</label>
                                                    <select class="form-control" name="language" required>
                                                        {{-- {!! load_language('English') !!} --}}
                                                        <option value="English">English</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <input type="hidden" name="ads_control" value="off" required>
                                            <input type="hidden" name="live_control" value="off" required>
                                            <input type="hidden" name="privacy_policy" value="https://cric2day.com/"
                                                required>
                                            <input type="hidden" name="facebook" value="https://www.facebook.com/"
                                                required>
                                            <input type="hidden" name="youtube" value="http://youtube.com/" required>
                                            <input type="hidden" name="telegram" value="https://telegram.org/" required>

                                            <div class="col-md-12 mt-3">
                                                <button type="submit" id="next-button"
                                                    class="btn btn-primary">Finish</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js">
    </script>

    <script type="text/javascript">
        $('.select2').select2();
    </script>
</body>

</html>
