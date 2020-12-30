@extends('layout.app')

@section('title')
Ajouter une promotion
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{route("promotions.store")}}" >
        @csrf
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
            </div>
            <input type="text" placeholder="Entrez le nom de la promotion" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Specialitée</span>
            </div>
            <input type="text" placeholder="Entrez la description de la promotion" name="speciality" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        
        <h3>Choisir le module pour la promotion</h3>
        <br>
        <div class="row" >
            @foreach ($modules as $module)
            <div class="col-sm-4">
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="module-{{ $module->id }}">{{ $module->name }}</label>
                    <input type="radio" class="form-check-input" id="module-{{ $module->id }}"
                    value="{{ $module->id }}" name="modules">
                </div>
            </div>
            @endforeach
        </div>
        
        <a class="btn btn-info text-white" href="{{route('promotions.index')}}"><i style="font-size: 25px" class="fas fa-long-arrow-alt-left"></i></a>
        <input type="submit" class="btn btn-dark" value="AJOUTER">
        
    </form>
</div>
@endsection