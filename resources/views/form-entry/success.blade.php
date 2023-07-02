@extends('layouts.app', ['activePage' => 'new-entry', 'titlePage' => __('Success Page')])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-header card-header-success">
                        <h3 class="text-center">Form Entry Successful</h3>
                    </div>
                    <div class="card-body">
                        <br>
                        <br>
                        <p font-size="15px;">Your form entry has been submitted successfully. Thank you for your submission!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        setTimeout(function() {
            window.location.href = '{{ route("admin.dashboard") }}'; // Replace with the desired URL
        }, 2000); // 10000 milliseconds = 10 seconds
        // createdSuccessfully();
        // Swal.fire({
        //     position: 'top-end',
        //     icon: 'success',
        //     title: 'Your work has been saved',
        //     showConfirmButton: false,
        //     timer: 15000
        // })
    let timerInterval
    Swal.fire({
        title: 'Redirecting!',
        html: 'Redirecting to Dashboard in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        })
    //     .then((result) => {
    //     /* Read more about handling dismissals below */
    //     // if (result.dismiss === Swal.DismissReason.timer) {
    //     //     // console.log('I was closed by the timer')
    //     // }
    // })
    
    </script>
@endsection
