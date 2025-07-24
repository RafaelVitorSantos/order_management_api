<?php

namespace App\Policies;

use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    public function viewAny(Usuario $usuarioAutenticado)
    {
        return (
            $usuarioAutenticado->usu_master
            && $usuarioAutenticado->usu_validadesenha->isFuture()
            && $usuarioAutenticado->usu_status === 'A'
        );
    }

    public function view(Usuario $usuarioAutenticado, Usuario $usuarioAlvo)
    {
        return (
            ($usuarioAutenticado->usu_master
                && $usuarioAutenticado->usu_validadesenha->isFuture()
                && $usuarioAutenticado->usu_status === 'A'
            ) || ($usuarioAutenticado->usu_pes_id === $usuarioAlvo->usu_pes_id)
        );
    }

    public function create(Usuario $usuarioAutenticado)
    {
        return (
            $usuarioAutenticado->usu_master
            && $usuarioAutenticado->usu_validadesenha->isFuture()
            && $usuarioAutenticado->usu_status === 'A'
        );
    }

    public function update(Usuario $usuarioAutenticado, Usuario $usuarioAlvo)
    {
        return (
            $usuarioAutenticado->usu_master
            && $usuarioAutenticado->usu_validadesenha->isFuture()
            && $usuarioAutenticado->usu_status === 'A'
        );
    }

    public function delete(Usuario $usuarioAutenticado, Usuario $usuarioAlvo)
    {
        return (
            $usuarioAutenticado->usu_master
            && $usuarioAutenticado->usu_validadesenha->isFuture()
            && $usuarioAutenticado->usu_status === 'A'
        );
    }

    public function restore(Usuario $usuarioAutenticado, Usuario $usuarioAlvo)
    {
        return (
            $usuarioAutenticado->usu_master
            && $usuarioAutenticado->usu_validadesenha->isFuture()
            && $usuarioAutenticado->usu_status === 'A'
        );
    }

    public function forceDelete(Usuario $usuarioAutenticado, Usuario $usuarioAlvo)
    {
        return (
            $usuarioAutenticado->usu_master
            && $usuarioAutenticado->usu_validadesenha->isFuture()
            && $usuarioAutenticado->usu_status === 'A'
        );
    }
}
