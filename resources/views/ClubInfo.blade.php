@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Clubs
                    <a class="btn btn-success float-right" href="/{{$clubinfo[0]['naam']}}/add">Voeg speler toe</a>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="InputName" class="col-sm-3 col-form-label">Naam:</label>
                        <div class="col-sm-9">
                            <input required type="text" disabled class="form-control" name="Voornaam" id="staticEmail" value="{{$clubinfo[0]['naam']}}" placeholder="Naam">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="InputSpelers" class="col-sm-3 col-form-label">Aantal spelers:</label>
                        <div class="col-sm-9">
                            <input required type="text" disabled  class="form-control" name="Achternaam" id="inputPassword" value="{{$clubinfo[0]['aantal_spelers']}}" placeholder="Aantal spelers">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="InputPositie" class="col-sm-3 col-form-label">Positie:</label>
                        <div class="col-sm-9">
                            <input required type="text" disabled class="form-control" name="Achternaam" id="inputPassword" value="{{$clubinfo[0]['positie']}}" placeholder="Positie">
                        </div>
                    </div>
                    {{-- spelers --}}
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">Speler selectie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spelers as $speler)
                                <tr>
                                    <td>{{$speler->naam}}</td>
                                    <td><a class="btn btn-danger float-right" href="/{{$clubinfo[0]['naam']}}/{{$speler->id}}/delete">X</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group row">
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=Voorhoede">Voorhoede</a>
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=Middenveld">Middenveld</a>
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=Achterhoede">Achterhoede</a>
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=Doelman">Doelman</a>
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=Topscoorder">Topscoorder</a>
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=Veteranen">Veteranen</a>
                        <a class="btn btn-dark col-sm" href="/{{$clubinfo[0]['naam']}}?filter=">Alles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
