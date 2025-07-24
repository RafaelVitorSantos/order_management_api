<?php

namespace App\Policies;

use App\Models\OrdemServico;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrdemServicoPolicy
{
    use HandlesAuthorization;

    public function viewAny(Usuario $usuario)
    {
        return (
            $usuario->usu_master
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function view(Usuario $usuario, OrdemServico $ordemServico)
    {
        return (
            ($usuario->usu_master
                || $usuario->usu_pes_id === $ordemServico->os_pes_idresp)
            && $usuario->usu_status === 'A'
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

    public function update(Usuario $usuario, OrdemServico $ordemServico)
    {
        return (
            ($usuario->usu_master
                || $usuario->usu_pes_id === $ordemServico->os_pes_idresp)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function delete(Usuario $usuario, OrdemServico $ordemServico)
    {
        return (
            ($usuario->usu_master
                || $usuario->usu_pes_id === $ordemServico->os_pes_idresp)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function restore(Usuario $usuario, OrdemServico $ordemServico)
    {
        return (
            ($usuario->usu_master
                || $usuario->usu_pes_id === $ordemServico->os_pes_idresp)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }

    public function forceDelete(Usuario $usuario, OrdemServico $ordemServico)
    {
        return (
            ($usuario->usu_master
                || $usuario->usu_pes_id === $ordemServico->os_pes_idresp)
            && $usuario->usu_status === 'A'
            && $usuario->usu_validadesenha->isFuture()
        );
    }
}
