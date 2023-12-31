@extends('layout.master')
@section('page-tab')
    Manage Chart of Account
@endsection
@section('content')
    @php
        use App\Helpers\FinanceHelper;
        $m = 2;
    @endphp
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
            <h1>Manage Chart of Account</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Manage Chart of Account</a></li>
                </ol>
            </nav>
        </div>
        <div style="background-color: lightgray;opacity: 0.9; height='20px'; ">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab"></a>
                </li>
            </ul>
        </div>
        <div style=" left:0px; top:170px;z-index: -1; width: 100%;">
            <div class="tab-content" id="myTabContent">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card-body">
                <table class="table table-border datatable " style="border: 1px solid black">
                    <thead>
                        <tr>
                            <th scope="col">Sys-ID</th>
                            {{-- <th scope="col">System ID</th> --}}
                            <th scope="col">Account Code</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Ref A/C Code</th>
                            <th scope="col">Account Category</th>
                            <th scope="col">Account Type</th>
                            <th scope="col">Transaction Type</th>
                            <th scope="col">System/Manaul</th>
                            <th scope="col">Current Balanace</th>
                            <th scope="col">Currency</th>
                            {{-- <th scope="col">Status</th> --}}
                            {{-- <th scope="col">Transaction Amount</th> --}}
                            {{-- <th scope="col">No of Transaction</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        @foreach ($coas as $key => $y)
                            <?php
                            $array = explode('-', $y->coacode);
                            $level = count($array);
                            $nature = $array[0];
                            ?>
                            <tr title="{{ $y->id }}"
                                @if ($y->type == 1) style="background-color:lightblue" @endif
                                @if ($y->type == 4) style="background-color:lightgray" @endif>
                                <td class="text-center">{{ $y->id }}</td>
                                <td>{{ '`' . $y->coacode }}</td>
                                <td>
                                    @if ($level == 1)
                                        <b style="font-size: large;font-weight: bolder">{{ strtoupper($y->coaname) }}</b>
                                    @elseif($level == 2)
                                        &emsp;&emsp; {{ $y->coaname }}
                                    @elseif($level == 3)
                                        &emsp;&emsp;&emsp;&emsp; {{ $y->coaname }}
                                    @elseif($level == 4)
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{ $y->coaname }}
                                    @elseif($level == 5)
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{ $y->coaname }}
                                    @elseif($level == 6)
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{ $y->coaname }}
                                    @elseif($level == 7)
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        {{ $y->coaname }}
                                    @endif
                                </td>
                                <td>{{ $y->refaccode }}</td>
                                <td>{{$y->accoutcategory->accountcategory}}</td>
                               @foreach ( $accountypes as $data )
                               <td>{{$data->typeaccount}}</td>
                               @endforeach
                        
                               <td>{{$y->Transactiontype}}</td>
                               <td></td>
                                <td>{{$y->System_Manual}}</td>
                                <td></td>
                                <td></td>
                                {{-- <td>@if ($y->is_active)
                                                                <p>Active</p>
                                                            @else
                                                                <p>InActive</p>
                                                            @endif
                                                        </td> --}}
                                {{-- <td class="text-right"><?php echo FinanceHelper::ChartOfAccountCurrentBalance($m, $level, $y->code); ?></td> --}}

                                <td>
                                    <a class="btn btn-info" href="">Show</a>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <a class="btn btn-danger" href="">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Recent Sales -->
        <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="/asset/vendor/chart.js/chart.umd.js"></script>
        <script src="/asset/vendor/echarts/echarts.min.js"></script>
        <script src="/asset/vendor/quill/quill.min.js"></script>
        <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
        <script src="/asset/vendor/php-email-form/validate.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="/asset/js/main.js"></script>
        <br><br>

    </section>


@endsection
