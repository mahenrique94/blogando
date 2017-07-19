<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PopulandoTabelaAdmPermissao::class);
        $this->call(PopulandoTabelaAdmTipoacesso::class);
        $this->call(PopulandoTabelaAdmGrupo::class);
        $this->call(PopulandoTabelaBlog::class);
        $this->call(PopulandoTabelaBlogNewsletterparametros::class);
        $this->call(PopulandoTabelaBlogTipoParametros::class);
        $this->call(PopulandoTabelaCadCategoria::class);
        $this->call(PopulandoTabelaCadTipoFormato::class);
        $this->call(PopulandoTabelaCadFormato::class);
        $this->call(PopulandoTabelaCadRedeSocial::class);
        $this->call(PopulandoTabelaPostSituacao::class);
        $this->call(PopulandoTabelaPostTipoCompartilhamento::class);
        $this->call(PopulandoTabelaPostTipoVisualizacao::class);
        $this->call(PopulandoTabelaBlogParametros::class);
        $this->call(PopulandoTabelaPostAutor::class);
        $this->call(PopulandoTabelaPostAutorParametros::class);
    }
}
