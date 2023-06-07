@extends("layouts.master")

@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h3 mb-0 text-white lh-1">Ajout d'un Nouvel Etudiant</h1>
    </div>
  </div>
<div class="mt-4">
@if (Session::has("success"))
    <div class="alert alert-success">
    <h3>{{ Session::get("success") }}</h3>
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

<div class="d-flex justify-content-end mb-4">
    <div><a href="{{route('etudiant')}}"class="btn btn-primary">Retour à la liste</a></div> 
    </div>
    <form style="width:65%" method="post" action="{{route('etudiant.ajouter')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="firstName">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Nom</label>
    <input type="text" class="form-control" name="lastName">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Classe</label>
    <select class="form-control" name="classe_id">
        @foreach($classes as $classe) 
        <option value=""></option>
        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn btn-danger">Annuler</button>

</form>
</div>
</div>

@endsection
