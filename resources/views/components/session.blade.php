@if(Session::has('danger'))
<div class="alert alert-danger">
    <ul class="list-unstyled">
        <li>{{ Session::get('danger') }}</li>
    </ul>
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success">
    <ul class="list-unstyled">
        <li>{{ Session::get('success') }}</li>
    </ul>
</div>
@endif