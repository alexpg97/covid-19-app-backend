<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Covid19 App OpenApi Documentation",
     *      description="Swagger OpenApi description",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Local API Server"
     * )
     *
     * @OA\Tag(
     *     name="Covid",
     *     description="API Endpoints of Covid Info"
     * )
     */

    /**
     * @OA\SecurityScheme(
     *     @OA\Flow(
     *         flow="clientCredentials",
     *         tokenUrl="oauth/token",
     *         scopes={}
     *     ),
     *     securityScheme="bearerAuth",
     *     in="header",
     *     type="http",
     *     description="Oauth2 security",
     *     name="oauth2",
     *     scheme="bearer",
     *    bearerFormat="JWT",
     * )
     */
}
