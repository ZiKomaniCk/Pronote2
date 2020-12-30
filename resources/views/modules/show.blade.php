@extends('layout.app')

@section('title')
Detail du module
@endsection


@section('content')

<div class="row">
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="\images\module.png" alt="picture module" style="max-width: 180px;">
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="card-title">{{ $module->name}}</h4>
                        <p class="card-text"><strong> Description : </strong>{{ $module->description }}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $module->updated_at }}</small></p>
                        
                        
                        <form method="POST" action="{{route("modules.destroy", ["module" => $module])}}">
                            <a class="btn btn-info text-white" href="{{route('modules.index')}}"><i style="font-size: 25px" class="fas fa-long-arrow-alt-left"></i></a>
                            <a class="btn btn-primary" href="{{route('modules.edit', ['module'=>$module])}}">Modifier</a>
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-danger" type="sumbit">
                                Supprimer
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($module->students[0]))
<div class="row">
    <h2>Liste des étudiants attribués au module</h2>
    @foreach ($module->students as $student)
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="\images\profilePicture.png" alt="picture profile" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->lastname }} {{ $student->firstname}}</h5>
                        <p class="card-text">Promo: {{$student->promotion->name}}</p>
                        <p class="card-text">Email: {{$student->email}}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $student->updated_at }}</small></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<h3 class="text-danger">Il n'y a pas d'étudiants assigné au module.</h3>
<h4>Vous pouvez créer des étudiant a l'aide du bouton ci-dessous</h4>
<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("students.create")}}">Créer un élève</a>
@endif


@if (isset($module->promotions[0]))
<div class="row">
    <h2>Liste des promotions attribués au module</h2>
    @foreach ($module->promotions as $promotion)
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4" >
                    <img src="\images\promotion.jpg" alt="picture promotion" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 30px">{{$promotion->name}}</h5>
                        <p class="card-text"><strong> Specialitée : </strong>{{$promotion->speciality}}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $promotion->updated_at }}</small></p>
          
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<h3 class="text-danger">Il n'y a pas de promotions attribués au module.</h3>
<h4>Vous pouvez en créer en cliquant ci-dessous</h4>
<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("promotions.create")}}">Créer une promotion</a>
@endif




@endsection