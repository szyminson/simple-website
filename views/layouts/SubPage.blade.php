@extends('layouts.ExampleLayout')
@section('title')
{{ $Title }}
@endsection
@section('content')

</div>
<div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        {!! $Content !!}
      </div>
    </div>
  </div>
@endsection