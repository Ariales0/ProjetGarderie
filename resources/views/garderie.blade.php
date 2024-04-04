@extends('layouts.app')

@section('content')
    @if($listeGarderies->Count() > 0)
        <table>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Province</th>
                <th>Téléphone</th>
                <th><input value="Vider" type="button" /></th>
            </tr>
            @foreach($listeGarderies as $uneGarderie)
            <tr>
                <td><h3> {{ $uneGarderie->nom }}</h3></td>
                <td><h3> {{ $uneGarderie->adresse }}</h3></td>
                <td><h3> {{ $uneGarderie->ville }}</h3></td>
                <td><h3> {{ $uneGarderie->province->description }}</h3></td>
                <td><h3> {{ $uneGarderie->telephone }}</h3></td>
                <td><form method="GET" action="/garderies/{{ $uneGarderie->id }}/edit">
                    @csrf
                    <button type="submit">Modifier</button>
                </form>
            </td>
            <td>
                <form method="POST" action="/garderies/{{ $uneGarderie->id }}/delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette garderie ?')">Supprimer</button>
                </form>
            </td>
                
            </tr>
            @endforeach
        </table>
    @else
        <span>Aucune garderie dans la base de données.</span>
    @endif
@endsection