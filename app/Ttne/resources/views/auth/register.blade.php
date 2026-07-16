{{-- resources/views/auth/register.blade.php --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Digital Tontine - Register</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Filepond --}}
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    {{-- TSParticles --}}
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>

    <style>

        :root{
            --bg:#080708;
            --cyan:#00e5ff;
            --purple:#7c4dff;
            --blue:#008cff;
            --glass:rgba(255,255,255,0.05);
            --border:rgba(255,255,255,0.08);
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:var(--bg);
            min-height:100vh;
            overflow-x:hidden;
            font-family:'Segoe UI',sans-serif;
            color:white;
        }

        #tsparticles{
            position:fixed;
            inset:0;
            z-index:0;
        }

        /* =========================
   MAIN WRAPPER
========================= */

.main-wrapper{
    position:relative;
    z-index:2;

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:25px;
}

/* =========================
   AUTH CARD
========================= */

.auth-card{

    position:relative;

    width:100%;
    max-width:1320px;

    min-height:760px;

    display:grid;
    grid-template-columns:0.95fr 1.05fr;

    overflow:hidden;

    border-radius:34px;

    background:rgba(255,255,255,0.04);

    border:1px solid rgba(255,255,255,0.08);

    backdrop-filter:blur(28px);

    box-shadow:
    0 0 40px rgba(0,229,255,0.07),
    inset 0 0 25px rgba(255,255,255,0.02);

}

/* =========================
   LIGHT EFFECT
========================= */

.auth-card::before{

    content:'';

    position:absolute;
    inset:0;

    background:
    linear-gradient(
    130deg,
    transparent,
    rgba(255,255,255,0.03),
    transparent
    );

    pointer-events:none;

}
/* =========================
   LEFT SIDE FIX
========================= */

.left-side{

    position:relative;

    padding:50px;

    display:flex;
    flex-direction:column;

    gap:35px;

    border-right:1px solid rgba(255,255,255,0.05);

    overflow:hidden;

}

/* =========================
   HERO BLOCK
========================= */

.hero-content.hero-content{

    flex-shrink:0;

}

/* =========================
   FEATURE LIST FIX
========================= */

/* .feature-list{

    width:100%;

    display:flex;
    flex-direction:column;

    gap:18px;

    margin-top:auto;

} */
 .feature-list{
    margin-top:auto;
    display:flex;
    flex-direction:column;
    gap:18px;

    /* FIX: empêche le bloc de casser l'affichage */
    overflow:visible;
}

/* =========================
   FEATURE CARD FIX
========================= */
.feature-card{
    opacity:1;
    transform:none;
    will-change: transform;
}
.feature-card{

    width:100%;

    min-height:100px;

    display:flex;
    align-items:center;

    gap:18px;

    padding:18px;

    border-radius:22px;

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(255,255,255,0.05);

    transition:
    transform .4s ease,
    border-color .4s ease,
    box-shadow .4s ease;

    flex-shrink:0;

}

/* =========================
   FEATURE HOVER
========================= */

.feature-card:hover{

    transform:translateY(-3px);

    border-color:rgba(0,229,255,0.18);

    box-shadow:
    0 0 18px rgba(0,229,255,0.08);

}

/* =========================
   FEATURE ICON
========================= */

.feature-icon{

    min-width:58px;
    width:58px;
    height:58px;

    border-radius:18px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:20px;

    flex-shrink:0;

}

.cyan{
    background:rgba(0,229,255,0.12);
    color:var(--cyan);
}

.purple{
    background:rgba(124,77,255,0.12);
    color:#c3a6ff;
}

.blue{
    background:rgba(0,140,255,0.12);
    color:#7ecbff;
}

/* =========================
   FEATURE TEXT
========================= */

.feature-card h3{

    font-size:16px;

    margin-bottom:6px;

}

.feature-card p{

    color:#bdbdbd;

    line-height:1.6;

    font-size:14px;

}

/* =========================
   RIGHT SIDE
========================= */

.right-side{

    position:relative;

    padding:45px;

    display:flex;
    flex-direction:column;

}

/* =========================
   MOBILE BRAND
========================= */

