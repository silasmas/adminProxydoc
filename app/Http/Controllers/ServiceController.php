<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use App\Models\abonnement;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Models\abonnementUser;
use App\Models\paiement;
use Illuminate\Validation\Rules;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("pages.dashboard");
    }

    public function historique()
    {
        $historique = paiement::where('user_id', Auth::user()->id)->simplePaginate(20);
        //  dd($historique);
        return view("pages.historique", compact("historique"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceRequest $request)
    {
        //
    }
    public function editprofil(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'datenaissance' => ['required', 'string', 'max:255'],
            'customer_address' => ['required', 'string', 'max:255'],
            // 'telephone' => ['required', new PhoneNumber,'unique:users'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        // dd($valid);
        if (!$valid->fails()) {
            $u = User::where("id", Auth::user()->id)->first();
            $u->name = $request->name;
            $u->prenom = $request->prenom;
            $u->sexe = $request->sexe;
            $u->ville = $request->ville;
            $u->datenaissance = $request->datenaissance;
            // $u->phone = $request->phone;
            $u->pays = $request->pays;
            $u->adresse = $request->customer_address;
            // $u->email= $request->email;

            $u->save();
            if ($u) {
                $user = User::with('abonnement', 'abonnement.service')->where('email', $u->email)
                    ->orWhere('telephone', $u->telephone)
                    ->first();
                event(new Registered($user));

                // Auth::login($u);
                return response()->json(['reponse' => true, 'msg' => "Profil mis à jour avec succès"]);

                // return back()->with('message', "Profil mis à jour avec succès");
            } else {
                return response()->json(['reponse' => false, 'msg' => "Erreur de mis à jour du profil"]);

                // return back()->with('message', "Erreur");
            }
        } else {
            return response()->json(['reponse' => false, 'type' => "velidate", 'msg' => $valid->errors()->all()]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ab = abonnement::with("service", "service.acte")->where('id', $id)->first();
        //dd($ab->service);
        return view("pages.detailMonAbonnement", compact("ab"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateserviceRequest $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
    }
}
