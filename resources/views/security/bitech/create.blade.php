@php
    use App\Helpers\MasterFormsHelper;
    $master = new MasterFormsHelper();
@endphp
@extends('layouts.master')
@section('title', 'Add User')
@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD NEW USER</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.store') }}" id="subm" class="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Full Name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Type</label>
                                        <select onchange="get_distributor()" name="user_type" id="user_type"
                                            class="form-control">
                                            @foreach (MasterFormsHelper::userType() as $key => $userType)
                                                <option value="{{ $userType->id }}">{{ $userType->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control reset"
                                            placeholder="Enter Email" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="*********" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role</label>
                                       <select class="form-control" name="role" id="role">
                                        <option value="">select</option>
                                        @foreach ( $master->get_all_role() as $key =>$row )
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                       </select>
                                    </div>
                                </div>

                                <div style="display: none" class="col-md-12 form-check sperater2">
                                    <strong>Permissions</strong>
                                    <div class="row padl">
                                        @foreach ($master->getAllPermissionList() as $mainModule)
                                            {{-- @dd($mainModule); --}}
                                            <div class="col-md-12">
                                                <input class="form-check-input" type="checkbox"
                                                    id="{{ $mainModule['main_module'] }}" onclick="checkboxChecked(this)">
                                                <strong>{{ $mainModule['main_module'] }}</strong>


                                            </div>
                                            @foreach ($mainModule['permissions'] as $id => $permission)
                                                {{-- @dd($id); --}}
                                                    <div class="col-md-3 form-check padtbh">
                                                        <input class="form-check-input {{ $mainModule['main_module'] }}"
                                                            value="{{ $id }}" type="checkbox"
                                                            id="permissions{{ $id }}" name="permissions[]">
                                                        <label class="form-check-label"
                                                            for="permissions{{ $id }}">{{ $permission }}</label>
                                                    </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 form-check sperater">
                                    <strong>Distributor</strong>
                                    <div class="row">
                                        @foreach ($master->get_all_distributors() as $key => $row)
                                            <div class="col-md-3 form-check">
                                                <div class="form-check padtbh">
                                                    <input class="form-check-input" value="{{ $row->id }}"
                                                        type="checkbox" id="distributor{{ $row->id }}"
                                                        name="distributor[]">
                                                    <label class="form-check-label"
                                                        for="distributor{{ $row->id }}">{{ $row->distributor_name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>



                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Create User</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Floating Label Form section end -->

@endsection

@section('script')

    <script>
        function checkboxChecked(id) {
            // alert(id.id);
            // $('#select-all').click(function(event) {
                if (id.checked) {
                    // Iterate each checkbox
                    $('.'+id.id).each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.'+id.id).each(function() {
                        this.checked = false;
                    });
                }
            // });
        }

        function get_distributor() {
            var user_type = $('#user_type').val();
            if (user_type != 5) {
                return;
            }

            $.ajax({
                type: "get",
                url: '{{ url('distributor/get_distributor') }}',
                data: {
                    user_type: user_type
                },
                async: true,
                cache: false,
                success: function(data) {
                    $('#data').html(data);

                }
            });
        }
    </script>
@endsection
