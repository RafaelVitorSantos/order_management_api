<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Policies\OrdemServicoPolicy;
use App\Policies\UsuarioPolicy;
use App\Policies\DocumentoPolicy;
use App\Policies\ApontamentoPolicy;

use App\Models\OrdemServico;
use App\Models\Usuario;
use App\Models\Documento;
use App\Models\Apontamento;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        OrdemServico::class => OrdemServicoPolicy::class,
        Usuario::class => UsuarioPolicy::class,
        Documento::class => DocumentoPolicy::class,
        Apontamento::class => ApontamentoPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
