<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    //
    public function lesdirections(Request $request)
{
    // $user = Auth::user();

    // // 🔒 Vérifie si l'utilisateur est désactivé
    // if ($user->active === '1') {
    //     Auth::guard('web')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     toast("Votre compte est désactivé. Veuillez contacter l'administrateur.", "error");
    //     return redirect('login');
    // }

    // // 🔁 Redirection basée sur le profil
    // $profil = $user->profil_id;

    // if (in_array($profil, [5, 6, 7, 8, 9])) {
    //     return redirect()->route('AdminHome');
    // } else {
    //     return redirect()->route('SiteHome');
    // }
        return redirect()->route('AdminHome');
        // toast("Votre compte est désactivé. Veuillez contacter l'administrateur.", "error");

}
    public function AdminHome()
    {
    $user = Auth::user();

    // 🔒 Vérifie si l'utilisateur est désactivé
    // if ($user->active === '1') {
    //     Auth::guard('web')->logout();
    //     // $request->session()->invalidate();
    //     // $request->session()->regenerateToken();

    //     toast("Votre compte est désactivé. Veuillez contacter l'administrateur.", "error");
    //     return redirect('login');
    // }
    // toast("Votre compte est désactivé. Veuillez contacter l'administrateur.", "error");
        return view('dependances.templates.admins.navigations.homes.home');
    }
}
