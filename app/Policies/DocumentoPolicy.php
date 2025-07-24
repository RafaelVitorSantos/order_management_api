<?php

namespace App\Policies;

use App\Models\Documento;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentoPolicy
{
    use HandlesAuthorization;

    public function viewAny(Usuario $usuario)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function view(Usuario $usuario, Documento $documento)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function create(Usuario $usuario)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function update(Usuario $usuario, Documento $documento)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function delete(Usuario $usuario, Documento $documento)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function restore(Usuario $usuario, Documento $documento)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function forceDelete(Usuario $usuario, Documento $documento)
    {
        return (
            $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }
}
