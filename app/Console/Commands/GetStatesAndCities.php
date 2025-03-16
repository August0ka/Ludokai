<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\State;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Throwable;

class GetStatesAndCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-states-and-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get states and cities form IBGE API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {

            $states = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados')->json();
            $statesBar = $this->output->createProgressBar(count($states));

            $this->info('Salvando estados no banco de dados');

            $statesBar->start(2);
            foreach ($states as $state) {
                State::updateOrCreate(
                    [
                        'ibge_state_id' => $state['id']
                    ],
                    [
                        'ibge_state_id' => $state['id'],
                        'name' => $state['nome'],
                        'uf' => $state['sigla'],
                    ]
                );
                $statesBar->advance();
            }
            $statesBar->finish();
            $this->newLine(2);


            $cities = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/municipios')->json();
            $citiesBar = $this->output->createProgressBar(count($cities));

            $this->info('Salvando cidades no banco de dados');
            foreach ($cities as $city) {

                City::updateOrCreate(
                    [
                        'ibge_city_id' => $city['id']
                    ],
                    [
                        'ibge_city_id' => $city['id'],
                        'name' => $city['nome'],
                        'state_id' => $city['microrregiao']['mesorregiao']['UF']['id'],
                    ]
                );
                $citiesBar->advance();
            }

            $citiesBar->finish();

            $this->newLine(2);
            $this->info('Registros salvos com sucesso');
        } catch (Throwable $th) {
            $this->error($th->getMessage());
        }
    }
}
