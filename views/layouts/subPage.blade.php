@extends('layouts.testLayout')
@section('title')
{{ $title }}
@endsection
@section('content')
<div style="margin-left: 20px">
{!! $content !!}
</div>
@endsection