.mobile-brand{

    display:none;

}

/* =========================
   TOP HEADER
========================= */

.top-header{

    display:flex;
    justify-content:space-between;
    align-items:flex-start;

    gap:20px;

    margin-bottom:40px;

}

/* =========================
   BADGE
========================= */

.badge-top{

    display:inline-flex;
    align-items:center;

    gap:10px;

    padding:10px 18px;

    border-radius:999px;

    background:rgba(0,229,255,0.08);

    border:1px solid rgba(0,229,255,0.16);

    color:var(--cyan);

    font-size:12px;

}

/* =========================
   FORM TITLE
========================= */

.form-title{

    font-size:40px;

    font-weight:900;

    margin-top:18px;

}

/* =========================
   STEPPER
========================= */

.stepper{

    display:flex;
    align-items:center;

    gap:10px;

    flex-wrap:wrap;

}

.step-item{

    width:50px;
    height:50px;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    background:rgba(255,255,255,0.04);

    border:1px solid rgba(255,255,255,0.08);

    font-weight:800;

    transition:0.4s;

}

.step-item.active{

    background:
    linear-gradient(
    135deg,
    var(--cyan),
    var(--purple)
    );

    border:none;

    box-shadow:
    0 0 18px rgba(0,229,255,0.3);

}

/* =========================
   FORM AREA
========================= */

.form-area{

    flex:1;

    display:flex;
    flex-direction:column;
    justify-content:space-between;

}

/* =========================
   FORM GRID
========================= */

.form-grid{

    display:grid;

    gap:22px;

}

.grid-2{

    grid-template-columns:repeat(2,1fr);

}

.grid-1{

    grid-template-columns:1fr;

}

/* =========================
   INPUT GROUP
========================= */

.input-group{

    display:flex;
    flex-direction:column;
        position:relative;


    gap:12px;

}

.input-group label{

    display:flex;
    align-items:center;

    gap:10px;

    color:#d8d8d8;

    font-size:14px;

}
.input-icon{
    position:absolute;
    left:18px;
    top:50%;
    transform:translateY(-50%);
    color:#9aa0a6;
    pointer-events:none;
}


.input-group input,
.input-group select{

    width:100%;

    height:58px;

    border-radius:18px;

    background:rgba(255,255,255,0.04);

    border:1px solid rgba(255,255,255,0.08);

    padding:0 18px;

    color:white;

    transition:0.4s;

}

.input-group input:focus,
.input-group select:focus{

    outline:none;

    border-color:var(--cyan);

    box-shadow:
    0 0 18px rgba(0,229,255,0.16);

}

.input-group input::placeholder{

    color:#8f8f8f;

}

select option{

    background:#111;

}

/* =========================
   PASSWORD
========================= */

.password-meter{

    width:100%;

    height:7px;

    overflow:hidden;

    border-radius:999px;

    background:rgba(255,255,255,0.06);

}

.password-strength{

    height:100%;

    border-radius:999px;

    background:
    linear-gradient(
    to right,
    #ff006e,
    var(--cyan)
    );

    transition:0.4s;

}

.password-info{

    display:flex;
    justify-content:space-between;

    color:#9f9f9f;

    font-size:12px;

}

/* =========================
   ERROR
========================= */

.error-box{

    padding:16px;

    border-radius:16px;

    background:rgba(255,0,90,0.08);

    border:1px solid rgba(255,0,90,0.2);

    color:#ff8aad;

    display:flex;
    align-items:center;

    gap:10px;

    font-size:14px;

}

/* =========================
   FINAL BOX
========================= */

.final-box{

    padding:28px;

    border-radius:24px;

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(255,255,255,0.05);

}

.final-box h3{

    font-size:28px;

    margin-bottom:24px;

}

/* =========================
   CHECK GROUP
========================= */

.check-group{

    display:flex;
    flex-direction:column;

    gap:20px;

}

.check-group label{

    display:flex;
    align-items:center;

    gap:14px;

    line-height:1.6;

}

.check-group input{

    width:17px;
    height:17px;

    accent-color:var(--cyan);

}

