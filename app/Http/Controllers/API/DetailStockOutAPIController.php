<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailStockOutAPIRequest;
use App\Http\Requests\API\UpdateDetailStockOutAPIRequest;
use App\Models\DetailStockOut;
use App\Repositories\DetailStockOutRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetailStockOutController
 * @package App\Http\Controllers\API
 */

class DetailStockOutAPIController extends AppBaseController
{
    /** @var  DetailStockOutRepository */
    private $detailStockOutRepository;

    public function __construct(DetailStockOutRepository $detailStockOutRepo)
    {
        $this->detailStockOutRepository = $detailStockOutRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/detailStockOuts",
     *      summary="Get a listing of the DetailStockOuts.",
     *      tags={"DetailStockOut"},
     *      description="Get all DetailStockOuts",
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
     *                  @SWG\Items(ref="#/definitions/DetailStockOut")
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
        $this->detailStockOutRepository->pushCriteria(new RequestCriteria($request));
        $this->detailStockOutRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detailStockOuts = $this->detailStockOutRepository->all();

        return $this->sendResponse($detailStockOuts->toArray(), 'Detail Stock Outs retrieved successfully');
    }

    /**
     * @param CreateDetailStockOutAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/detailStockOuts",
     *      summary="Store a newly created DetailStockOut in storage",
     *      tags={"DetailStockOut"},
     *      description="Store DetailStockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DetailStockOut that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DetailStockOut")
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
     *                  ref="#/definitions/DetailStockOut"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDetailStockOutAPIRequest $request)
    {
        $input = $request->all();

        $detailStockOuts = $this->detailStockOutRepository->create($input);

        return $this->sendResponse($detailStockOuts->toArray(), 'Detail Stock Out saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/detailStockOuts/{id}",
     *      summary="Display the specified DetailStockOut",
     *      tags={"DetailStockOut"},
     *      description="Get DetailStockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DetailStockOut",
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
     *                  ref="#/definitions/DetailStockOut"
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
        /** @var DetailStockOut $detailStockOut */
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            return $this->sendError('Detail Stock Out not found');
        }

        return $this->sendResponse($detailStockOut->toArray(), 'Detail Stock Out retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDetailStockOutAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/detailStockOuts/{id}",
     *      summary="Update the specified DetailStockOut in storage",
     *      tags={"DetailStockOut"},
     *      description="Update DetailStockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DetailStockOut",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DetailStockOut that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DetailStockOut")
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
     *                  ref="#/definitions/DetailStockOut"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDetailStockOutAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailStockOut $detailStockOut */
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            return $this->sendError('Detail Stock Out not found');
        }

        $detailStockOut = $this->detailStockOutRepository->update($input, $id);

        return $this->sendResponse($detailStockOut->toArray(), 'DetailStockOut updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/detailStockOuts/{id}",
     *      summary="Remove the specified DetailStockOut from storage",
     *      tags={"DetailStockOut"},
     *      description="Delete DetailStockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DetailStockOut",
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
        /** @var DetailStockOut $detailStockOut */
        $detailStockOut = $this->detailStockOutRepository->findWithoutFail($id);

        if (empty($detailStockOut)) {
            return $this->sendError('Detail Stock Out not found');
        }

        $detailStockOut->delete();

        return $this->sendResponse($id, 'Detail Stock Out deleted successfully');
    }
}
