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
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
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


            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Buyer</p>
                        <h4 class="mb-0">{{ $totalBuyer }}</h4>

                        @foreach ($buyerNumber as $data)
                            <h6 class="mb-0">
                                @if ($data->status)
                                    {{ $data->number }} Checked
                                @endif
                            </h6>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Cost</p>
                        <h4 class="mb-0">{{ number_format($totalCarPrice, 2) }} USD</h4>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Buy Order Statistic</h6>
                    <canvas id="salse-revenue-profit"></canvas>
                </div>
            </div>

            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Category Statistic</h6>
                    <canvas id="pie-chart-category"></canvas>
                </div>
            </div>




            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Brand Statistic</h6>
                    <canvas id="doughnut-chart-brand"></canvas>
                </div>
            </div>


            {{-- <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Car Brand Statistic</h6>
                    <canvas id="pie-chart-brand"></canvas>
                </div>
            </div> --}}



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
        // var ctx5 = $("#pie-chart-brand").get(0).getContext("2d");
        // var myChart5 = new Chart(ctx5, {
        //     type: "pie",
        //     data: {
        //         labels: @json($labelArrayBrand),
        //         datasets: [{
        //             backgroundColor: [
        //                 "rgba(235, 22, 22, .8)",
        //                 "rgba(235, 22, 22, .7)",
        //                 "rgba(235, 22, 22, .6)",
        //                 "rgba(235, 22, 22, .5)",
        //                 "rgba(235, 22, 22, .4)",
        //                 "rgba(235, 22, 22, .3)",
        //                 "rgba(235, 22, 22, .8)",
        //                 "rgba(235, 22, 22, .7)",
        //                 "rgba(235, 22, 22, .6)",
        //                 "rgba(235, 22, 22, .5)",
        //                 "rgba(235, 22, 22, .4)",
        //                 "rgba(235, 22, 22, .3)",
        //                 "rgba(235, 22, 22, .8)",
        //                 "rgba(235, 22, 22, .7)",
        //                 "rgba(235, 22, 22, .6)",
        //                 "rgba(235, 22, 22, .5)",
        //                 "rgba(235, 22, 22, .4)",
        //                 "rgba(235, 22, 22, .3)"
        //             ],
        //             data: @json($dataArrayBrand)
        //         }]
        //     },
        //     options: {
        //         responsive: true
        //     }
        // });
        var ctx6 = $("#doughnut-chart-brand").get(0).getContext("2d");
        var myChart6 = new Chart(ctx6, {
            type: "doughnut",
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

    <script>
        var ctx2 = $("#salse-revenue-profit").get(0).getContext("2d");
        var myChart2 = new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Cost",
                        data: @json($monthCost),
                        backgroundColor: "rgba(235, 22, 22, .7)",
                        fill: true
                    },
                    {
                        label: "Profit",
                        data: @json($monthProfit),
                        backgroundColor: "rgba(235, 22, 22, .5)",
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
