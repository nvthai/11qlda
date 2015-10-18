<!DOCTYPE html>
<html>
    <head>
        <title>vRemind</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
        {!! Html::style('resources/assets/css/bootstrap.min.css') !!}
        {!! Html::style('resources/assets/css/style.css') !!}

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">
                    <h3>Software Project Management</h3>
                    <p> vRemind - Nhóm 11 </p>
                </div>

                <div class="button">
                     <a href="{{ URL::to('auth/register') }}" class="btn btn-primary btn-lg">Đăng ký</a>
                     <a href="{{ URL::to('auth/login') }}" class="btn btn-default btn-lg">Đăng nhập</a>
                </div>
            </div>
        </div>
    </body>
</html>