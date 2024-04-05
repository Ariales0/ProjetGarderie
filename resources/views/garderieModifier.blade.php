@extends('layouts.app')

@section('content')
    <form method="POST" action="/posts/{{ $post->id }}/update">
      @csrf
      @method('PUT')
      Title : <input type="text" name="title" value="{{ $post->title}}">
      Content : <input type="text" name="content" value="{{ $post->content}}">
      <button type="submit">Modifier</button>
    <input type="button" value="Annuler" onClick=" history.back();">
    </form>
@endsection