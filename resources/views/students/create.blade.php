@extends('layout.app')

@section('title')
Ajouter un etudiant
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{route("students.store")}}" >
        @csrf
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
            </div>
            <input type="text" placeholder="Entrez le nom de l'éleve" name="lastname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Prénom</span>
            </div>
            <input type="text" placeholder="Entrez le prénom de l'éleve" name="firstname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            </div>
            <input type="text" placeholder="Entrez le prénom de l'éleve" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        
        <h3>Choisir la promotion de l'étudiant :</h3>
        <br>
        <div class="row">
            @foreach ($promotions as $promotion)
            <div class="col-sm-4">
                <div class="mb-3 form-check">
                    <label class="form-check-label" for="promotion-{{ $promotion->id }}">{{ $promotion->name }}  {{ $promotion->speciality }}</label>
                    <input type="radio" class="form-check-input" id="promotion-{{ $promotion->id }}"
                    value="{{ $promotion->id }}" name="promotion_id">
                </div>
            </div>
            @endforeach
        </div>
        
        <h3>Choisir le module de l'etudiant :</h3>
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
        
        <a class="btn btn-info text-white" href="{{route('students.index')}}"><i style="font-size: 25px" class="fas fa-long-arrow-alt-left"></i></a>
        <input type="submit" class="btn btn-dark" value="AJOUTER">
        
    </form>
</div>
@endsection