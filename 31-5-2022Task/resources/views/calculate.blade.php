@extends("master")
@section("content")
<div class="container">
  <h2>Calculater form</h2>
  <form action="" method="get">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="email">Number 1:</label>
      <input type="number" class="form-control" id="email"  name="firstnumber">
    </div>
    <div class="form-group">
      <label for="pwd">Number 2:</label>
      <input type="number" class="form-control" id="pwd"  name="secoundnumber">
    </div><br>
    <select name = "operator">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>
    <button type="submit" class="btn btn-default" name="btn">Enter</button>

    <div>result : {{$result}}</div>

  </form>
</div>

@endsection