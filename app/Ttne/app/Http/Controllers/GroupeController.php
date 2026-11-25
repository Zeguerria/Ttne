<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Historique;
use App\Models\Parametre;
use App\Models\Periodicite;
use App\Models\User;
use App\Services\Core\GroupeService;
use App\Services\Core\GroupeUtilisateurService;
use Illuminate\Support\Facades\Auth;

use Exception;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $historiques = Historique::where(
            'record_type',
            Groupe::class
        )
            ->latest()
            ->paginate(
                5,
                ['*'],
                'history_page'
            );

        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

        if ($request->ajax()) {

            return response()->json([
                'historiques' => view(
                    'dependances.templates.admins.gestions.delicatesses.groupes._consoms.historique',
                    compact('historiques')
                )->render(),

                'current_page' => $historiques->currentPage(),

                'last_page' => $historiques->lastPage(),

                'has_more_pages' => $historiques->hasMorePages(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | PARAMÈTRES DU CRUD GROUPE
        |--------------------------------------------------------------------------
        */

        $periodicites = Periodicite::where(
            'active',
            false
        )
            ->orderBy('id')
            ->get();
            $userCreateur = User::where('supprimer', 0)
                ->whereHas('profil', function ($query) {
                    $query->where('code', '!=', 'SIMPLE-UTILISATEUR');
                })
                ->orderBy('name')
                ->get();

        $modesDistribution = Parametre::where(
            'type_parametre_id',
            4
        )
            ->orderBy('id')
            ->get();

        $validationsMembre = Parametre::where(
            'type_parametre_id',
            5
        )
            ->orderBy('id')
            ->get();

        $visibilites = Parametre::where(
            'type_parametre_id',
            6
        )
            ->orderBy('id')
            ->get();

        $statutsGroupe = Parametre::where(
            'type_parametre_id',
            7
        )
            ->orderBy('id')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | VUE
        |--------------------------------------------------------------------------
        */

        return view(
            'dependances.templates.admins.gestions.delicatesses.groupes.groupe',
            [

                /*
                |--------------------------------------------------------------------------
                | COMPTEURS
                |--------------------------------------------------------------------------
                */

                'GroupeT' => Groupe::where(
                    'supprimer',
                    0
                )->count(),

                'GroupeTC' => Groupe::where(
                    'supprimer',
                    1
                )->count(),

                /*
                |--------------------------------------------------------------------------
                | GROUPES
                |--------------------------------------------------------------------------
                */

                'groupes' => Groupe::where(
                    'supprimer',
                    0
                )
                    ->orderBy('nom')
                    ->get(),

                /*
                |--------------------------------------------------------------------------
                | HISTORIQUES
                |--------------------------------------------------------------------------
                */

                'historiques' => $historiques,

                /*
                |--------------------------------------------------------------------------
                | PERIODICITES
                |--------------------------------------------------------------------------
                */

                'periodicites' => $periodicites,

                /*
                |--------------------------------------------------------------------------
                | PARAMETRES GROUPE
                |--------------------------------------------------------------------------
                */

                'modesDistribution' => $modesDistribution,

                'validationsMembre' => $validationsMembre,

                'visibilites' => $visibilites,

                'statutsGroupe' => $statutsGroupe,

                'users' => $userCreateur,
            ]
        );
    }


    /**
     *--------------------------------------------------------------------------
    * CREATION
    *--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $data = $request->validate([

            'nom' => 'required|string|max:255',

            'description' => 'nullable|string',

            'createur_id' => 'required|exists:users,id',

            'montant_cotisation' => 'required|numeric|min:0',

            'penalite_pourcentage' =>
                'nullable|numeric|min:0',

            'fonds_assurance_pourcentage' =>
                'nullable|numeric|min:0',

            'delai_grace_heures' =>
                'nullable|integer|min:0',

            'nombre_participants_max' =>
                'required|integer|min:1',

            'periodicite_id' =>
                'required|exists:periodicites,id',

            'date_debut' =>
                'required|date',

            'date_fin_estimee' =>
                'nullable|date|after_or_equal:date_debut',

            'mode_distribution_id' =>
                'required|exists:parametres,id',

            'validation_membre_id' =>
                'required|exists:parametres,id',

            'visibilite_id' =>
                'required|exists:parametres,id',

            'statut_id' =>
                'required|exists:parametres,id',
        ]);

        try {

            GroupeService::store($data);

            toast(
                'Groupe créé avec succès',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }


    /**
     *--------------------------------------------------------------------------
    * MODIFICATION
    *--------------------------------------------------------------------------
    */
    public function update(Request $request)
    {
        $data = $request->validate([

            'id' =>
                'required|exists:groupes,id',

            'nom' =>
                'required|string|max:255',

            'description' =>
                'nullable|string',

            'createur_id' =>
                'required|exists:users,id',

            'montant_cotisation' =>
                'required|numeric|min:0',

            'penalite_pourcentage' =>
                'nullable|numeric|min:0',

            'fonds_assurance_pourcentage' =>
                'nullable|numeric|min:0',

            'delai_grace_heures' =>
                'nullable|integer|min:0',

            'nombre_participants_max' =>
                'required|integer|min:1',

            'periodicite_id' =>
                'required|exists:periodicites,id',

            'date_debut' =>
                'required|date',

            'date_fin_estimee' =>
                'nullable|date|after_or_equal:date_debut',

            'mode_distribution_id' =>
                'required|exists:parametres,id',

            'validation_membre_id' =>
                'required|exists:parametres,id',

            'visibilite_id' =>
                'required|exists:parametres,id',

            'statut_id' =>
                'required|exists:parametres,id',
        ]);

        try {

            GroupeService::update($data);

            toast(
                'Groupe modifié avec succès',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }









    /*
    |--------------------------------------------------------------------------
    | METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function corbeille(Request $request)
    {
        $data = $request->validate([

            'id' => 'required|exists:groupes,id',

        ]);

        try {

            GroupeService::mettreEnCorbeille(
                $data
            );

            toast(
                'Groupe supprimé',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }


    /*
    |--------------------------------------------------------------------------
    | METTRE UNE SELECTION EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function corbeilleSelection(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $data = $request->validate([

            'ids' => 'required|array',

            'ids.*' => 'exists:groupes,id',

        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | APPEL SERVICE
            |--------------------------------------------------------------------------
            */

            $count = GroupeService::mettreSelectionEnCorbeille(
                $data['ids']
            );

            /*
            |--------------------------------------------------------------------------
            | SUCCESS MESSAGE
            |--------------------------------------------------------------------------
            */

            toast(
                $count . ' élément(s) mis en corbeille avec succès',
                'success'
            );

        } catch (Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | ERREUR
            |--------------------------------------------------------------------------
            */

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }


    /*
    |--------------------------------------------------------------------------
    | TOUT METTRE EN CORBEILLE
    |--------------------------------------------------------------------------
    */

    public function corbeilleAll(Request $request)
    {
        try {

            $count = GroupeService::mettreEnCorbeilleAll();

            toast(
                $count . ' élément(s) supprimé(s)',
                'success'
            );

        } catch (Exception $e) {

            toast(
                $e->getMessage(),
                'error'
            );
        }

        return back();
    }

    // COTE UTILISATEUR DEBUT
        /**
         * Liste des icônes disponibles pour la personnalisation des groupes.
         */
        private function obtenirIconesGroupe(): array
        {
            return [
                [
                    'value' => 'fa-users',
                    'label' => 'Communauté',
                    'category' => 'communaute',
                    'keywords' => 'groupe membres collectif association'
                ],
                [
                    'value' => 'fa-handshake-o',
                    'label' => 'Entraide',
                    'category' => 'solidarite',
                    'keywords' => 'aide soutien partage coopération'
                ],
                [
                    'value' => 'fa-heart',
                    'label' => 'Solidarité',
                    'category' => 'solidarite',
                    'keywords' => 'amour entraide union'
                ],
                [
                    'value' => 'fa-home',
                    'label' => 'Famille',
                    'category' => 'famille',
                    'keywords' => 'maison foyer proches'
                ],
                [
                    'value' => 'fa-child',
                    'label' => 'Enfants',
                    'category' => 'famille',
                    'keywords' => 'jeunesse enfant'
                ],
                [
                    'value' => 'fa-briefcase',
                    'label' => 'Professionnel',
                    'category' => 'professionnel',
                    'keywords' => 'travail métier carrière'
                ],
                [
                    'value' => 'fa-building',
                    'label' => 'Entreprise',
                    'category' => 'professionnel',
                    'keywords' => 'société bureau organisation'
                ],
                [
                    'value' => 'fa-industry',
                    'label' => 'Industrie',
                    'category' => 'professionnel',
                    'keywords' => 'production usine activité'
                ],
                [
                    'value' => 'fa-graduation-cap',
                    'label' => 'Éducation',
                    'category' => 'education',
                    'keywords' => 'école études formation diplôme'
                ],
                [
                    'value' => 'fa-book',
                    'label' => 'Savoir',
                    'category' => 'education',
                    'keywords' => 'livre lecture connaissance'
                ],
                [
                    'value' => 'fa-flask',
                    'label' => 'Recherche',
                    'category' => 'education',
                    'keywords' => 'science laboratoire innovation'
                ],
                [
                    'value' => 'fa-trophy',
                    'label' => 'Réussite',
                    'category' => 'reussite',
                    'keywords' => 'victoire succès récompense'
                ],
                [
                    'value' => 'fa-star',
                    'label' => 'Prestige',
                    'category' => 'reussite',
                    'keywords' => 'étoile distinction'
                ],
                [
                    'value' => 'fa-bullseye',
                    'label' => 'Objectif',
                    'category' => 'reussite',
                    'keywords' => 'cible ambition but'
                ],
                [
                    'value' => 'fa-lightbulb-o',
                    'label' => 'Innovation',
                    'category' => 'reussite',
                    'keywords' => 'idée créativité inspiration'
                ],
                [
                    'value' => 'fa-shield',
                    'label' => 'Protection',
                    'category' => 'protection',
                    'keywords' => 'sécurité défense confiance'
                ],
                [
                    'value' => 'fa-lock',
                    'label' => 'Sécurité',
                    'category' => 'protection',
                    'keywords' => 'verrou privé confidentialité'
                ],
                [
                    'value' => 'fa-leaf',
                    'label' => 'Nature',
                    'category' => 'nature',
                    'keywords' => 'écologie plante environnement'
                ],
                [
                    'value' => 'fa-tree',
                    'label' => 'Arbre',
                    'category' => 'nature',
                    'keywords' => 'forêt croissance'
                ],
                [
                    'value' => 'fa-globe',
                    'label' => 'Réseau',
                    'category' => 'communaute',
                    'keywords' => 'monde planète connexion'
                ],
                [
                    'value' => 'fa-comments',
                    'label' => 'Discussion',
                    'category' => 'communaute',
                    'keywords' => 'échange parole dialogue'
                ],
                [
                    'value' => 'fa-bell',
                    'label' => 'Information',
                    'category' => 'divers',
                    'keywords' => 'notification alerte annonce'
                ],
                [
                    'value' => 'fa-calendar',
                    'label' => 'Événement',
                    'category' => 'divers',
                    'keywords' => 'date agenda rencontre'
                ],
                [
                    'value' => 'fa-gift',
                    'label' => 'Cadeau',
                    'category' => 'solidarite',
                    'keywords' => 'don générosité offrande'
                ],
                [
                    'value' => 'fa-money',
                    'label' => 'Finance',
                    'category' => 'divers',
                    'keywords' => 'argent cotisation économie'
                ],
                [
                    'value' => 'fa-credit-card',
                    'label' => 'Cotisation',
                    'category' => 'divers',
                    'keywords' => 'paiement contribution'
                ],
                [
                    'value' => 'fa-rocket',
                    'label' => 'Projet',
                    'category' => 'reussite',
                    'keywords' => 'lancement évolution ambition'
                ],
                [
                    'value' => 'fa-map-marker',
                    'label' => 'Localité',
                    'category' => 'communaute',
                    'keywords' => 'lieu quartier ville'
                ],
                [
                    'value' => 'fa-flag',
                    'label' => 'Engagement',
                    'category' => 'communaute',
                    'keywords' => 'cause objectif drapeau'
                ],
                [
                    'value' => 'fa-life-ring',
                    'label' => 'Assistance',
                    'category' => 'solidarite',
                    'keywords' => 'secours aide urgence'
                ],
                [
                    'value' => 'fa-diamond',
                    'label' => 'Excellence',
                    'category' => 'reussite',
                    'keywords' => 'qualité valeur distinction'
                ],
                [
                    'value' => 'fa-bicycle',
                    'label' => 'Activité',
                    'category' => 'divers',
                    'keywords' => 'sport loisir mouvement'
                ],
            ];
        }
        /**
         * |--------------------------------------------------------------------------
         * | ESPACE COMMUNAUTAIRE
         * |--------------------------------------------------------------------------
         */


        public function indexCommunaute()
        {
            $user = Auth::user();

            if (!$user) {
                abort(403, 'Accès non autorisé.');
            }

            $profilConnecte = $user->profil;

            if (!$profilConnecte) {
                abort(403, 'Aucun profil associé à cet utilisateur.');
            }

            /*
            |--------------------------------------------------------------------------
            | DONNÉES DE LA VUE
            |--------------------------------------------------------------------------
            */

            $data = [];

            // Utilisateur connecté
            $data['user'] = $user;

            // Profil connecté
            $data['profilConnecte'] = $profilConnecte;

            // Bibliothèque des icônes disponibles
            $data['groupIcons'] = $this->obtenirIconesGroupe();

            /*
            |--------------------------------------------------------------------------
            | PÉRIODICITÉS
            |--------------------------------------------------------------------------
            */

            $data['periodicites'] = Periodicite::where('active', false)
                ->orderBy('id')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | UTILISATEURS POUVANT ÊTRE CRÉATEURS
            |--------------------------------------------------------------------------
            */

            $data['userCreateur'] = User::where('supprimer', 0)
                ->whereHas('profil', function ($query) {
                    $query->where('code', '!=', 'SIMPLE-UTILISATEUR');
                })
                ->orderBy('name')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | UTILISATEURS POUVANT ÊTRE INVITÉS DANS UNE TONTINE
            |--------------------------------------------------------------------------
            */

            $profilsInvitables = match ($profilConnecte->code) {

                // Un membre de la communauté ne peut inviter
                // que d'autres membres de la communauté.
                'MEMBRE-COMMUNAUTE' => [
                    'MEMBRE-COMMUNAUTE',
                ],

                // Les profils intermédiaires et administratifs
                // peuvent inviter tous les profils sauf les développeurs.
                'OPERATEUR',
                'JURISTE',
                'RH',
                'DRH',
                'ADMIN',
                'DIRECTEUR-GENERAL' => [
                    'MEMBRE-COMMUNAUTE',
                    'OPERATEUR',
                    'JURISTE',
                    'RH',
                    'DRH',
                    'ADMIN',
                    'DIRECTEUR-GENERAL',
                ],

                // Le développeur peut inviter tout le monde
                // sauf le super développeur.
                'DEVELOPPEUR' => [
                    'MEMBRE-COMMUNAUTE',
                    'OPERATEUR',
                    'JURISTE',
                    'RH',
                    'DRH',
                    'ADMIN',
                    'DIRECTEUR-GENERAL',
                    'DEVELOPPEUR',
                ],

                // Le super développeur peut inviter tout le monde.
                'SUPER-DEVELOPPEUR' => [
                    'MEMBRE-COMMUNAUTE',
                    'OPERATEUR',
                    'JURISTE',
                    'RH',
                    'DRH',
                    'ADMIN',
                    'DIRECTEUR-GENERAL',
                    'DEVELOPPEUR',
                    'SUPER-DEVELOPPEUR',
                ],

                default => [],
            };

            $data['usersInvitables'] = User::where('supprimer', 0)
                ->where('id', '!=', $user->id)
                ->whereHas('profil', function ($query) use ($profilsInvitables) {
                    $query->whereIn('code', $profilsInvitables);
                })
                ->with('profil')
                ->orderBy('name')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | MODES DE DISTRIBUTION
            |--------------------------------------------------------------------------
            */

            $data['modesDistribution'] = Parametre::where(
                'type_parametre_id',
                4
            )
                ->orderBy('id')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | MODES DE VALIDATION DES MEMBRES
            |--------------------------------------------------------------------------
            */

            $data['validationsMembre'] = Parametre::where(
                'type_parametre_id',
                5
            )
                ->orderBy('id')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | VISIBILITÉS DES GROUPES
            |--------------------------------------------------------------------------
            */

            $data['visibilites'] = Parametre::where(
                'type_parametre_id',
                6
            )
                ->orderBy('id')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | STATUTS DES GROUPES
            |--------------------------------------------------------------------------
            */

            $data['statutsGroupe'] = Parametre::where(
                'type_parametre_id',
                7
            )
                ->orderBy('id')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | AFFICHAGE
            |--------------------------------------------------------------------------
            */

            return view(
                'dependances.templates.admins.gestions.communautes.groupes.groupe',
                $data
            );
        }



        /**
         * |--------------------------------------------------------------------------
         * | CREATION UTILISATEUR
         * |--------------------------------------------------------------------------
         */
        public function storeUtilisateur(Request $request)
        {
            $data = $request->validate([

                'nom' =>
                    'required|string|max:255',

                'description' =>
                    'nullable|string',

                // IDENTITÉ VISUELLE
                'icone' =>
                    'nullable|string|max:100',

                'montant_cotisation' =>
                    'required|numeric|min:0',

                'penalite_pourcentage' =>
                    'nullable|numeric|min:0',

                'fonds_assurance_pourcentage' =>
                    'nullable|numeric|min:0',

                'delai_grace_heures' =>
                    'nullable|integer|min:0',

                'nombre_participants_max' =>
                    'required|integer|min:1',

                'periodicite_id' =>
                    'required|exists:periodicites,id',

                'date_debut' =>
                    'required|date',

                'date_fin_estimee' =>
                    'nullable|date|after_or_equal:date_debut',

                'mode_distribution_id' =>
                    'required|exists:parametres,id',

                'validation_membre_id' =>
                    'required|exists:parametres,id',

                'visibilite_id' =>
                    'required|exists:parametres,id',
            ]);

            try {

                GroupeUtilisateurService::store($data);

                toast(
                    'Groupe créé avec succès',
                    'success'
                );

            } catch (Exception $e) {

                toast(
                    $e->getMessage(),
                    'error'
                );
            }

            return back();
        }
        /**
         * |--------------------------------------------------------------------------
         * | MODIFICATION UTILISATEUR
         * |--------------------------------------------------------------------------
         */
        public function updateUtilisateur(Request $request)
        {
            $data = $request->validate([

                'id' =>
                    'required|exists:groupes,id',

                'nom' =>
                    'required|string|max:255',

                'description' =>
                    'nullable|string',

                // IDENTITÉ VISUELLE
                'icone' =>
                    'nullable|string|max:100',

                'montant_cotisation' =>
                    'required|numeric|min:0',

                'penalite_pourcentage' =>
                    'nullable|numeric|min:0',

                'fonds_assurance_pourcentage' =>
                    'nullable|numeric|min:0',

                'delai_grace_heures' =>
                    'nullable|integer|min:0',

                'nombre_participants_max' =>
                    'required|integer|min:1',

                'periodicite_id' =>
                    'required|exists:periodicites,id',

                'date_debut' =>
                    'required|date',

                'date_fin_estimee' =>
                    'nullable|date|after_or_equal:date_debut',

                'mode_distribution_id' =>
                    'required|exists:parametres,id',

                'validation_membre_id' =>
                    'required|exists:parametres,id',

                'visibilite_id' =>
                    'required|exists:parametres,id',
            ]);

            try {

                GroupeUtilisateurService::update($data);

                toast(
                    'Groupe modifié avec succès',
                    'success'
                );

            } catch (Exception $e) {

                toast(
                    $e->getMessage(),
                    'error'
                );
            }

            return back();
        }
    // COTE UTILISATEUR N
}
