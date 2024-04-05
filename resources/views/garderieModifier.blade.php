@extends('layouts.app')

@section('content')
    <form method="POST" action="/garderies/{{ $garderie->Id }}/update">
      @csrf
      @method('PUT')
      <table>
        <tr>
          <td>
            <label>Nom : </label>
          </td>
          <td>
            <input type="text" name="nom" value="{{$garderie->nom}}" maxlength="100" readonly> 
          </td>
        </tr>
    
        <tr>
          <td>
            <label>Adresse : </label>
          </td>
          <td>
            <input type="text" name="adresse" value="{{$garderie->adresse}}" maxlength="200" required>
          </td>
        </tr> 
    
        <tr>
          <td>
            <label>Ville : </label>
          </td>
          <td>
            <input type="text" name="ville" value="{{$garderie->ville}}" maxlength="100" required>
          </td>
        </tr>
        
        <tr>
          <td>
            <label>Province : </label>
          </td>
          <td>
            <select name="province">
              @foreach($listeProvinces as $laProvince)
                <option value="{{ $laProvince->Id }}" @if ($laProvince->Id == $garderie->id_province) selected @endif>{{ $laProvince->description }}</option>
              @endforeach
            </select>
          </td>
        </tr>
    
        <tr>
          <td>
            <label>Téléphone : </label>
          </td>
          <td>
            <input type="text" name="telephone" value="{{$garderie->telephone}}" maxlength="12" required>
          </td>
        </tr>
    
        <tr>
          <td>
            <button type="submit">Modifier</button>
          </td>
          <td>
            <input type="button" value="Annuler" onClick=" history.back();">
          </td>
        </tr>
      </table>
    </form>
@endsection