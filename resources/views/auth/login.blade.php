<!doctype html>
<html lang="en">

<head>
    <title>Login SPK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assetLogin/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sistem Pendukung Keputusan Bantuan</h2>
                    <h3>Desa Cagak Agung, Cerme, Gresik</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="col-sm-12 text-center" style=" margin-bottom: 25px; ">
                            <img src="{{ asset('logo_gresik.png') }}" style="width: 70%;"/>

                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control rounded-left" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password"
                                    required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login Sistem</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assetLogin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assetLogin/js/popper.js') }}"></script>
    <script src="{{ asset('assetLogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetLogin/js/main.js') }}"></script>

</body>

</html>
