@extends('layouts.admin')

@section('content')
        {{ session('message') }}

        @if($users != null && count($users) > 0)
            <table class="table">
                <tr>
<<<<<<< Updated upstream
                    <th scope="col" class="center">Naam</th>
                    <th scope="col" class="center">Email</th>
                    <th scope="col" class="center">Telefoon</th>
                    <th scope="col" class="center">Pakket</th>
                    <th scope="col" class="center">Acties</th>
=======
>>>>>>> Stashed changes
                </tr>
            @foreach($users as $user)
           
                <tr>
<<<<<<< Updated upstream
                    <td class="center">{{ $user->name }} </td>
                    <td class="center">{{ $user->email }} </td>
                    <td class="center">{{ $user->phone }} </td>
                    <td class="center">{{ $user->packages_id }} </td>
=======
>>>>>>> Stashed changes
                    <td>

                        <a class="btn btn-primary right"  title="Bewerk" href="{{ route('user.edit', $user) }}"><i class="fa fa-pencil"></i></a>
                        <form method="POST" action="{{ route('user.destroy', $user) }}" class="right">
                            {{ method_field('DELETE') }}
                            @csrf
                            <button type="submit"  title="Verwijder" class="btn btn-danger"><i class="fa fa-trash" ></i></button>
                        </form>
                    
                    </td>
                </tr>
            
            @endforeach
            </table>
        @else
            <br>
            <div class="card">
                <div class="card-header">
                    Geen gebruikers gevonden
                </div> 
            </div>
        @endif
@endsection
