    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/misc.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
        Swal.fire(
            '',
            '{{ session('success') }}',
            'success'
        )
        </script>
    @endif
    

    @if (session('error'))
    <script>
    Swal.fire({
    icon: 'error',
    text: '{{ session('error') }}',
    })
    </script>
    @endif

    <script src="{{ asset('admin/js/chart.js') }}"></script>

    @if(isset($dataChartLabel) && isset($dataChartValue))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get data from the controller
            var dataChartLabel = @json($dataChartLabel);
            var dataChartValue = @json($dataChartValue);

            // Create a chart using Chart.js
            var ctx = document.getElementById('supplierPaymentChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dataChartLabel,
                    datasets: [{
                        label: 'Supplier Payments',
                        data: dataChartValue,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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
        });
    </script>
    @endif

    
