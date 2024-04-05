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
                <th>
                    <form method="POST" action="/garderies/clear">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer toutes les garderies ?')">Vider</button>
                    </form>
                </th>
            </tr>
            @foreach($listeGarderies as $uneGarderie)
            <tr>
                <td><h3> {{ $uneGarderie->nom }}</h3></td>
                <td><h3> {{ $uneGarderie->adresse }}</h3></td>
                <td><h3> {{ $uneGarderie->ville }}</h3></td>
                <td><h3> {{ $uneGarderie->province->description }}</h3></td>
                <td><h3> {{ $uneGarderie->telephone }}</h3></td>
                <td><form method="GET" action="/garderies/{{ $uneGarderie->Id }}/edit">
                    @csrf
                    <button type="submit">Modifier</button>
                </form>
            </td>
            <td>
                <form method="POST" action="/garderies/{{ $uneGarderie->Id }}/delete">
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
    <form method="POST" action="/garderies/ajouter">
        @csrf

        <table>
            <tr>
              <td>
                <label>Nom : </label>
              </td>
              <td>
                <input type="text" name="nom" maxlength="100" required> 
              </td>
            </tr>
        
            <tr>
              <td>
                <label>Adresse : </label>
              </td>
              <td>
                <input type="text" name="adresse" maxlength="200" required>
              </td>
            </tr> 
        
            <tr>
              <td>
                <label>Ville : </label>
              </td>
              <td>
                <input type="text" name="ville" maxlength="100" required>
              </td>
            </tr>
            
            <tr>
              <td>
                <label>Province : </label>
              </td>
              <td>
                <select name="province">
                  @foreach($listeProvinces as $laProvince)
                    <option value="{{ $laProvince->Id }}">{{ $laProvince->description }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
        
            <tr>
              <td>
                <label>Téléphone : </label>
              </td>
              <td>
                <input type="text" name="telephone" maxlength="12" required>
              </td>
            </tr>
        
            <tr>
              <td >
                <button type="submit">Créer</button>
              </td>
            </tr>
          </table>

      </form>
@endsection