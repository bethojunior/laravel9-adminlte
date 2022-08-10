@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('success'))
    <div class="alert alert-default-success mt-2">
        <strong>
            {{ session('success') }}
        </strong>
        <i class="far fa-check-circle"></i>
    </div>
@endif


@if (session('error'))
    <div class="alert alert-default-danger mt-2">
        <strong>
            {{ session('error') }}
        </strong>
        <i class="fas fa-exclamation-triangle"></i>
    </div>
@endif
