<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use App\Models\Cmdresult;
use Illuminate\Http\Request;

class CmdresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supervisor.createdirectcommune');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centres = Centre::all();
        return view('supervisor.createdirectcommune',compact('centres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cmdresult= new Cmdresult();
        // $cmdresult->centre_id = '00';
        $cmdresult->commune_id = $request->input('commune_id');
        $cmdresult->wilaya_id = $request->input('wilaya_id');
        $cmdresult->nbr_électeurs_inscrits = $request->input('nbr_électeurs_inscrits');
        $cmdresult->nbrvotants = $request->input('nbrvotants');
        $cmdresult->nbrdoc_contest = $request->input('nbrdoc_contest');
        
        $cmdresult->nbrdoc_annuler = $request->input('nbrdoc_annuler');
        $cmdresult->nbrvotes_exprim = $request->input('nbrvotes_exprim');
    
        ///////LISTES
        $cmdresult->L1 = $request->input('L1');
        $cmdresult->L2 = $request->input('L2');
        $cmdresult->L3 = $request->input('L3');
        $cmdresult->L4 = $request->input('L4');
        $cmdresult->L5 = $request->input('L5');
        $cmdresult->L6 = $request->input('L6');
        $cmdresult->L7 = $request->input('L7');
        $cmdresult->L8 = $request->input('L8');
        $cmdresult->L9 = $request->input('L9');
        $cmdresult->L10 = $request->input('L10');
        $cmdresult->L11 = $request->input('L11');
        $cmdresult->L12 = $request->input('L12');
        //////////
        $cmdresult->L13 = $request->input('L13');
        $cmdresult->L14 = $request->input('L14');
        $cmdresult->L15 = $request->input('L15');
        $cmdresult->L16 = $request->input('L16');
        $cmdresult->L17 = $request->input('L17');
        $cmdresult->L18 = $request->input('L18');
        $cmdresult->L19 = $request->input('L19');
        $cmdresult->L20 = $request->input('L20');
        $cmdresult->L21 = $request->input('L21');
        $cmdresult->L22 = $request->input('L22');
        $cmdresult->L23= $request->input('L23');
        $cmdresult->L24 = $request->input('L24');
        $cmdresult->L25 = $request->input('L25');
        $cmdresult->L26 = $request->input('L26');
        ///////////
        $cmdresult->L27 = $request->input('L27');
        $cmdresult->L28 = $request->input('L28');
        $cmdresult->L29 = $request->input('L29');
        $cmdresult->L30 = $request->input('L30');
        $cmdresult->L31 = $request->input('L31');
        $cmdresult->L32 = $request->input('L32');
        $cmdresult->L33 = $request->input('L33');
        $cmdresult->L34 = $request->input('L34');
        $cmdresult->L35 = $request->input('L35');
        $cmdresult->L36 = $request->input('L36');
        ///////////
        $cmdresult->L37 = $request->input('L37');
        $cmdresult->L38 = $request->input('L38');
        $cmdresult->L39 = $request->input('L39');
        $cmdresult->L40 = $request->input('L40');
       
        
    
        
    
        $cmdresult->save();
        
        // $liste = new Liste();
        // $liste->cmdresult_id=$cmdresult->num_cmdresult;
        // $liste->centre_id=$request->input('centre_id');
        // $cmdresult->commune_id = $request->input('commune_id');
        // $cmdresult->wilaya_id = '01';
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
