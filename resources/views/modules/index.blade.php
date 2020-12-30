@extends('layout.app')

@section('title')
Liste de tout les modules
@endsection


@section('content')

<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("modules.create")}}">Ajouter un Module</a>

<div class="row">
    @foreach ($modules as $module)
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images\module.png" alt="picture module" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $module->name}}</h5>
                        <p class="card-text"><strong> Description : </strong>{{ $module->description }}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $module->updated_at }}</small></p>


                        <form method="POST" action="{{route("modules.destroy", ["module" => $module])}}">
                            <a class="btn btn-info text-white" href="{{route('modules.show', ['module'=>$module])}}">Details</a>
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
    @endforeach
</div>
@endsection