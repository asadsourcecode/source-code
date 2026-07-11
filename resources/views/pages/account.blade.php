@extends('layouts.app')

@section('title', 'My Account | ICE')

@section('content')
<div style="min-height:80vh;padding:60px 20px;background:#f0ecf8;">
    <div style="max-width:1060px;margin:0 auto;background:#fff;border-radius:16px;padding:48px 56px;">

        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:24px;">

            <!-- Left -->
            <div style="flex:1;min-width:260px;">
                <h1 style="font-family:'Raleway',sans-serif;font-size:2rem;font-weight:600;color:#111;margin:0 0 6px;">MY ACCOUNT</h1>
                <p style="font-family:'Raleway',sans-serif;font-size:1rem;font-weight:700;color:#333;margin:0 0 40px;">Order History</p>

                <p style="font-family:'Raleway',sans-serif;font-size:0.95rem;color:#111;margin:0 0 28px;">
                    You haven't placed any orders yet.
                </p>

                <p style="font-family:'Raleway',sans-serif;font-size:1rem;font-weight:600;color:#111;margin:0 0 8px;">Account Details</p>
                <p style="font-family:'Raleway',sans-serif;font-size:0.95rem;color:#333;margin:0 0 4px;">{{ $user->name }}</p>

                <div style="margin-top:28px;display:flex;flex-direction:column;gap:12px;align-items:flex-start;">
                    <a href="#"
                        style="background:#e8f0fe;color:#333;font-family:'Raleway',sans-serif;font-size:0.9rem;padding:10px 22px;border-radius:6px;text-decoration:none;border:1px solid #d0d8f0;">
                        View Addresses
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            style="background:#a8f58d;color:#111;font-family:'Raleway',sans-serif;font-size:0.9rem;font-weight:600;padding:10px 28px;border-radius:6px;border:none;cursor:pointer;">
                            Log out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right -->
            <div style="text-align:right;">
                <p style="font-family:'Raleway',sans-serif;font-size:1.1rem;color:#111;margin:0;">
                    Welcome: <strong>{{ $user->name }}</strong>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
