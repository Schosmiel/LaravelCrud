@extends("layouts.master")

@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h3 mb-0 text-white lh-1">Getion des Etudiants</h1>
    </div>
  </div>
<div class="mt-4">
    <div class="d-flex justify-content-between mb-2">
    {{$etudiants->links()}}
    <div><a href="{{route('etudiant.create')}}"class="btn btn-primary">Ajouter un etudiant</a></div> 
    </div>

    @if (Session::has("successDelete"))
    <div class="alert alert-success">
    <h3>{{ Session::get("successDelete") }}</h3>
    </div>
    @endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Classe</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    @foreach($etudiants as $etudiant)
    <tr>
      <th scope="row">{{ $loop->index +1}}</th>
      <td>{{ $etudiant-> firstName}}</td>
      <td>{{ $etudiant-> lastName}}</td>
      <td>{{ $etudiant->classe->libelle}}</td>
      <td>
        <a href="{{route('etudiant.update', ['etudiant'=>$etudiant->id])}}"class="btn btn-info">Edit</a>
        <a href="#"class="btn btn-danger" onclick="if(confirm('Voulez vous supprimez cet etudiant')){document.getElementById('form-{{$etudiant->id}}').submit()}">Delete</a>
        <form id="form-{{$etudiant->id}}" action="{{route('etudiant.supprimer', ['etudiant'=>$etudiant->id])}}" method="post">
          @csrf 
          <input type="hidden" name="_method" value="delete">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

</div>

@endsection
