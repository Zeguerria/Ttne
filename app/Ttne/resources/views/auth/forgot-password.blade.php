{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digital Tontine - Mot de passe oublié</title>

    {{-- CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>

        :root{
            --bg:#080708;
            --cyan:#00e5ff;
            --purple:#7c4dff;
            --glass:rgba(255,255,255,0.04);
            --border:rgba(255,255,255,0.08);
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:var(--bg);
            font-family:Arial, sans-serif;
            color:white;

            min-height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;

            padding:20px;

            overflow:hidden;
        }

        #tsparticles{
            position:fixed;
            inset:0;
            z-index:0;
        }

        .card{

            position:relative;
            z-index:2;

            width:100%;
            max-width:520px;

            padding:50px;

            border-radius:28px;

            background:rgba(255,255,255,0.03);

            border:1px solid var(--border);

            backdrop-filter:blur(25px);

            text-align:center;

            box-shadow:
            0 0 40px rgba(0,229,255,0.08);

        }

        .logo{

            width:75px;
            height:75px;

            margin:0 auto 20px;

            border-radius:22px;

            display:flex;
            justify-content:center;
            align-items:center;

            font-size:28px;

            background:linear-gradient(135deg,var(--cyan),var(--purple));

            box-shadow:0 0 25px rgba(0,229,255,0.25);

        }

        h1{
            font-size:34px;
            font-weight:900;
            margin-bottom:10px;
        }

        p{
            color:#bdbdbd;
            font-size:14px;
            line-height:1.7;
            margin-bottom:25px;
        }

        /* ================= INPUT ================= */

        .input-group{
            width:100%;
            margin-bottom:18px;
        }

        .input-wrapper{
            position:relative;
            width:100%;
        }

        .input-wrapper input{

            width:100%;
            height:56px;

            border-radius:18px;

            border:1px solid var(--border);

            background:var(--glass);

            color:white;

            padding-left:48px;

            outline:none;

            transition:.3s;

        }

        .input-wrapper input:focus{
            border-color:var(--cyan);
            box-shadow:0 0 15px rgba(0,229,255,0.15);
        }

        .input-icon{

            position:absolute;

            left:16px;
            top:50%;

            transform:translateY(-50%);

            color:#9a9a9a;

            font-size:15px;

            pointer-events:none;

            transition:.3s;

        }

        .input-wrapper:focus-within .input-icon{
            color:var(--cyan);
        }

        /* ================= BUTTON ================= */

        .btn{

            width:100%;
            height:56px;

            border:none;

            border-radius:18px;

            background:linear-gradient(135deg,var(--cyan),var(--purple));

            color:white;

            font-weight:700;

            cursor:pointer;

            transition:.3s;

            margin-top:10px;

        }

        .btn:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(0,229,255,0.15);
        }

        /* ================= LINKS ================= */

        .links{

            margin-top:22px;

            display:flex;
            flex-direction:column;

            gap:12px;

            font-size:14px;

        }

        .links a{

            color:var(--cyan);

            text-decoration:none;

            transition:.3s;

        }

        .links a:hover{
            color:white;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:600px){

            .card{
                padding:30px;
                border-radius:22px;
            }

            h1{
                font-size:28px;
            }

        }

    </style>

</head>

<body>

{{-- PARTICULES --}}
<div id="tsparticles"></div>

{{-- CARD --}}
<div class="card">

    {{-- ICON --}}
    <div class="logo">
        <i class="fa-solid fa-unlock"></i>
    </div>

    {{-- TITLE --}}
    <h1>Mot de passe oublié</h1>

    <p>
        Entre ton email et nous t’enverrons un lien sécurisé pour réinitialiser ton mot de passe.
    </p>

    {{-- STATUS --}}
    @if (session('status'))
        <div style="color:#00e5ff;margin-bottom:15px;">
            {{ session('status') }}
        </div>
    @endif

    {{-- FORM --}}
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-group">

            <div class="input-wrapper">

                <i class="fa-solid fa-envelope input-icon"></i>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Email"
                       required>

            </div>

        </div>

        <button class="btn">
            Envoyer le lien de réinitialisation
        </button>

    </form>

    {{-- LINKS --}}
    <div class="links">

        <a href="{{ route('login') }}">
            <i class="fa-solid fa-arrow-left"></i>
            Je me souviens de mon mot de passe (me connecter)
        </a>

        <a href="{{ route('register') }}">
            Créer un compte
        </a>

    </div>

</div>

{{-- PARTICLES SCRIPT --}}
<script>

tsParticles.load("tsparticles", {

    fullScreen:false,

    particles:{

        number:{ value:60 },

        color:{ value:["#00e5ff","#7c4dff"] },

        links:{
            enable:true,
            color:"#00e5ff",
            opacity:0.15,
            distance:140
        },

        move:{
            enable:true,
            speed:0.7
        },

        opacity:{ value:0.4 },

        size:{ value:{ min:1, max:3 } }

    },

    interactivity:{

        events:{
            onHover:{
                enable:true,
                mode:"grab"
            }
        }

    }

});

gsap.from(".card",{
    opacity:0,
    y:40,
    duration:1.2,
    ease:"power3.out"
});

</script>

</body>
</html>
