@component('components.app')
<p style="position: relative;top: 81px;text-align: center;font-size: 32px;width: fit-content;left: 230px;">Welcome to the Admin links!</p>
@if(session()->has('message'))
<div class="alert alert-success font-bold color:green" >
    {{ session()->get('message') }}
</div>
@endif
@endcomponent