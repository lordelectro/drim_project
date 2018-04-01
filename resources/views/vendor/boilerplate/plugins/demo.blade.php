@extends('boilerplate::layout.index', [
    'title' => 'Matches',
    'subtitle' => 'Dashboard',
    'breadcrumb' => ['Plugins']]
)

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('boilerplate::plugins.demo.widget')
    </div>

</div>
@endsection
