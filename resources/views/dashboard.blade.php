@extends('layouts.master')
@section('title', 'dashboard')
@section('content')
    <div class="row">
        <div class="col-6 border">
            <div>
                <canvas id="gender"></canvas>
            </div>
        </div>
        <div class="col-6 border">
            <div>
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <div class="col-6 border mt-5">
            <div>
                <canvas id="myChart3"></canvas>
            </div>
        </div>
        <div class="col-6 border mt-5">
            <div>
                <canvas id="income"></canvas>
            </div>
        </div>
    </div>

    <script>
        $.ajax({
            url: '/dashboard/genderBasedGraph',
            type: 'GET',
            success: function(data) {
                console.log(data);
                // Call the function to create the chart with the received data
                createChart(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        function createChart(data) {
            const ctx = document.getElementById('gender');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['male', 'female'],
                    datasets: [{
                        label: 'Gender Distribution',
                        data: [data.male, data.female],
                        borderWidth: 1,
                        backgroundColor: 'blue'

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1 // Increase the y-axis scale by 2
                            }
                        }]
                    }
                },
            });
        }
        // DOB based distribution
        $.ajax({
            url: '/dashboard/DOBBasedGraph',
            type: 'GET',
            success: function(data) {
                console.log(data);
                // Call the function to create the chart with the received data
                generateAgeBasisGraph(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        function generateAgeBasisGraph(data) {
            const ctx = document.getElementById('myChart2');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['<18', '19-24', '25-39', '40-59', '>60'],
                    datasets: [{
                            label: 'Male Citizen Distribution',
                            data: [data.m_data_1, data.m_data_2, data.m_data_3, data.m_data_4, data.m_data_5],
                            borderWidth: 1,
                            backgroundColor: 'blue'

                        },
                        {
                            label: 'Female Citizen Distribution',
                            data: [data.f_data_1, data.f_data_2, data.f_data_3, data.f_data_4, data.f_data_5],
                            borderWidth: 1,
                            backgroundColor: 'yellow'

                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1 // Increase the y-axis scale by 2
                            }
                        }]
                    }
                },
            });
        }
        // Monthly basis Graph
        $.ajax({
            url: '/dashboard/generateMonthlyGraph',
            type: 'GET',
            success: function(data) {
                console.log(data);
                // Call the function to create the chart with the received data
                generateMonthlyGraph(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        function generateMonthlyGraph(data) {
            const ctx = document.getElementById('myChart3');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Monthly Booking Distribution',
                        data: [data.January, data.February, data.March, data.April, data.May, data.June,
                            data.July,
                            data.August, data.September, data.October, data.November, data.December
                        ],
                        borderWidth: 1,
                        backgroundColor: 'blue'

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1 // Increase the y-axis scale by 2
                            }
                        }]
                    }
                },
            });
        }
        
         // Revenue Daata
         $.ajax({
            url: '/dashboard/generateRevenueGraph',
            type: 'GET',
            success: function(data) {
                console.log(data);
                // Call the function to create the chart with the received data
                generatRevenueGraph(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

        function generatRevenueGraph(data) {
            const ctx = document.getElementById('income');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Income',
                        data: [data.January, data.February, data.March, data.April, data.May, data.June,
                            data.July,
                            data.August, data.September, data.October, data.November, data.December
                        ],
                        borderWidth: 1,
                        backgroundColor: 'blue'

                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1000 // Increase the y-axis scale by 2
                            }
                        }],
                    }
                },
            });
        }
    </script>


@endsection
