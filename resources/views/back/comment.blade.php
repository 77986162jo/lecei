@extends('back.app')

@section('title', 'CEI - Commentaires')



@section('dashboard-header')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Commentaires</h4>
            </div>
        </div>
    </div>
</div>
@endsection


@section('dashboard-content')


<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body booking_card">
                <div class="table-responsive">
                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>ID Comentaire</th>
                                <th>Auteur</th>
                                <th>Article</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($comments as $comment)


                            <tr>
                                <td>ART-000{{ $comment->id }}</td>
                                <td><h2 class="table-avatar">
                                    <a
                                        href="profile.html"
                                        class="avatar avatar-sm mr-2"
                                        ><img
                                        class="avatar-img rounded-circle"
                                        src="{{ asset('back_auth/assets/img/logo.png') }}"
                                        alt="User Image"
                                    /></a>
                                    <a href="profile.html">{{ $comment->name }}</a>
                                </td>
                                <td>{{ $comment->article->title }}</td>
                                <td>{{ $comment->message }}</td>
                                <td>
                                    <small>
                                    <i>
                                        <span class="text-body">
                                            @if(isset($comment->created_at))
                                                {{ $comment->created_at->isoFormat('dddd, DD MMMM YYYY') }}
                                            @else
                                                {{ now()->isoFormat('dddd, DD MMMM YYYY') }}
                                            @endif
                                        </span>
                                    </i>
                                </small>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-pill bg-success inv-badge">
                                {{ $comment->isActive == 1 ? 'Activé' : 'Desactivé' }}
                                </span>
                            </td>
                                
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v ellipse_color"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        {{-- Un seul formulaire pour bloquer/débloquer --}}
                                        <form action="{{ $comment->isActive == 1 ? route('comment.update', $comment) : route('comment.unlock',$comment)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas {{ $comment->isActive ? 'fa-ban' : 'fa-check' }} m-r-5"></i>
                                                {{ $comment->isActive ? 'Bloquer' : 'Débloquer' }}
                                            </button>
                                        </form>
                            
                                        {{-- Formulaire pour supprimer --}}
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            
                            </tr>
                            @endforeach


                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection