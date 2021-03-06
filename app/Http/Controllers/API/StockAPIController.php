<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockAPIRequest;
use App\Http\Requests\API\UpdateStockAPIRequest;
use App\Models\Stock;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StockController
 * @package App\Http\Controllers\API
 */

class StockAPIController extends AppBaseController
{
    /** @var  StockRepository */
    private $stockRepository;

    public function __construct(StockRepository $stockRepo)
    {
        $this->stockRepository = $stockRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stocks",
     *      summary="Get a listing of the Stocks.",
     *      tags={"Stock"},
     *      description="Get all Stocks",
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
     *                  @SWG\Items(ref="#/definitions/Stock")
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
        $this->stockRepository->pushCriteria(new RequestCriteria($request));
        $this->stockRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stocks = $this->stockRepository->all();

        return $this->sendResponse($stocks->toArray(), 'Stocks retrieved successfully');
    }

    /**
     * @param CreateStockAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stocks",
     *      summary="Store a newly created Stock in storage",
     *      tags={"Stock"},
     *      description="Store Stock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Stock that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Stock")
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
     *                  ref="#/definitions/Stock"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockAPIRequest $request)
    {
        $input = $request->all();

        $stocks = $this->stockRepository->create($input);

        return $this->sendResponse($stocks->toArray(), 'Stock saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stocks/{id}",
     *      summary="Display the specified Stock",
     *      tags={"Stock"},
     *      description="Get Stock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Stock",
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
     *                  ref="#/definitions/Stock"
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
        /** @var Stock $stock */
        $stock = $this->stockRepository->findWithoutFail($id);

        if (empty($stock)) {
            return $this->sendError('Stock not found');
        }

        return $this->sendResponse($stock->toArray(), 'Stock retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stocks/{id}",
     *      summary="Update the specified Stock in storage",
     *      tags={"Stock"},
     *      description="Update Stock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Stock",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Stock that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Stock")
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
     *                  ref="#/definitions/Stock"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockAPIRequest $request)
    {
        $input = $request->all();

        /** @var Stock $stock */
        $stock = $this->stockRepository->findWithoutFail($id);

        if (empty($stock)) {
            return $this->sendError('Stock not found');
        }

        $stock = $this->stockRepository->update($input, $id);

        return $this->sendResponse($stock->toArray(), 'Stock updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stocks/{id}",
     *      summary="Remove the specified Stock from storage",
     *      tags={"Stock"},
     *      description="Delete Stock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Stock",
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
        /** @var Stock $stock */
        $stock = $this->stockRepository->findWithoutFail($id);

        if (empty($stock)) {
            return $this->sendError('Stock not found');
        }

        $stock->delete();

        return $this->sendResponse($id, 'Stock deleted successfully');
    }
}
