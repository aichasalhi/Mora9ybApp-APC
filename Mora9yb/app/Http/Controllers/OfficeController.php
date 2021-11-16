<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Commune;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function index()
    {
        //
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centres = Centre::all();
        return view('supervisor.createdirectcentre',compact('centres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $office= new Office();
    $office->centre_id = $request->input('centre_id');
    $office->commune_id = $request->input('commune_id');
    $office->num_office = $request->input('num_office');
    $office->wilaya_id = '01';
    $office->nbr_électeurs_inscrits = $request->input('nbr_électeurs_inscrits');
    $office->nbrvotants = $request->input('nbrvotants');
    $office->nbrdoc_contest = $request->input('nbrdoc_contest');
    
    $office->nbrdoc_annuler = $request->input('nbrdoc_annuler');
    $office->nbrvotes_exprim = $request->input('nbrvotes_exprim');

    ///////LISTES
    $office->L1 = $request->input('L1');
    $office->L2 = $request->input('L2');
    $office->L3 = $request->input('L3');
    $office->L4 = $request->input('L4');
    $office->L5 = $request->input('L5');
    $office->L6 = $request->input('L6');
    $office->L7 = $request->input('L7');
    $office->L8 = $request->input('L8');
    $office->L9 = $request->input('L9');
    $office->L10 = $request->input('L10');
    $office->L11 = $request->input('L11');
    $office->L12 = $request->input('L12');
    // //////////
    $office->L13 = $request->input('L13');
    $office->L14 = $request->input('L14');
    $office->L15 = $request->input('L15');
    $office->L16 = $request->input('L16');
    $office->L17 = $request->input('L17');
    $office->L18 = $request->input('L18');
    $office->L19 = $request->input('L19');
    $office->L20 = $request->input('L20');
    $office->L21 = $request->input('L21');
    $office->L22 = $request->input('L22');
    $office->L23 = $request->input('L23');
    $office->L24 = $request->input('L24');
    $office->L25 = $request->input('L25');
    $office->L26 = $request->input('L26');
    ///////////
    $office->L27 = $request->input('L27');
    $office->L28 = $request->input('L28');
    $office->L29 = $request->input('L29');
    $office->L30 = $request->input('L30');
    $office->L31 = $request->input('L31');
    $office->L32 = $request->input('L32');
    $office->L33 = $request->input('L33');
    $office->L34 = $request->input('L34');
    $office->L35 = $request->input('L35');
    $office->L36 = $request->input('L36');
    ///////////
    $office->L37 = $request->input('L37');
    $office->L38 = $request->input('L38');
    $office->L39 = $request->input('L39');
    $office->L40 = $request->input('L40');
    
    
    


    

    $office->save();
    
    // $liste = new Liste();
    // $liste->office_id=$office->num_office;
    // $liste->centre_id=$request->input('centre_id');
    // $office->commune_id = $request->input('commune_id');
    // $office->wilaya_id = '01';
    // $liste->save();
    $request->session()->flash('status','شكرا لتعاونكم !');
    return view('supervisor.thanx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office ::find($id);
        return view('supervisor.updateform',[
            'Office'=> $office
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    $office = Office ::find($id);
    $office->centre_id = $request->input('centre_id');
    $office->commune_id = $request->input('commune_id');
    $office->num_office = $request->input('num_office');
    $office->wilaya_id = '01';
    $office->nbr_électeurs_inscrits = $request->input('nbr_électeurs_inscrits');
    $office->nbrvotants = $request->input('nbrvotants');
    $office->nbrdoc_contest = $request->input('nbrdoc_contest');
    
    $office->nbrdoc_annuler = $request->input('nbrdoc_annuler');
    $office->nbrvotes_exprim = $request->input('nbrvotes_exprim');
    $office->binaa = $request->input('binaa');
    $office->hams = $request->input('hams');
    $office->karama = $request->input('karama');
    $office->nahda = $request->input('nahda');
    $office->isla7 = $request->input('isla7');
    $office->save();
     return view('supervisor.thanx');
    // $liste = new Liste();
    // $liste->office_id=$office->num_office;
    // $liste->centre_id=$request->input('centre_id');
    // $office->commune_id = $request->input('commune_id');
    // $office->wilaya_id = '01';
    // $liste->save();
    
   
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
