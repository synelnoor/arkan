<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTokoAPIRequest;
use App\Http\Requests\API\UpdateTokoAPIRequest;
use App\Models\Toko;
use App\Repositories\TokoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TokoController
 * @package App\Http\Controllers\API
 */

class TokoAPIController extends AppBaseController
{
    /** @var  TokoRepository */
    private $tokoRepository;

    public function __construct(TokoRepository $tokoRepo)
    {
        $this->tokoRepository = $tokoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tokos",
     *      summary="Get a listing of the Tokos.",
     *      tags={"Toko"},
     *      description="Get all Tokos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Toko")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->tokoRepository->pushCriteria(new RequestCriteria($request));
        $this->tokoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tokos = $this->tokoRepository->all();

        return $this->sendResponse($tokos->toArray(), 'Tokos retrieved successfully');
    }

    /**
     * @param CreateTokoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tokos",
     *      summary="Store a newly created Toko in storage",
     *      tags={"Toko"},
     *      description="Store Toko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Toko that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Toko")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Toko"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTokoAPIRequest $request)
    {
        $input = $request->all();

        $tokos = $this->tokoRepository->create($input);

        return $this->sendResponse($tokos->toArray(), 'Toko saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tokos/{id}",
     *      summary="Display the specified Toko",
     *      tags={"Toko"},
     *      description="Get Toko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Toko",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Toko"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Toko $toko */
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            return $this->sendError('Toko not found');
        }

        return $this->sendResponse($toko->toArray(), 'Toko retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTokoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tokos/{id}",
     *      summary="Update the specified Toko in storage",
     *      tags={"Toko"},
     *      description="Update Toko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Toko",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Toko that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Toko")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Toko"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTokoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Toko $toko */
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            return $this->sendError('Toko not found');
        }

        $toko = $this->tokoRepository->update($input, $id);

        return $this->sendResponse($toko->toArray(), 'Toko updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tokos/{id}",
     *      summary="Remove the specified Toko from storage",
     *      tags={"Toko"},
     *      description="Delete Toko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Toko",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Toko $toko */
        $toko = $this->tokoRepository->findWithoutFail($id);

        if (empty($toko)) {
            return $this->sendError('Toko not found');
        }

        $toko->delete();

        return $this->sendResponse($id, 'Toko deleted successfully');
    }
}
