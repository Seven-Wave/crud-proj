@extends('layouts.app')

@section('content')
    @if (isset($user))
        <user-form user="{{ $user }}"/>
    @else
        <user-form />

    @endif
@endsection


