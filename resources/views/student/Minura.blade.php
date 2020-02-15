@extends('layouts.app')

@section('title')
Minura
@endsection

@section('content')
<div class="container p-3 my-3 bg-primary text-white">
<h1>Minura Pabasara</h1>
<p>Rahula college Matara</p>

<div class="containeer">
<form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>


</div>