@extends('layout.app')

@section('title')
Liste de toutes les promotions
@endsection


@section('content')

<a class="btn btn-primary col-sm-4" style="margin-bottom: 2%" href="{{route("promotions.create")}}">Ajouter une promotion</a>

<div class="row">
    @foreach ($promotions as $promotion)
    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4" >
                    <img src="images\promotion.jpg" alt="picture promotion" style="max-width: 180px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 30px">{{$promotion->name}}</h5>
                        <p class="card-text"><strong> Specialitée : </strong>{{$promotion->speciality}}</p>
                        <p class="card-text"><small class="text-muted">Dernière mise a jour: {{ $promotion->updated_at }}</small></p>

                        <form method="POST" action="{{route("promotions.destroy", ["promotion" => $promotion])}}">
                            <a class="btn btn-info text-white" href="{{route('promotions.show', ['promotion'=>$promotion])}}">Details</a>
                            <a class="btn btn-primary" href="{{route('promotions.edit', ['promotion'=>$promotion])}}">Modifier</a>
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