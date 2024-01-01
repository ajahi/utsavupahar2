@extends('layouts.frontend')
@section('page-content')
    @livewire('search-website', ['searchText' => $searchText])
@endsection