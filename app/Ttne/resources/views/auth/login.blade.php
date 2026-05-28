{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
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
<title>Digital Tontine - Connexion</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

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
    font-family:Arial;
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
    max-width:1100px;

    display:grid;
    grid-template-columns:1fr 1fr;

    border-radius:30px;
    overflow:hidden;

    background:rgba(255,255,255,0.03);
    border:1px solid var(--border);

    backdrop-filter:blur(25px);
}

/* LEFT */
.left{
    padding:60px;
    border-right:1px solid var(--border);
}

.logo{
    width:70px;
    height:70px;
    border-radius:20px;
    background:linear-gradient(135deg,var(--cyan),var(--purple));
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:28px;
    margin-bottom:30px;
}

.title{
    font-size:52px;
    font-weight:900;
    line-height:1;
}

.subtitle{
    margin-top:15px;
    color:#bdbdbd;
    max-width:420px;
    line-height:1.7;
}

.hint{
    margin-top:40px;
    display:flex;
    flex-direction:column;
    gap:15px;
}

.hint div{
    padding:15px;
    border-radius:15px;
    background:var(--glass);
    border:1px solid var(--border);
    font-size:14px;
}

/* RIGHT */
.right{
    padding:60px;
}

.badge{
    display:inline-flex;
    gap:10px;
    align-items:center;
    padding:10px 15px;
    border-radius:999px;
    background:rgba(0,229,255,0.08);
    border:1px solid rgba(0,229,255,0.2);
    color:var(--cyan);
    font-size:12px;
}

h2{
    font-size:42px;
    margin:15px 0 30px;
    font-weight:900;
}

/* ================= INPUTS FIX ================= */

.field{
    position:relative;
    margin-bottom:20px;
}

.field input{

    width:100%;
    height:58px;

    border-radius:18px;

    border:1px solid var(--border);

    background:var(--glass);

    color:white;

    padding-left:48px;
    padding-right:48px;

    outline:none;

    transition:.35s ease;

}

.field input:focus{

    border-color:var(--cyan);
    box-shadow:0 0 18px rgba(0,229,255,0.15);
    transform:translateY(-1px);

}

.field i.icon-left{

    position:absolute;
    left:16px;
    top:50%;
    transform:translateY(-50%);
    color:#999;

    pointer-events:none;

}

.toggle-pass{

    position:absolute;
    right:16px;
    top:50%;
    transform:translateY(-50%);

    background:none;
    border:none;

    color:#aaa;

    cursor:pointer;

    transition:.3s;

}

.toggle-pass:hover{
    color:var(--cyan);
}

/* ROW */
.row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin:10px 0 20px;
    flex-wrap:wrap;
    gap:10px;
}

.row label{
    display:flex;
    gap:8px;
    align-items:center;
    font-size:14px;
}

.row a{
    color:var(--cyan);
    text-decoration:none;
}

/* BUTTON */
.btn{
    width:100%;
    height:58px;
    border:none;
    border-radius:18px;
    background:linear-gradient(135deg,var(--cyan),var(--purple));
    color:white;
    font-weight:700;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(0,229,255,0.15);
}

/* BOTTOM */
.bottom{
    margin-top:20px;
    text-align:center;
    color:#bdbdbd;
}

.bottom a{
    color:var(--cyan);
    font-weight:700;
    text-decoration:none;
}

/* RESPONSIVE */
@media(max-width:900px){
    .card{
        grid-template-columns:1fr;
    }

    .left{
        display:none;
    }

    .right{
        padding:40px 25px;
    }

    h2{
        font-size:32px;
    }
}

</style>
</head>

<body x-data="{show:false}">

<div id="tsparticles"></div>

<div class="card">

<!-- LEFT -->
<div class="left">

    <div class="logo">
        <i class="fa-solid fa-vault"></i>
    </div>

    <div class="title">Digital<br>Tontine</div>

    <div class="subtitle">
        Accède à ton espace sécurisé de gestion de tontine nouvelle génération.
    </div>

    <div class="hint">
        <div><i class="fa-solid fa-shield"></i> Sécurité bancaire</div>
        <div><i class="fa-solid fa-chart-line"></i> Gestion intelligente</div>
        <div><i class="fa-solid fa-users"></i> Communauté structurée</div>
    </div>

</div>

<!-- RIGHT -->
<div class="right">

    <div class="badge">
        <i class="fa-solid fa-lock"></i>
        Connexion sécurisée
    </div>

    <h2>Connexion</h2>

    <form method="POST" action="#">
        @csrf

        <!-- EMAIL -->
        <div class="field">
            <i class="fa-solid fa-envelope icon-left"></i>
            <input type="email" placeholder="Email">
        </div>

        <!-- PASSWORD -->
        <div class="field">

            <i class="fa-solid fa-key icon-left"></i>

            <input :type="show ? 'text' : 'password'"
                   placeholder="Mot de passe">

            <button type="button" class="toggle-pass" @click="show=!show">
                <i :class="show ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
            </button>

        </div>

        <!-- OPTIONS -->
        <div class="row">

            <label>
                <input type="checkbox">
                Se souvenir de moi
            </label>

            <a href="#">Mot de passe oublié ?</a>

        </div>

        <!-- BTN -->
        <button class="btn" type="submit">
            Se connecter <i class="fa-solid fa-right-to-bracket"></i>
        </button>

        <!-- REGISTER -->
        <div class="bottom">
            Je n’ai pas de compte ?
            <a href="#">Créer un compte</a>
        </div>

    </form>

</div>

</div>

<script>

gsap.from(".card",{
    opacity:0,
    y:40,
    duration:1.2,
    ease:"power3.out"
});

tsParticles.load("tsparticles",{

    fullScreen:false,

    particles:{
        number:{ value:65 },
        color:{ value:["#00e5ff","#7c4dff"] },
        links:{
            enable:true,
            color:"#00e5ff",
            opacity:0.15,
            distance:140
        },
        move:{ enable:true, speed:0.7 },
        opacity:{ value:0.4 },
        size:{ value:{ min:1, max:3 } }
    }

});

</script>

</body>
</html>
