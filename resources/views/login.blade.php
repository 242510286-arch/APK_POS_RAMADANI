<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login POS</title>


    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        /* =====================================
           BODY / BACKGROUND
        ====================================== */

        body {

            margin: 0;

            min-height: 100vh;

            font-family: "Poppins", "Segoe UI", sans-serif;

            background:
                radial-gradient(
                    circle at top left,
                    #ffe5ef 0%,
                    transparent 35%
                ),

                radial-gradient(
                    circle at bottom right,
                    #f8d6e3 0%,
                    transparent 35%
                ),

                linear-gradient(
                    135deg,
                    #fff7fa 0%,
                    #fdebf2 45%,
                    #f9dce8 100%
                );

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

            overflow: hidden;
        }


        /* =====================================
           BACKGROUND DECORATION
        ====================================== */

        body::before {

            content: "";

            position: absolute;

            width: 350px;

            height: 350px;

            background: rgba(230, 126, 157, 0.15);

            border-radius: 50%;

            top: -150px;

            left: -100px;

            filter: blur(2px);
        }


        body::after {

            content: "";

            position: absolute;

            width: 400px;

            height: 400px;

            background: rgba(255, 255, 255, 0.55);

            border-radius: 50%;

            bottom: -200px;

            right: -120px;

            filter: blur(3px);
        }


        /* =====================================
           LOGIN WRAPPER
        ====================================== */

        .login-wrapper {

            width: 100%;

            max-width: 430px;

            padding: 20px;

            position: relative;

            z-index: 2;
        }


        /* =====================================
           LOGIN CARD
        ====================================== */

        .login-card {

            background: rgba(255, 255, 255, 0.90);

            backdrop-filter: blur(18px);

            -webkit-backdrop-filter: blur(18px);

            border: 1px solid rgba(255, 255, 255, 0.8);

            border-radius: 25px;

            padding: 38px 35px 32px;

            box-shadow:

                0 25px 60px rgba(181, 92, 120, 0.18),

                0 8px 25px rgba(181, 92, 120, 0.08);

            animation: fadeUp 0.7s ease;
        }


        @keyframes fadeUp {

            from {

                opacity: 0;

                transform: translateY(25px);
            }

            to {

                opacity: 1;

                transform: translateY(0);
            }
        }


        /* =====================================
           LOGO
        ====================================== */

        .login-logo {

            width: 75px;

            height: 75px;

            margin: 0 auto 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 22px;

            background: linear-gradient(
                135deg,
                #e7799d,
                #d95f87
            );

            color: white;

            font-size: 31px;

            box-shadow:

                0 12px 25px rgba(217, 95, 135, 0.3);
        }


        /* =====================================
           TITLE
        ====================================== */

        .login-title {

            text-align: center;

            color: #49333d;

            font-size: 27px;

            font-weight: 700;

            margin-bottom: 6px;
        }


        .login-subtitle {

            text-align: center;

            color: #9a7c87;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 30px;
        }


        /* =====================================
           ALERT
        ====================================== */

        .alert {

            border: none;

            border-radius: 12px;

            font-size: 14px;

            margin-bottom: 22px;
        }


        .alert-success {

            background: #e4f7ee;

            color: #277653;
        }


        .alert-danger {

            background: #fde8ee;

            color: #b33d62;
        }


        /* =====================================
           FORM LABEL
        ====================================== */

        .form-label {

            color: #604653;

            font-size: 14px;

            font-weight: 600;

            margin-bottom: 8px;
        }


        /* =====================================
           INPUT WRAPPER
        ====================================== */

        .input-wrapper {

            position: relative;

            margin-bottom: 20px;
        }


        .input-wrapper > i {

            position: absolute;

            left: 16px;

            top: 50%;

            transform: translateY(-50%);

            color: #d77b99;

            font-size: 15px;

            z-index: 2;
        }


        /* =====================================
           INPUT
        ====================================== */

        .form-control {

            height: 50px;

            border-radius: 13px;

            border: 1px solid #efd4df;

            background: #fffafd;

            padding-left: 45px;

            color: #543b46;

            font-size: 14px;

            transition: all 0.25s ease;
        }


        .form-control:focus {

            border-color: #df7799;

            background: #fff;

            box-shadow:

                0 0 0 4px rgba(223, 119, 153, 0.12);

            outline: none;
        }


        .form-control::placeholder {

            color: #b99da8;
        }


        /* =====================================
           PASSWORD TOGGLE
        ====================================== */

        .password-toggle {

            position: absolute;

            right: 15px;

            top: 50%;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #b58d9d;

            cursor: pointer;

            z-index: 3;

            padding: 5px;
        }


        .password-toggle:hover {

            color: #d5688d;
        }


        /* =====================================
           LOGIN BUTTON
        ====================================== */

        .btn-login {

            width: 100%;

            height: 50px;

            border: none;

            border-radius: 13px;

            background: linear-gradient(
                135deg,
                #e67b9e,
                #d85f87
            );

            color: white;

            font-size: 15px;

            font-weight: 600;

            box-shadow:

                0 10px 22px rgba(216, 95, 135, 0.25);

            transition: all 0.25s ease;

            margin-top: 8px;
        }


        .btn-login:hover {

            transform: translateY(-2px);

            background: linear-gradient(
                135deg,
                #df6f94,
                #cf527c
            );

            box-shadow:

                0 14px 28px rgba(216, 95, 135, 0.32);
        }


        .btn-login:active {

            transform: translateY(0);
        }


        .btn-login i {

            margin-right: 8px;
        }


        /* =====================================
           FOOTER
        ====================================== */

        .login-footer {

            text-align: center;

            margin-top: 25px;

            color: #aa8c98;

            font-size: 12px;
        }


        .login-footer i {

            color: #df7095;

            margin-right: 5px;
        }


        /* =====================================
           RESPONSIVE
        ====================================== */

        @media (max-width: 480px) {

            .login-wrapper {

                padding: 15px;
            }


            .login-card {

                padding: 32px 24px 28px;

                border-radius: 22px;
            }


            .login-title {

                font-size: 24px;
            }


            .login-logo {

                width: 68px;

                height: 68px;

                font-size: 27px;
            }
        }

    </style>

