@extends('layout.app')

@section('title')
Liste de tout les élèves 
@endsection


@section('content')

<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("students.create")}}">Ajouter un élève</a>

<div class="row">
    @foreach ($students as $student)
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images\profilePicture.png" alt="picture profile" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->lastname }} {{ $student->firstname}}</h5>
                        <p class="card-text">Promo: {{ $student->promotion->name }}</p>
                        <p class="card-text">Email: {{ $student->email }}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $student->updated_at }}</small></p>
                        
                        <form method="POST" action="{{route("students.destroy", ["student" => $student])}}">
                            <a class="btn btn-info text-white" href="{{route('students.show', ['student'=>$student])}}">Details</a>
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
    @endforeach
</div>
@endsection