<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockOutAPIRequest;
use App\Http\Requests\API\UpdateStockOutAPIRequest;
use App\Models\StockOut;
use App\Repositories\StockOutRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StockOutController
 * @package App\Http\Controllers\API
 */

class StockOutAPIController extends AppBaseController
{
    /** @var  StockOutRepository */
    private $stockOutRepository;

    public function __construct(StockOutRepository $stockOutRepo)
    {
        $this->stockOutRepository = $stockOutRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockOuts",
     *      summary="Get a listing of the StockOuts.",
     *      tags={"StockOut"},
     *      description="Get all StockOuts",
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
     *                  @SWG\Items(ref="#/definitions/StockOut")
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
        $this->stockOutRepository->pushCriteria(new RequestCriteria($request));
        $this->stockOutRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stockOuts = $this->stockOutRepository->all();

        return $this->sendResponse($stockOuts->toArray(), 'Stock Outs retrieved successfully');
    }

    /**
     * @param CreateStockOutAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stockOuts",
     *      summary="Store a newly created StockOut in storage",
     *      tags={"StockOut"},
     *      description="Store StockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockOut that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockOut")
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
     *                  ref="#/definitions/StockOut"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockOutAPIRequest $request)
    {
        $input = $request->all();

        $stockOuts = $this->stockOutRepository->create($input);

        return $this->sendResponse($stockOuts->toArray(), 'Stock Out saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockOuts/{id}",
     *      summary="Display the specified StockOut",
     *      tags={"StockOut"},
     *      description="Get StockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockOut",
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
     *                  ref="#/definitions/StockOut"
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
        /** @var StockOut $stockOut */
        $stockOut = $this->stockOutRepository->findWithoutFail($id);

        if (empty($stockOut)) {
            return $this->sendError('Stock Out not found');
        }

        return $this->sendResponse($stockOut->toArray(), 'Stock Out retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockOutAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stockOuts/{id}",
     *      summary="Update the specified StockOut in storage",
     *      tags={"StockOut"},
     *      description="Update StockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockOut",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockOut that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockOut")
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
     *                  ref="#/definitions/StockOut"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockOutAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockOut $stockOut */
        $stockOut = $this->stockOutRepository->findWithoutFail($id);

        if (empty($stockOut)) {
            return $this->sendError('Stock Out not found');
        }

        $stockOut = $this->stockOutRepository->update($input, $id);

        return $this->sendResponse($stockOut->toArray(), 'StockOut updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stockOuts/{id}",
     *      summary="Remove the specified StockOut from storage",
     *      tags={"StockOut"},
     *      description="Delete StockOut",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockOut",
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
        /** @var StockOut $stockOut */
        $stockOut = $this->stockOutRepository->findWithoutFail($id);

        if (empty($stockOut)) {
            return $this->sendError('Stock Out not found');
        }

        $stockOut->delete();

        return $this->sendResponse($id, 'Stock Out deleted successfully');
    }
}
