<?php

namespace App\Policies;

use App\Models\Apontamento;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApontamentoPolicy
{
    use HandlesAuthorization;

    public function viewAny(Usuario $usuario)
    {
        return ($usuario->usu_master
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function view(Usuario $usuario, Apontamento $apontamento)
    {
        return (($usuario->usu_master
            || $usuario->usu_pes_id === $apontamento->apo_pes_id)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function create(Usuario $usuario)
    {
        return ($usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function update(Usuario $usuario, Apontamento $apontamento)
    {
        return (($usuario->usu_master
            || $usuario->usu_pes_id === $apontamento->apo_pes_id)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function delete(Usuario $usuario, Apontamento $apontamento)
    {
        return (($usuario->usu_master
            || $usuario->usu_pes_id === $apontamento->apo_pes_id)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function restore(Usuario $usuario, Apontamento $apontamento)
    {
        return (($usuario->usu_master
            || $usuario->usu_pes_id === $apontamento->apo_pes_id)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function forceDelete(Usuario $usuario, Apontamento $apontamento)
    {
        return (($usuario->usu_master
            || $usuario->usu_pes_id === $apontamento->apo_pes_id)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }
}
