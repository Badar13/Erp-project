@extends('layout.master')
@section('page-tab')
    update Function
@endsection    
@section('content')

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
            <div class="pagetitle" style="margin-left: 20px;">
                <h1>Update Function</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Update Function</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('function.update',$function->id) }}" method="POST">           
              @csrf
              @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Function<span style="color:#DC3545">*</span></strong></strong>
                            <input type="text" name="function" id="function" class="form-control" value="{{$function->function}}" placeholder="Function" required>
                        </div>
                        <div class="form-group">
                            <strong>Function Code</strong>
                            <input type="text" name="function_code" id="function_code"  value="{{$function->function_code}}" class="form-control" placeholder="Function Code">
                        </div>
                        <div class="form-group">
                            <strong>Details</strong>
                            <input type="text" name="detail" id="detail"  value="{{$function->detail}}" class="form-control" placeholder="Detail">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{$function->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
                
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        
  </section> 

@endsection    