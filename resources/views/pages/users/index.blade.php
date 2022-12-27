@php
/**
 * @var \Illuminate\Support\Collection<\App\Models\User> $data
 */
@endphp

@extends(config('view.layout'))

@section('content')
    <div class="mt-3">
        @include('pages.users.search_form')
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Email verified</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $counter => $user)
            <tr>
                <th scope="row">{{ ++$counter }}</th>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->getFullName() }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <input type="checkbox" disabled="disabled" {{ !$user->email_verified_at ?: 'checked'}}>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $paginator->appends(Request::all())->links() }}
@endsection
