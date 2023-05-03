@extends('layouts.secondmenu')
@extends('layouts.basic_page_without_footer')
@section('title',"my area")
@section('content')
@include('layouts.header',[
    'item1'=> 'edit profile',
    'item2'=> 'my area',
    'item3'=> 'principal page',
    'item4'=> 'logout',
    'bg' =>'bg-dark',
    'ref1'=>route('edituser'),
    'ref2'=>route('myarea'),
    'ref3'=>route('home'),
    'ref4'=> route('logout') ])

<section id="contenido">
    @section('boxtittle','curriculum')
    @section('boxes')


     <div class="row justify-content-evenly">
         @include('layouts.boxsecondmenu',[
            'img'=> 'img/logocurriculum2.png',
            'tittlebox1' => 'curriculum',
            'textbox1' => 'edit your  resume',
            'zise' => 'width: 62%; margin-bottom: 8%;',
            'url' => route('login')
            ])
                    @include('layouts.boxsecondmenu',[
                        'img'=> 'img/logocurriculum.png',
                        'tittlebox1' => 'upload',
                        'textbox1' => 'upload your resume',
                        'zise' => "width: 40%; margin-bottom: 10%;",
                        'url' => route('uploadcurriculum')
                        ])

     </div>

</section>
@endsection
@endsection
