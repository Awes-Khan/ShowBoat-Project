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
                        <p font-size="15px;">Your form entry has been submitted successfully. Thank you for your submission!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = '{{ route('form-entry.create') }}';
        }, 2000);
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
    </script>
@endsection
