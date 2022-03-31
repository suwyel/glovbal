<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .font{
        font-size: 45px;
            font-weight: 100;
    }
</style>
</head>
<body>
<div class="container">
<div class="row justify-content-center d-flex vh-100 align-items-center">
<div class="col text-center font">
    welcome to {{ get_option('company_name') }}</div>
</div>
</div>
</body>
</html>
