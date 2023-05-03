@extends('layouts.basic_page_without_footer')
@section('title',"editprofile")
@section('content')
@include('layouts.header',[
    'item1'=> 'edit profile',
    'item2'=> 'My area',
    'item3'=> 'principal page',
    'item4'=> 'logout',
    'bg' =>'bg-dark',
    'ref3'=>route('home'),
    'ref1'=>route('edituser'),
    'ref2'=>route('myarea'),
    'ref3'=>route('home'),
    'ref4'=> route('logout') ])
    <section id="contenido">
    @include('layouts.editprofile')
</section>
@endsection
