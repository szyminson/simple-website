@extends('layouts.testLayout')
@section('title')
{{ $title }}
@endsection
@section('content')
<div style="margin-left: 40px">
<?php $pages->load($pageId) ?>
</div>
@endsection