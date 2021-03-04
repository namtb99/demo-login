@extends('layouts.app')

@section('content')
<link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">

<profile :profile="{{ $profile }}"></profile>
@endsection

@push('scripts')

@endpush
