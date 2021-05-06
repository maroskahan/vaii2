@extends('layouts.admin')
@section('content')
        <h1>Vitajte, {{ Auth::user()->name }}!</h1>
        <h3>Toto je úvodná stránka administrácie.</h3>
@endsection
