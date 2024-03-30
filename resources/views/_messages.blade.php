
<style>
    /* Alert messages */
.alert {
    padding: 15px;
    border: 1px solid transparent;
    border-radius: 4px;
    margin-bottom: 20px;
}

/* Success alert */
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

/* Error alert */
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

</style>

@if(session('success'))
    <div class="alert alert-success">
        <span class="alert-text">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        <span class="alert-text">{{ session('error') }}</span>
    </div>
@endif
