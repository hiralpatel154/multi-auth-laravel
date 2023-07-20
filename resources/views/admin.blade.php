@extends('layouts.app')

@section('content')
<div >
    <div >
        <div >
            <div >
                <div >{{ __('Dashboard') }}</div>

                <div >
                    @if (session('status'))
                        <div  role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello Admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection