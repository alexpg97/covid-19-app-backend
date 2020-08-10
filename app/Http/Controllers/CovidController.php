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

    /**
     * @OA\Get(
     *      path="/covid",
     *      operationId="getInfo",
     *      description="Get general covid info",
     *      tags={"Covid"},
     *      summary="Get continents covid info",
     *      description="Get Covid19 general info",
     *      security={
     *         {"bearerAuth": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent
     *       ),
     * )
     */
    public function getInfo()
    {
        $result = $this->covidService->getInfo();
        return response()->json($result, 200);
    }

    /**
     * @OA\Get(
     *      path="/covid/getContinents",
     *      operationId="getContinents",
     *      description="Get continents covid info",
     *      tags={"Covid"},
     *      summary="Get continents covid info",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent
     *       ),
     * )
     */
    public function getContinents()
    {
        $result = $this->covidService->getContinents();
        return response()->json($result, 200);
    }

    /**
     * @OA\Get(
     *      path="/covid/perContinent/{continent}",
     *      operationId="getPerContinent",
     *      description="Get countries info per continent",
     *      tags={"Covid"},
     *      summary="Get countries info per continent",
     *      description="",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent
     *       ),
     * )
     */
    public function getPerContinent(string $continent)
    {
        $continent = trim($continent);
        $result = $this->covidService->getByContinent($continent);
        if ($result) {
            return response()->json($result, 200);
        }
        return response()->json(['message' => 'Could not find the continent, please try again'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @OA\Get(
     *      path="/covid/perCountry/{country}",
     *      operationId="getByCountry",
     *      description="Get info per country",
     *      tags={"Covid"},
     *      summary="Get info per country",
     *      description="",
     *      @OA\Parameter(
     *          name="country",
     *          description="Country name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent
     *       ),
     * )
     */
    public function getByCountry($country = null)
    {
        $result = $this->covidService->getByCountry($country);
        if ($result) {
            return response()->json($result, 200);
        }
        return response()->json(['message' => 'Could not find the country, please try again'], Response::HTTP_BAD_REQUEST);
    }
}
