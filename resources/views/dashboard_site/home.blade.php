@extends('master_page.dashboard')

@section('dashboard_bar')
    Dashboard
@endsection
@section('dashboard_short_title')
    Welcome to Dashboard
@endsection

@section('main_content')

    <div class="container-fluid">

        <!-- start row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title mb-4">Doughnut Chart</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container -->

@endsection
@section('js_script_code')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Product_item', 'Category', 'Subcategory', 'Total Order'],
                datasets: [{
                    label: '# of Votes',
                    data: [{{$product_item}},{{$category}},{{$subcategory}},{{$order_summary}}],
                    backgroundColor: [
                        '#28a745',
                        '#dc3545',
                        '#6610f2',
                        '#fd7e14',
                    ],
                    borderColor: [
                        '#28a745',
                        '#dc3545',
                        '#6610f2',
                        '#fd7e14',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