/* =========================
   LINKS
========================= */

.legal-links{

    margin-top:24px;

    display:flex;
    flex-wrap:wrap;

    gap:18px;

}

.legal-links a,
.login-link{

    color:var(--cyan);

    text-decoration:none;

    transition:0.4s;

    font-size:14px;

}

.legal-links a:hover,
.login-link:hover{

    color:white;

}

/* =========================
   ACTIONS
========================= */

.bottom-actions{

    margin-top:40px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    gap:20px;

    flex-wrap:wrap;

}

.action-right{

    display:flex;
    align-items:center;

    gap:18px;

    flex-wrap:wrap;

}

/* =========================
   BUTTONS
========================= */

.btn-primary,
.btn-secondary{

    height:56px;

    padding:0 26px;

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    gap:10px;

    cursor:pointer;

    border:none;

    transition:0.4s;

    font-weight:700;

}

.btn-primary{

    background:
    linear-gradient(
    135deg,
    var(--cyan),
    var(--purple)
    );

    color:white;

    box-shadow:
    0 0 22px rgba(0,229,255,0.16);

}

.btn-primary:hover{

    transform:translateY(-3px);

    box-shadow:
    0 0 30px rgba(0,229,255,0.28);

}

.btn-secondary{

    background:rgba(255,255,255,0.04);

    border:1px solid rgba(255,255,255,0.08);

    color:white;

}

/* =========================
   FILEPOND
========================= */

.filepond--root{

    width:100%;

}

.filepond--panel-root{

    background:rgba(255,255,255,0.04)!important;

    border:1px solid rgba(255,255,255,0.08)!important;

    border-radius:18px!important;

}

.filepond--drop-label{

    color:#d0d0d0!important;

}

.filepond--label-action{

    color:var(--cyan)!important;

}

.filepond--credits{

    display:none!important;

}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:1200px){

    .auth-card{

        grid-template-columns:1fr;

        max-width:760px;

        min-height:auto;

    }

    .left-side{

        display:none;

    }

    .mobile-brand{

        display:flex;

        flex-direction:column;

        align-items:center;

        text-align:center;

        margin-bottom:30px;

    }

    .mobile-brand .logo-box{

        margin-inline:auto;

    }

    .top-header{

        flex-direction:column;

    }

}

@media(max-width:768px){

    .main-wrapper{

        padding:12px;

    }

    .auth-card{

        border-radius:24px;

    }

    .right-side{

        padding:28px 20px;

    }

    .form-title{

        font-size:30px;

    }

    .grid-2{

        grid-template-columns:1fr;

    }

    .stepper{

        width:100%;

        justify-content:space-between;

    }

    .step-item{

        width:44px;
        height:44px;

        font-size:13px;

    }

    .bottom-actions{

        flex-direction:column;

        align-items:stretch;

    }

    .action-right{

        width:100%;

        flex-direction:column;

        align-items:stretch;

    }

    .btn-primary,
    .btn-secondary{

        width:100%;

    }

    .login-link{

        text-align:center;

    }

}

@media(max-width:480px){

    .right-side{

        padding:22px 14px;

    }

    .form-title{

        font-size:26px;

    }

    .badge-top{

        font-size:11px;

    }

    .final-box{

        padding:22px 18px;

    }

    .hero-title{

        font-size:48px;

    }

}

    </style>

</head>

<body x-data="registerApp()">

<div id="tsparticles"></div>

<div class="floating-blur blur1"></div>
<div class="floating-blur blur2"></div>
<div class="floating-blur blur3"></div>

