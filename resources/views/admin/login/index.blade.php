<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>ttdyy-login</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ttdyy-admin/css/ttdyy.login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 login-panel">
            <div class="panel panel-default">
                <div class="panel-heading login-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                <span class="glyphicon glyphicon-envelope login-input-icon" aria-hidden="true"></span>
                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="glyphicon glyphicon-lock login-input-icon" aria-hidden="true"></span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info btn-block">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ttdyy-admin/js/anime.min.js') }}"></script>

    <!-- 背景动画 -->
    <script>
        var maxElements = 400;
        var duration = 10000;
        var toAnimate = [];
        var w = window.innerWidth > window.innerHeight ? window.innerWidth : window.innerHeight;
        var colors = ['#FF324A', '#31FFA6', '#206EFF', '#FFFF99'];

        var createElements = (function() {
            var fragment = document.createDocumentFragment();
            for (var i = 0; i < maxElements; i++) {
                var el = document.createElement('div');
                el.className = 'anime';
                el.style.background = colors[anime.random(0, 3)];
                el.style.transform = 'rotate('+anime.random(-360, 360)+'deg)';
                toAnimate.push(el);
                fragment.appendChild(el);
            }
            document.body.appendChild(fragment);
        })();

        var animate = function(el) {
            anime({
                targets: el,
                rotate: anime.getValue(el,'rotate'),
                translateX: [0, w/2],
                translateY: [0, w/2],
                scale: [0, 0.5],
                delay: anime.random(0, duration),
                duration: duration,
                easing: "easeInCubic",
                loop: true
            });
        }

        toAnimate.forEach(animate);
    </script>

</body>
</html>