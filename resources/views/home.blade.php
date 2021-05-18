@component('components.app')
@if(session()->has('message'))
<div class="alert alert-success font-bold color:green" >
    {{ session()->get('message') }}
</div>
@endif
@endcomponent