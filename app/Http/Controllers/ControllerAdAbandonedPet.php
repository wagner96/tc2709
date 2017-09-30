<?php

namespace TC\Http\Controllers;

use Illuminate\Http\Request;
use TC\Models\AdPetAbandoned;
use TC\Models\Pet;
use TC\Models\PhotosPet;

class ControllerAdAbandonedPet extends Controller
{

    //
    public function index()
    {
        return view('admin.advertisings.allAdAbandoned');
    }

    public function create()
    {
        return view('admin.advertisings.createAdAbandoned');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_cli = auth()->user()->id;

        $pet = new Pet();

        $pet->fkUser = $id_cli;
        $pet->name_pet = $request->input('name_pet');
        $pet->age_pet = $request->input('age_pet');
        $pet->proportion_pet = $request->input('proportion_pet');
        $pet->species_pet = $request->input('species_pet');
        $pet->breed_pet = $request->input('breed_pet');
        $pet->movie_pet = $request->input('movie_pet');
        $pet->city_pet = $request->input('city_pet');
        $pet->state_pet = $request->input('state_pet');
        $pet->save();

        $idPet = $pet->id;

        $adAbandoned = new AdPetAbandoned();

        $adAbandoned->fkPet = $idPet;
        $adAbandoned->personality_pet = $request->input('personality_pet');
        $adAbandoned->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //echo "<pre>";
        //  print_r($user);
        //echo "</pre>";
        return view('show', array('user' => $user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function post_upload(Request $request)
    {

        
        $image = $request->file('file');
        $imageName = time() . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $photo = new PhotosPet();
        $photo->url = $imageName;
        $photo->save();


        return response()->json(['success' => $imageName]);

    }

}
