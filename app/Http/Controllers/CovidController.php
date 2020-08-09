<?php

namespace App\Http\Controllers;

use App\Http\Services\CovidService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CovidController extends Controller
{
    protected $covidService;

    public function __construct()
    {
        $this->covidService = new CovidService();
    }

    public function getInfo()
    {
        $result = $this->covidService->getInfo();
        return response()->json($result, 200);
    }

    public function getContinents()
    {
        $result = $this->covidService->getContinents();
        return response()->json($result, 200);
    }

    public function getPerContinent(string $continent)
    {
        $continent = trim($continent);
        $result = $this->covidService->getByContinent($continent);
        if ($result) {
            return response()->json($result, 200);
        }
        return response()->json(['message' => 'Could not find the continent, please try again'], Response::HTTP_BAD_REQUEST);
    }

    public function getByCountry($country = null)
    {
        $result = $this->covidService->getByCountry($country);
        if ($result) {
            return response()->json($result, 200);
        }
        return response()->json(['message' => 'Could not find the country, please try again'], Response::HTTP_BAD_REQUEST);
    }
}
