@extends('layouts.main')
@section('content')
<div class="row h-100">
<div class="lft-sld-menu">
    @include('pageCustomization.leftmenuSlide.leftmenu')   
</div>
<div class="page-body-wppr">
    @include('pageCustomization.pageCustomizationBoday.pageCustomizationBoday')     
</div>
</div>
@endsection