</head>


<body>


    {{-- =====================================
         LOGIN WRAPPER
    ====================================== --}}

    <div class="login-wrapper">


        {{-- =====================================
             LOGIN CARD
        ====================================== --}}

        <div class="login-card">


            {{-- LOGO --}}

            <div class="login-logo">

                <i class="fa-solid fa-cart-shopping"></i>

            </div>


            {{-- TITLE --}}

            <h1 class="login-title">

                Login POS

            </h1>


            <div class="login-subtitle">

                Selamat datang kembali 👋

                <br>

                Silakan masuk untuk mengelola penjualan

            </div>


            {{-- =====================================
                 SUCCESS MESSAGE
            ====================================== --}}

            @if(session('status'))

                <div class="alert alert-success">

                    <i class="fa-solid fa-circle-check me-2"></i>

                    {{ session('status') }}

                </div>

            @endif


            {{-- =====================================
                 VALIDATION ERROR
            ====================================== --}}

            @if($errors->any())

                <div class="alert alert-danger">

                    <i class="fa-solid fa-circle-exclamation me-2"></i>

                    Email atau password yang dimasukkan salah.

                </div>

            @endif


            {{-- =====================================
                 LOGIN FORM
            ====================================== --}}

            <form
                action="{{ route('auth') }}"
                method="POST"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="mb-3">

                    <label
                        for="email"
                        class="form-label"
                    >

                        Email

                    </label>


                    <div class="input-wrapper">

                        <i class="fa-solid fa-envelope"></i>


                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="Masukkan email"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                </div>


                {{-- PASSWORD --}}

                <div class="mb-3">

                    <label
                        for="password"
                        class="form-label"
                    >

                        Password

                    </label>


                    <div class="input-wrapper">

                        <i class="fa-solid fa-lock"></i>


                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required
                        >


                        {{-- SHOW / HIDE PASSWORD --}}

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Tampilkan password"
                        >

                            <i
                                class="fa-solid fa-eye"
                                id="passwordIcon"
                            ></i>

                        </button>

                    </div>

                </div>


                {{-- =====================================
                     ERROR DETAIL
                ====================================== --}}

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <i class="fa-solid fa-circle-exclamation me-2"></i>

                        {{ $errors->first() }}

                    </div>

                @endif


                {{-- =====================================
                     LOGIN BUTTON
                ====================================== --}}

                <button
                    type="submit"
                    class="btn-login"
                >

                    <i class="fa-solid fa-right-to-bracket"></i>

                    Login

                </button>


            </form>


            {{-- =====================================
                 FOOTER
            ====================================== --}}

            <div class="login-footer">

                <i class="fa-solid fa-shield-halved"></i>

                Sistem Point of Sale

            </div>


        </div>

    </div>


    {{-- =====================================
         JAVASCRIPT
    ====================================== --}}

    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('passwordIcon');


            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            }

        }

    </script>


</body>

</html>