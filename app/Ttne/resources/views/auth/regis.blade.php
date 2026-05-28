{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


{{-- resources/views/auth/register.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tontine Secure Access</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Particles --}}
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

    {{-- Filepond --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Lucide --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>

        :root{
            --bg:#080708;
            --primary:#00e5ff;
            --secondary:#6c63ff;
            --glass:rgba(255,255,255,0.06);
            --border:rgba(255,255,255,0.10);
            --text:#ffffff;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            overflow-x:hidden;
            background:var(--bg);
            color:white;
            font-family:'Segoe UI',sans-serif;
        }

        #tsparticles{
            position:fixed;
            width:100%;
            height:100%;
            z-index:0;
        }

        .grid-bg{
            position:fixed;
            inset:0;
            background-image:
            linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
            background-size:50px 50px;
            mask-image: radial-gradient(circle at center, black, transparent 80%);
            z-index:0;
        }

        .animated-blur{
            position:absolute;
            width:500px;
            height:500px;
            border-radius:50%;
            filter:blur(120px);
            opacity:.3;
            animation: float 10s infinite alternate ease-in-out;
        }

        .blur1{
            background:#00e5ff;
            top:-100px;
            left:-100px;
        }

        .blur2{
            background:#6c63ff;
            bottom:-100px;
            right:-100px;
            animation-delay:2s;
        }

        @keyframes float{
            from{
                transform:translateY(0px) translateX(0px);
            }
            to{
                transform:translateY(60px) translateX(30px);
            }
        }

        .glass-card{
            background:rgba(255,255,255,0.05);
            border:1px solid rgba(255,255,255,0.1);
            backdrop-filter:blur(25px);
            box-shadow:
            0 0 30px rgba(0,229,255,.10),
            inset 0 0 20px rgba(255,255,255,.03);
        }

        .input-custom{
            width:100%;
            background:rgba(255,255,255,.04);
            border:1px solid rgba(255,255,255,.08);
            color:white;
            padding:15px 18px;
            border-radius:16px;
            transition:.4s;
        }

        .input-custom:focus{
            outline:none;
            border-color:#00e5ff;
            box-shadow:
            0 0 10px rgba(0,229,255,.5),
            0 0 20px rgba(0,229,255,.2);
            transform:translateY(-2px);
        }

        .step{
            transition:.5s;
        }

        .step-hidden{
            opacity:0;
            transform:translateX(60px);
            position:absolute;
            width:100%;
            pointer-events:none;
        }

        .step-active{
            opacity:1;
            transform:translateX(0px);
            position:relative;
        }

        .btn-neon{
            position:relative;
            overflow:hidden;
            background:linear-gradient(135deg,#00e5ff,#6c63ff);
            transition:.4s;
        }

        .btn-neon::before{
            content:'';
            position:absolute;
            width:200%;
            height:200%;
            background:linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.4),
            transparent
            );
            transform:rotate(25deg);
            top:-50%;
            left:-100%;
            transition:.8s;
        }

        .btn-neon:hover::before{
            left:100%;
        }

        .btn-neon:hover{
            transform:translateY(-3px) scale(1.02);
            box-shadow:
            0 0 20px rgba(0,229,255,.4),
            0 0 40px rgba(108,99,255,.3);
        }

        .step-indicator{
            width:55px;
            height:55px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            border:2px solid rgba(255,255,255,.2);
            background:rgba(255,255,255,.04);
            transition:.4s;
        }

        .step-indicator.active{
            background:linear-gradient(135deg,#00e5ff,#6c63ff);
            border:none;
            box-shadow:0 0 20px rgba(0,229,255,.5);
        }

        .password-strength{
            height:6px;
            border-radius:20px;
            background:rgba(255,255,255,.1);
            overflow:hidden;
        }

        .password-strength span{
            display:block;
            height:100%;
            width:0%;
            transition:.4s;
            background:linear-gradient(to right,#ff0040,#00e5ff);
        }

        .custom-checkbox{
            accent-color:#00e5ff;
            transform:scale(1.2);
        }

        .floating-card{
            animation:floatingCard 5s ease-in-out infinite;
        }

        @keyframes floatingCard{
            0%{
                transform:translateY(0px);
            }
            50%{
                transform:translateY(-10px);
            }
            100%{
                transform:translateY(0px);
            }
        }

        .glow-text{
            text-shadow:
            0 0 10px rgba(0,229,255,.8),
            0 0 20px rgba(0,229,255,.5);
        }

        .line-glow{
            width:100%;
            height:1px;
            background:linear-gradient(to right,transparent,#00e5ff,transparent);
        }

        @media(max-width:768px){

            .glass-card{
                padding:25px !important;
            }

            .step-indicator{
                width:45px;
                height:45px;
            }

        }

    </style>
</head>

<body x-data="registerStepper()">

<div id="tsparticles"></div>
<div class="grid-bg"></div>

<div class="animated-blur blur1"></div>
<div class="animated-blur blur2"></div>

<div class="min-h-screen flex items-center justify-center relative z-10 p-5">

    <div class="glass-card floating-card rounded-[35px] w-full max-w-7xl overflow-hidden">

        <div class="grid grid-cols-1 lg:grid-cols-2">

            {{-- LEFT --}}
            <div class="relative hidden lg:flex flex-col justify-between p-14 overflow-hidden">

                <div>
                    <h1 class="text-6xl font-black leading-tight glow-text"
                        data-aos="fade-right">
                        DIGITAL
                        <br>
                        TONTINE
                    </h1>

                    <p class="text-gray-300 mt-8 text-lg leading-8"
                       data-aos="fade-up"
                       data-aos-delay="300">

                        Une plateforme sécurisée nouvelle génération
                        pour gérer votre tontine dans une expérience
                        premium et futuriste.

                    </p>
                </div>

                <div class="space-y-6">

                    <div class="line-glow"></div>

                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-cyan-400/20 flex items-center justify-center">
                            <i data-lucide="shield-check"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">Sécurité Avancée</h3>
                            <p class="text-sm text-gray-400">
                                Protection et vérification intelligente
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-violet-400/20 flex items-center justify-center">
                            <i data-lucide="scan-face"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">Vérification d'identité</h3>
                            <p class="text-sm text-gray-400">
                                Validation des documents téléversés
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="p-8 lg:p-14 relative">

                {{-- HEADER --}}
                <div class="flex justify-between items-center mb-10">

                    <div>
                        <h2 class="text-4xl font-black glow-text">
                            Inscription
                        </h2>

                        <p class="text-gray-400 mt-2">
                            Créez votre compte sécurisé
                        </p>
                    </div>

                    <div class="hidden md:flex gap-3">

                        <div class="step-indicator"
                             :class="step >= 1 ? 'active' : ''">
                            1
                        </div>

                        <div class="step-indicator"
                             :class="step >= 2 ? 'active' : ''">
                            2
                        </div>

                        <div class="step-indicator"
                             :class="step >= 3 ? 'active' : ''">
                            3
                        </div>

                        <div class="step-indicator"
                             :class="step >= 4 ? 'active' : ''">
                            4
                        </div>

                    </div>

                </div>

                <form method="POST"
                      action="#"
                      enctype="multipart/form-data"
                      class="relative min-h-[600px]">

                    @csrf

                    {{-- STEP 1 --}}
                    <div class="step"
                         :class="step === 1 ? 'step-active' : 'step-hidden'">

                        <div class="grid md:grid-cols-2 gap-5">

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Nom
                                </label>

                                <input type="text"
                                       class="input-custom"
                                       placeholder="Votre nom">
                            </div>

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Prénom
                                </label>

                                <input type="text"
                                       class="input-custom"
                                       placeholder="Votre prénom">
                            </div>

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Contact
                                </label>

                                <input type="text"
                                       class="input-custom"
                                       placeholder="+241...">
                            </div>

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Email
                                </label>

                                <input type="email"
                                       class="input-custom"
                                       placeholder="email@gmail.com">
                            </div>

                        </div>

                    </div>

                    {{-- STEP 2 --}}
                    <div class="step"
                         :class="step === 2 ? 'step-active' : 'step-hidden'">

                        <div class="space-y-6">

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Mot de passe
                                </label>

                                <input type="password"
                                       class="input-custom"
                                       x-model="password"
                                       @input="checkPassword()"
                                       placeholder="********">
                            </div>

                            <div class="password-strength">
                                <span :style="'width:'+strength+'%'"></span>
                            </div>

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Confirmation mot de passe
                                </label>

                                <input type="password"
                                       class="input-custom"
                                       x-model="confirmPassword"
                                       placeholder="********">
                            </div>

                            <div x-show="passwordMismatch"
                                 x-transition
                                 class="bg-red-500/10 border border-red-500/30 text-red-300 p-4 rounded-2xl">

                                Les mots de passe ne correspondent pas.

                            </div>

                        </div>

                    </div>

                    {{-- STEP 3 --}}
                    <div class="step"
                         :class="step === 3 ? 'step-active' : 'step-hidden'">

                        <div class="grid md:grid-cols-2 gap-5">

                            <div class="md:col-span-2">

                                <label class="text-sm text-gray-300 mb-2 block">
                                    Type de pièce
                                </label>

                                <select class="input-custom">
                                    <option>Choisir</option>
                                    <option>CNI</option>
                                    <option>Passeport</option>
                                    <option>Permis</option>
                                </select>

                            </div>

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Numéro du document
                                </label>

                                <input type="text"
                                       class="input-custom">
                            </div>

                            <div>
                                <label class="text-sm text-gray-300 mb-2 block">
                                    Date expiration
                                </label>

                                <input type="date"
                                       class="input-custom">
                            </div>

                            <div class="md:col-span-2">

                                <label class="text-sm text-gray-300 mb-3 block">
                                    Téléverser le document
                                </label>

                                <input type="file"
                                       class="filepond">

                            </div>

                            <div class="md:col-span-2">

                                <label class="text-sm text-gray-300 mb-3 block">
                                    Photo de profil
                                </label>

                                <input type="file"
                                       class="filepond">

                            </div>

                        </div>

                    </div>

                    {{-- STEP 4 --}}
                    <div class="step"
                         :class="step === 4 ? 'step-active' : 'step-hidden'">

                        <div class="space-y-6">

                            <div class="bg-white/5 border border-white/10 rounded-3xl p-6">

                                <h3 class="font-bold text-xl mb-5">
                                    Validation finale
                                </h3>

                                <div class="space-y-4">

                                    <label class="flex items-center gap-4">

                                        <input type="checkbox"
                                               class="custom-checkbox">

                                        <span class="text-gray-300">
                                            J'accepte les conditions générales
                                        </span>

                                    </label>

                                    <label class="flex items-center gap-4">

                                        <input type="checkbox"
                                               class="custom-checkbox">

                                        <span class="text-gray-300">
                                            J'accepte la politique de confidentialité
                                        </span>

                                    </label>

                                </div>

                            </div>

                            <div class="flex flex-wrap gap-5 text-sm text-cyan-300">

                                <a href="#" class="hover:text-white transition">
                                    Politique de confidentialité
                                </a>

                                <a href="#" class="hover:text-white transition">
                                    Conditions générales
                                </a>

                            </div>

                        </div>

                    </div>

                    {{-- BUTTONS --}}
                    <div class="flex justify-between items-center mt-14">

                        <button type="button"
                                x-show="step > 1"
                                @click="prevStep()"
                                class="px-7 py-4 rounded-2xl border border-white/10 hover:border-cyan-400 transition">

                            Retour

                        </button>

                        <div class="ms-auto flex items-center gap-4">

                            <a href="#"
                               class="text-cyan-300 hover:text-white transition">
                                J'ai déjà un compte
                            </a>

                            <button type="button"
                                    x-show="step < 4"
                                    @click="nextStep()"
                                    class="btn-neon px-8 py-4 rounded-2xl font-bold">

                                Continuer

                            </button>

                            <button type="submit"
                                    x-show="step === 4"
                                    class="btn-neon px-10 py-4 rounded-2xl font-bold">

                                Créer mon compte

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

    AOS.init({
        once:true
    });

    lucide.createIcons();

    FilePond.parse(document.body);

    tsParticles.load("tsparticles", {

        fullScreen:false,

        particles:{
            number:{
                value:90
            },

            color:{
                value:["#00e5ff","#6c63ff"]
            },

            links:{
                enable:true,
                color:"#00e5ff",
                opacity:.2
            },

            move:{
                enable:true,
                speed:1
            },

            opacity:{
                value:.4
            },

            size:{
                value:{min:1,max:3}
            }
        }

    });

    gsap.from(".glass-card",{
        y:60,
        opacity:0,
        duration:1.4,
        ease:"power4.out"
    });

    function registerStepper(){

        return{

            step:1,
            password:'',
            confirmPassword:'',
            strength:0,

            get passwordMismatch(){
                return this.password &&
                       this.confirmPassword &&
                       this.password !== this.confirmPassword;
            },

            nextStep(){

                if(this.step < 4){

                    gsap.to(".step-active",{
                        opacity:0,
                        x:-60,
                        duration:.3
                    });

                    setTimeout(()=>{
                        this.step++;
                    },200);

                }

            },

            prevStep(){

                if(this.step > 1){

                    this.step--;

                }

            },

            checkPassword(){

                let value = this.password.length;

                if(value <= 3){
                    this.strength = 20;
                }
                else if(value <= 6){
                    this.strength = 50;
                }
                else if(value <= 9){
                    this.strength = 75;
                }
                else{
                    this.strength = 100;
                }

            }

        }

    }

</script>

</body>
</html>
