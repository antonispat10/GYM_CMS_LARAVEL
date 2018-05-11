
@extends('layouts.app')



@section('content')


    <canvas id="myChart" style=""></canvas>



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div>News</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('news')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View news</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">

                            <div>Profile & Weight</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('edit_profile_per_user',
                $user->id)
                            }}">

                    <div class="panel-footer">
                        <span class="pull-left">Edit Profile & Weight</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>

    <!-- /.panel-footer -->
    </div>
    <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [@foreach(array_reverse($dates) as $date)
                    "{{$date}}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Last 3 Weight Count',
                    data: [
                        @foreach(array_reverse($weights) as $weight)
                        {{$weight}},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jq.js') }}"></script>
    <script src="{{asset('js/libs.js')}}"></script>
    <script src="{{asset('js/libs/bootstrap.js')}}"></script>
    <script src="{{asset('js/libs/jquery.js')}}"></script>
    <script src="{{asset('js/libs/metisMenu.js')}}"></script>
    {{--<script src="{{asset('js/libs/sb-admin-2.js')}}"></script>--}}
    <script src="{{asset('js/libs/scripts.js')}}"></script>

    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>

@stop


