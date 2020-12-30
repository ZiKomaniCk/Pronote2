@extends('layout.app')

@section('title')
Detail de l'etudiant
@endsection


@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="\images\profilePicture.png" alt="picture etudiant" style="max-width: 180px;">
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <h2 class="card-title">{{$student->lastname}} {{$student->firstname}}</h2>
                        <h4 class="card-text">Email : {{$student->email}}</h4>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $student->updated_at }}</small></p>
                        
                        
                        <form method="POST" action="{{route("students.destroy", ["student" => $student])}}">
                            <a class="btn btn-info text-white" href="{{route('students.index')}}"><i style="font-size: 25px" class="fas fa-long-arrow-alt-left"></i></a>
                            <a class="btn btn-primary" href="{{route('students.edit', ['student'=>$student])}}">Modifier</a>
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

@if (isset($student->promotion))
<div class="row">
    <h2>Liste des students attribués au module</h2>
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4" >
                    <img src="\images\promotion.jpg" alt="picture promotion" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 30px">{{$student->promotion->name}}</h5>
                        <p class="card-text"><strong> Specialitée : </strong>{{$student->promotion->speciality}}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $student->promotion->updated_at }}</small></p>
          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h3 class="text-danger">Il n'y a pas de promotions attribués a l'étudiant.</h3>
<h4>Vous pouvez en créer une en cliquant ci-dessous</h4>
<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("promotions.create")}}">Créer une promotion</a>
@endif


@if (isset($student->modules[0]))
<div class="row">
    <h2>Liste des modules attribués a l'étudiant</h2>
    @foreach ($student->modules as $module)
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4" >
                    <img src="\images\module.png" alt="picture promotion" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 30px">{{$module->name}}</h5>
                        <p class="card-text"><strong> Description : </strong>{{$module->description}}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $module->updated_at }}</small></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<h3 class="text-danger">Il n'y a pas de modules attribués a l'étudiant.</h3>
<h4>Vous pouvez en créer un en cliquant ci-dessous</h4>
<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("modules.create")}}">Créer un module</a>
@endif


@endsection