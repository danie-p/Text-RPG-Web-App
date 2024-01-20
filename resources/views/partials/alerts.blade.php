@if($errors->any())
    <div class="alert alert-error alert-dismissible fade show" role="alert">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(isset($successMessage))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p >{{ $successMessage }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
