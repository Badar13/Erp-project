@extends('layout.master')
@section('page-tab')
    Create Mode Of Payment
@end-section
@section('content')
<div id="maincontainer">
  <section id="main" class="main" style="padding-top: 0vh;">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <section id="main" class="main" style="padding-top: 0vh;">
            <div class="pagetitle">
                <h1>Mode Of Payment</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> View</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('modeofpayment.store') }}" method="POST">        
      @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     </form>
        </div>
  </section>
</div>      

@endsection    