@extends('layout.app')

@section('title')
Modifier un module   
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{route("modules.update", ["module" => $module])}}">
        @method("PUT")
        @csrf
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
            </div>
            <input type="text" placeholder="Entrez le nouveau nom du module" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
            </div>
            <input type="text" placeholder="Entrez la nouvelle description du module" name="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <h3>Choisir la nouvelle promotion pour le module </h3>
        <br>
        <div class="row">
            @foreach ($promotions as $promotion)
            <div class="col-sm-4">
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="promotion-{{ $promotion->id }}">{{ $promotion->name}}  {{ $promotion->speciality}}</label>
                    <input type="radio" class="form-check-input" id="promotion-{{ $promotion->id }}"
                    value="{{ $promotion->id }}" name="promotion_id">
                </div>
            </div>
            @endforeach
        </div>

        <a class="btn btn-info text-white" href="{{route('modules.index')}}"><i style="font-size: 25px" class="fas fa-long-arrow-alt-left"></i></a>
        <input type="submit" class="btn btn-dark" value="MODIFIER">
    </form>
</div>
@endsection