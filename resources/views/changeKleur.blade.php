@extends("Master.masterDesign")

@section("content")
<div class = "row">
@foreach(array_rand($selectieKleuren, 4) as $code)
<form id = "kleurSelectie{{$code}}" action="updateKleur" method="post">
    @csrf
<input type="hidden" name="kleur" value = "{{$selectieKleuren[$code]}}">
</form>
<div class = "col-6" onclick="document.getElementById('kleurSelectie{{$code}}').submit();" style = "height: 500px; background-color:{{$selectieKleuren[$code]}};">
</div>
@endforeach
@if(count($user->kleuren) > 1)
<div style = "margin-top: -50px; margin-left: -50px; z-index: 0; position: absolute; top: 50%; left:50%; width: 100px; height: 100px;" class = "col-3">
<form id = "deleteKleur" action="deleteKleur" method="post">
@csrf
@method("DELETE")
</form>
    <i onclick="document.getElementById('deleteKleur').submit();" style = "font-size: 100px; color:black;" class="fa fa-trash-o fa-lg mt-5"></i></a>
</div>
</div>
@endif
@endsection