<div class="main-wrapper">

    <div class="auth-card">

        {{-- LEFT --}}
        <div class="left-side">
            <div class="hero-content">
                <div>

                <div class="logo-box">
                    <i class="fa-solid fa-vault"></i>
                </div>

                <h1 class="hero-title">
                    DIGITAL
                    <br>
                    TONTINE
                </h1>

                <p class="hero-text">

                    Une expérience fintech futuriste et premium
                    pour révolutionner la gestion moderne des tontines.

                </p>

            </div>

            <div class="feature-list">

                <div class="feature-card">

                    <div class="feature-icon cyan">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div>
                        <h3>Sécurité Avancée</h3>

                        <p>
                            Vérification intelligente et protection des utilisateurs.
                        </p>
                    </div>

                </div>

                <div class="feature-card">

                    <div class="feature-icon purple">
                        <i class="fa-solid fa-fingerprint"></i>
                    </div>

                    <div>
                        <h3>Validation des Identités</h3>

                        <p>
                            Gestion des documents et authentification moderne.
                        </p>
                    </div>

                </div>

                <div class="feature-card">

                    <div class="feature-icon blue">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>

                    <div>
                        <h3>Gestion Premium</h3>

                        <p>
                            Une interface pensée comme une plateforme bancaire moderne.
                        </p>
                    </div>

                </div>

            </div>
            </div>


        </div>

        {{-- RIGHT --}}
        <div class="right-side">

            <div class="mobile-brand">

                <div class="logo-box">
                    <i class="fa-solid fa-vault"></i>
                </div>

                <h2 class="form-title">
                    Digital Tontine
                </h2>

            </div>

            <div class="top-header">

                <div>

                    <span class="badge-top">
                        <i class="fa-solid fa-bolt"></i>
                        Nouvelle génération
                    </span>

                    <h2 class="form-title">
                        Création de compte
                    </h2>

                </div>

                <div class="stepper">

                    <div class="step-item"
                         :class="step >= 1 ? 'active' : ''">
                        1
                    </div>

                    <div class="step-item"
                         :class="step >= 2 ? 'active' : ''">
                        2
                    </div>

                    <div class="step-item"
                         :class="step >= 3 ? 'active' : ''">
                        3
                    </div>

                    <div class="step-item"
                         :class="step >= 4 ? 'active' : ''">
                        4
                    </div>

                </div>

            </div>

            <form class="form-area" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                @csrf

                {{-- STEP 1 --}}
                <div x-show="step === 1" x-transition>

                    <div class="form-grid grid-2">

                        <div class="input-group">
                            <label>
                                <i class="fa-solid fa-user"></i>
                                Nom
                            </label>

                            <input type="text" name="nom" placeholder="Votre nom">
                        </div>

                        <div class="input-group">
                            <label>
                                <i class="fa-solid fa-user"></i>
                                Prénom
                            </label>
                            <input type="text"name="prenom" placeholder="Votre prénom">
                        </div>
                        <div class="input-group">
                            <label>
                                <i class="fa-solid fa-phone"></i>
                                Contact
                            </label>
                            <input type="text" name="telephone" placeholder="+241">
                        </div>

                        <div class="input-group">
                            <label>
                                <i class="fa-solid fa-envelope"></i>
                                Email
                            </label>

                            <input type="email" name="email" placeholder="email@gmail.com">
                        </div>

                    </div>

                </div>

                {{-- STEP 2 --}}
                <div x-show="step === 2" x-transition>

                    <div class="form-grid grid-1">

                        <div class="input-group">

                            <label>
                                <i class="fa-solid fa-lock"></i>
                                Mot de passe
                            </label>

                            <input type="password"
                                   x-model="password"
                                   @input="passwordChecker()" placeholder="********" name="password">
                        </div>

                        <div class="password-meter">
                            <div class="password-strength"
                                 :style="'width:' + passwordStrength + '%'">
                            </div>
                        </div>

                        <div class="password-info">
                            <span>Faible</span>
                            <span>Fort</span>
                        </div>

                        <div class="input-group">

                            <label>
                                <i class="fa-solid fa-lock"></i>
                                Confirmation mot de passe
                            </label>

                            <input type="password"
                                   x-model="confirmPassword"
                                   placeholder="********" name="confirmPassword">

                        </div>

                        <div class="error-box"
                             x-show="password !== confirmPassword && confirmPassword.length > 0">

                            <i class="fa-solid fa-circle-exclamation"></i>

                            Les mots de passe ne correspondent pas.

                        </div>

                    </div>

                </div>

                {{-- STEP 3 --}}
                <div x-show="step === 3" x-transition>

                    <div class="form-grid grid-1">

                        <div class="input-group">
                            {{-- @php

$typePieces = \App\Models\Parametre::where(
    'type_parametre_id',
    3
)->get();

@endphp --}}

                            <label>
                                <i class="fa-solid fa-id-card"></i>
                                Type de pièce
                            </label>

                            <select name="type_piece_id">
                                <option>Choisir</option>
                              @foreach($typePieces as $item)

                                <option value="{{ $item->id }}">
                                    {{ $item->libelle }}
                                </option>

                                @endforeach
                            </select>

                        </div>

                        <div class="input-group">

                            <label>
                                <i class="fa-solid fa-hashtag"></i>
                                Numéro document
                            </label>

                            <input type="text" name="numero">

                        </div>

                        <div class="input-group">

                            <label>
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                Upload document
                            </label>

                            <input type="file" name="fichier" class="filepond">

                        </div>

                        <div class="input-group">

                            <label>
                                <i class="fa-solid fa-image"></i>
                                Photo de profil
                            </label>

                            <input type="file" name="photo" class="filepond">

                        </div>

                    </div>

                </div>

                {{-- STEP 4 --}}
                <div x-show="step === 4" x-transition>

                    <div class="final-box">

                        <h3>
                            Vérification Finale
                        </h3>

                        <div class="check-group">

                            <label>
                                <input type="checkbox">

                                <span>
                                    J'accepte les conditions générales
                                </span>
                            </label>

                            <label>
                                <input type="checkbox">

                                <span>
                                    J'accepte la politique de confidentialité
                                </span>
                            </label>

                        </div>

                        <div class="legal-links">

                            <a href="#">
                                Politique de confidentialité
                            </a>

                            <a href="#">
                                Conditions générales
                            </a>

                        </div>

                    </div>

                </div>

                {{-- ACTIONS --}}
                <div class="bottom-actions">

                    <button type="button"
                            class="btn-secondary"
                            x-show="step > 1"
                            @click="step--">

                        <i class="fa-solid fa-arrow-left"></i>
                        Retour

                    </button>

                    <div class="action-right">

                        <a href="#"
                           class="login-link">

                            J'ai déjà un compte

                        </a>

                        <button type="button"
                                class="btn-primary"
                                x-show="step < 4"
                                @click="step++">

                            Continuer

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                        <button type="submit"
                                class="btn-primary"
                                x-show="step === 4">

                            Créer mon compte

                            <i class="fa-solid fa-user-plus"></i>

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    AOS.init({
        once:true,
        duration:1000
    });

    FilePond.parse(document.body);

    tsParticles.load("tsparticles", {

        fullScreen:false,

        particles:{

            number:{
                value:80
            },

            color:{
                value:["#00e5ff","#7c4dff","#008cff"]
            },

            links:{
                enable:true,
                opacity:.15,
                color:"#00e5ff",
                distance:140
            },

            move:{
                enable:true,
                speed:1
            },

            opacity:{
                value:.4
            },

            size:{
                value:{
                    min:1,
                    max:4
                }
            }

        },

        interactivity:{

            events:{
                onHover:{
                    enable:true,
                    mode:"grab"
                }
            },

            modes:{
                grab:{
                    distance:180,
                    links:{
                        opacity:.35
                    }
                }
            }

        }

    });

    gsap.from(".auth-card",{
        opacity:0,
        y:70,
        duration:1.5,
        ease:"power4.out"
    });

    gsap.from(".feature-card",{
        opacity:0,
        x:-30,
        stagger:.2,
        duration:1,
        delay:.4
    });

    function registerApp(){

        return{

            step:1,
            password:'',
            confirmPassword:'',
            passwordStrength:0,

            passwordChecker(){

                let strength = 0;

                if(this.password.length >= 4){
                    strength += 25;
                }

                if(this.password.length >= 8){
                    strength += 25;
                }

                if(/[A-Z]/.test(this.password)){
                    strength += 25;
                }

                if(/[0-9]/.test(this.password)){
                    strength += 25;
                }

                this.passwordStrength = strength;

            }

        }

    }

</script>

</body>
</html>
