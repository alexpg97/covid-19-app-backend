<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CovidControllerTest extends TestCase
{
    public function testGetInfoEndpoint()
    {
        $response = $this->get('/api/covid');

        $response->assertStatus(200)
            ->assertSee("Africa");
    }

    public function testGetContinentEndpoint()
    {
        $response = $this->get('/api/covid');

        $response->assertStatus(200)
            ->assertSee("Europe");
    }

    public function testPerContinentEndpoint()
    {
        $response = $this->get('/api/covid/perContinent/Europe');

        $response->assertOk()
            ->assertSee("Europe")
            ->assertJson([
                "continent" => true,
                "countries" => true
            ]);
    }

    public function testPerCountryEndpoint()
    {
        $response = $this->get('/api/covid/perCountry/Nicaragua');

        $response->assertOk()
            ->assertSee("Nicaragua")
            ->assertJson(["country" => true]);
    }
}
