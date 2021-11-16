<?php

namespace App\Http\Controllers;

use App\Models\Ctdresult;
use Illuminate\Http\Request;

class CtdresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('supervisor.createdirectcentre');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //      return view('supervisor.createdirectcentre');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
    $ctdresult= new Ctdresult();
    $ctdresult->centre_id = $request->input('centre_id');
    $ctdresult->commune_id = $request->input('commune_id');
    $ctdresult->wilaya_id = $request->input('wilaya_id');
    $ctdresult->nbr_électeurs_inscrits = $request->input('nbr_électeurs_inscrits');
    $ctdresult->nbrvotants = $request->input('nbrvotants');
    $ctdresult->nbrdoc_contest = $request->input('nbrdoc_contest');
    
    $ctdresult->nbrdoc_annuler = $request->input('nbrdoc_annuler');
    $ctdresult->nbrvotes_exprim = $request->input('nbrvotes_exprim');

    ///////LISTES
    $ctdresult->L1 = $request->input('L1');
    $ctdresult->L2 = $request->input('L2');
    $ctdresult->L3 = $request->input('L3');
    $ctdresult->L4 = $request->input('L4');
    $ctdresult->L5 = $request->input('L5');
    $ctdresult->L6 = $request->input('L6');
    $ctdresult->L7 = $request->input('L7');
    $ctdresult->L8 = $request->input('L8');
    $ctdresult->L9 = $request->input('L9');
    $ctdresult->L10 = $request->input('L10');
    $ctdresult->L11 = $request->input('L11');
    $ctdresult->L12 = $request->input('L12');
    //////////
    $ctdresult->L13 = $request->input('L13');
    $ctdresult->L14 = $request->input('L14');
    $ctdresult->L15 = $request->input('L15');
    $ctdresult->L16 = $request->input('L16');
    $ctdresult->L17 = $request->input('L17');
    $ctdresult->L18 = $request->input('L18');
    $ctdresult->L19 = $request->input('L19');
    $ctdresult->L20 = $request->input('L20');
    $ctdresult->L21 = $request->input('L21');
    $ctdresult->L22 = $request->input('L22');
    $ctdresult->L23= $request->input('L23');
    $ctdresult->L24 = $request->input('L24');
    $ctdresult->L25 = $request->input('L25');
    $ctdresult->L26= $request->input('L26');
    ///////////
    $ctdresult->L27 = $request->input('L27');
    $ctdresult->L28 = $request->input('L28');
    $ctdresult->L29 = $request->input('L29');
    $ctdresult->L30 = $request->input('L30');
    $ctdresult->L31 = $request->input('L31');
    $ctdresult->L32 = $request->input('L32');
    $ctdresult->L33 = $request->input('L33');
    $ctdresult->L34 = $request->input('L34');
    $ctdresult->L35 = $request->input('L35');
    $ctdresult->L36 = $request->input('L36');
    ///////////
    $ctdresult->L37 = $request->input('L37');
    $ctdresult->L38 = $request->input('L38');
    $ctdresult->L39 = $request->input('L39');
    $ctdresult->L40 = $request->input('L40');
   
    

    

    $ctdresult->save();
    
    // $liste = new Liste();
    // $liste->ctdresult_id=$ctdresult->num_ctdresult;
    // $liste->centre_id=$request->input('centre_id');
    // $ctdresult->commune_id = $request->input('commune_id');
    // $ctdresult->wilaya_id = '01';
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
        //
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
        //
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
