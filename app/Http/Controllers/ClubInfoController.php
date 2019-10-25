<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\club;
use App\Models\speler;

class ClubInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $name)
    {
        $club = club::where('naam',$name)->get();
        $data['clubinfo'] = $club;
        $filter = $request->query();
        if(isset($filter['filter']) == false){
            $spelers = speler::where('club_naam',$name)->get();
            $data['spelers'] = $spelers;
        }
        else if(isset($filter['filter']) == true){
            if($filter['filter'] == 'Topscoorder'){
                $spelers = speler::where([['club_naam',$name]])->orderBy('doelpunten','desc')->limit(3)->get();
                // dump($spelers);
                $data['spelers'] = $spelers;
            }
            else if($filter['filter'] == 'Veteranen'){
                $spelers = speler::onlyTrashed()->where([['club_naam',$name]])->get();
                $data['spelers'] = $spelers;
            }
            else{
                $spelers = speler::where([['club_naam',$name],['positie',$filter['filter']]])->get();
                $data['spelers'] = $spelers;
            }
        }
        // $url = "/" . $name . "";
        // dump($url);
        return view('ClubInfo', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $club = club::where('naam',$name)->get();
        $data['clubinfo'] = $club;
        return view('ClubAddSpeler', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $name)
    {
        speler::insert(['naam' => $request->Naam, 'club_naam' => $name, 'doelpunten' => $request->AantalDoelpunten, 'positie' => $request->Positie]);
        $club = club::where('naam',$name)->get();
        club::where('naam',$name)->update(['aantal_spelers' => $club[0]['aantal_spelers'] + 1]);
        return redirect('/'.$name.'');
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
    public function destroy($name, $id)
    {
        $speler = speler::find($id);
        $speler->delete();
        $club = club::where('naam',$name)->get();
        club::where('naam',$name)->update(['aantal_spelers' => $club[0]['aantal_spelers'] - 1]);
        return redirect('/'.$name.'');
    }
}
