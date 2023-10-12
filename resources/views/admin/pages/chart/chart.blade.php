@extends('admin/layout/master')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Users</p>
                        <h4 class="mb-0">{{ $totalAcc }}</h4>

                        @foreach ($accountNumber as $data)
                            <h6 class="mb-0">
                                @if ($data->status)
                                    {{ $data->number }} Active
                                @endif
                            </h6>
                        @endforeach
                    </div>
                </div>
            </div>





            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Cars</p>
                        <h4 class="mb-0">{{ $totalCar }}</h4>
                        @foreach ($carNumber as $data)
                            <h6 class="mb-0">
                                @if ($data->status)
                                    {{ $data->number }} Available
                                @endif
                            </h6>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- 

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sale</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
--}}

            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Category Statistic</h6>
                    <canvas id="pie-chart-category"></canvas>
                </div>
            </div>


            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Brand Statistic</h6>
                    <canvas id="pie-chart-brand"></canvas>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js-custom')
    <script>
        var ctx5 = $("#pie-chart-category").get(0).getContext("2d");
        var myChart5 = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: @json($labelArrayCategory),
                datasets: [{
                    backgroundColor: [
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)"
                    ],
                    data: @json($dataArrayCategory)
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <script>
        var ctx5 = $("#pie-chart-brand").get(0).getContext("2d");
        var myChart5 = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: @json($labelArrayBrand),
                datasets: [{
                    backgroundColor: [
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)",
                        "rgba(235, 22, 22, .8)",
                        "rgba(235, 22, 22, .7)",
                        "rgba(235, 22, 22, .6)",
                        "rgba(235, 22, 22, .5)",
                        "rgba(235, 22, 22, .4)",
                        "rgba(235, 22, 22, .3)"
                    ],
                    data: @json($dataArrayBrand)
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
