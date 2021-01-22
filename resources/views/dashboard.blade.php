@extends("Master.masterDesign")

@section("content")
<hr style="width:100%", height="3px", color=black>
<div class = "row">
<div class = "col-6 offset-3">
<h1>Gebruikers</h1>
<ul class = "list-group">
@foreach($users as $user)
<div class = "row">
<li class = "list-group-item col-1 mb-1">
{{$user->id}}
</li>
<div class = col-1>
<a href="/{{$user->id}}/addKleur" class ="btn btn-dark mt-2">+</a>
</div>
</div>
<ul class = "list-group">
@foreach($user->kleuren as $kleur)
<div class = "row">
<a href="{{$kleur->id}}/changeKleur">
<li style = "background-color: {{$kleur->kleur}}" class="list-group-item col-1 mb-1"></li>
</a>
</div>
@endforeach
</ul>
</li>
@endforeach
</ul>
</div>
</div>

@endsection