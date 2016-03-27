@extends('manager.init')

@section('css')
<title>ECARD後台 - 環境設定</title>
  {!!Html::style('assets/css/manager/upload.css')!!}
  {!!Html::style('assets/css/manager/modal.css')!!}
@stop

@section('js')
<script src="{{url('assets/js/manager/env.js')}}"></script>
@stop

@section('content')
  @include('manager.header')

  <div class="row">
      <div class="col-sm-1 col-md-1 col-lg-1"></div><!-- space -->
      <div class="col-sm-3 col-md-3 col-lg-3">
          <h3>NavBar 設定</h3>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-1 col-md-1 col-lg-1"></div><!-- space -->
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <button id="createNavbarBtn" class="btn btn-primary">新增</button>
          <select id="parent" class="form-control"></select>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="navbar">
      </div>
  </div>
@stop
