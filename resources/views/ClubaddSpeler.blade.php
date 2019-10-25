@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Voeg speler toe</div>
                <div class="card-body">
                    <form method="POST" action="/{{$clubinfo[0]['naam']}}/store">
                        @csrf
                        <div class="form-group row">
                            <label for="InputName" class="col-sm-3 col-form-label">Naam:</label>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="Naam" id="InputName" value="" placeholder="Naam">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="InputDoelpunten" class="col-sm-3 col-form-label">Aantal doelpunten:</label>
                            <div class="col-sm-9">
                                <input required type="text"  class="form-control" name="AantalDoelpunten" id="InputDoelpunten" value="" placeholder="Aantal doelpunten">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="InputClub" class="col-sm-3 col-form-label">Positie:</label>
                            <div class="col-sm-9">
                                <input required type="text" disabled class="form-control" name="Club" id="InputClub" value="{{$clubinfo[0]['naam']}}" placeholder="Club">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="selectPositie" class="col-sm-3 col-form-label">Team</label>
                            <div class="col-sm-9">
                                <select id="selectPositie" name="Positie" class="form-control">
                                    <option selected hidden>Kies Positie</option>
                                    <option value="Voorhoede">Voorhoede</option>
                                    <option value="Middenveld">Middenveld</option>
                                    <option value="Achterhoede">Achterhoede</option>
                                    <option value="Doelman">Doelman</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success col-sm-12">Opslaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
