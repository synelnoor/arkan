<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStockInAPIRequest;
use App\Http\Requests\API\UpdateStockInAPIRequest;
use App\Models\StockIn;
use App\Repositories\StockInRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StockInController
 * @package App\Http\Controllers\API
 */

class StockInAPIController extends AppBaseController
{
    /** @var  StockInRepository */
    private $stockInRepository;

    public function __construct(StockInRepository $stockInRepo)
    {
        $this->stockInRepository = $stockInRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockIns",
     *      summary="Get a listing of the StockIns.",
     *      tags={"StockIn"},
     *      description="Get all StockIns",
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
     *                  @SWG\Items(ref="#/definitions/StockIn")
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
        $this->stockInRepository->pushCriteria(new RequestCriteria($request));
        $this->stockInRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stockIns = $this->stockInRepository->all();

        return $this->sendResponse($stockIns->toArray(), 'Stock Ins retrieved successfully');
    }

    /**
     * @param CreateStockInAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stockIns",
     *      summary="Store a newly created StockIn in storage",
     *      tags={"StockIn"},
     *      description="Store StockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockIn that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockIn")
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
     *                  ref="#/definitions/StockIn"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockInAPIRequest $request)
    {
        $input = $request->all();

        $stockIns = $this->stockInRepository->create($input);

        return $this->sendResponse($stockIns->toArray(), 'Stock In saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockIns/{id}",
     *      summary="Display the specified StockIn",
     *      tags={"StockIn"},
     *      description="Get StockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockIn",
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
     *                  ref="#/definitions/StockIn"
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
        /** @var StockIn $stockIn */
        $stockIn = $this->stockInRepository->findWithoutFail($id);

        if (empty($stockIn)) {
            return $this->sendError('Stock In not found');
        }

        return $this->sendResponse($stockIn->toArray(), 'Stock In retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockInAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stockIns/{id}",
     *      summary="Update the specified StockIn in storage",
     *      tags={"StockIn"},
     *      description="Update StockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockIn",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockIn that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockIn")
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
     *                  ref="#/definitions/StockIn"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockInAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockIn $stockIn */
        $stockIn = $this->stockInRepository->findWithoutFail($id);

        if (empty($stockIn)) {
            return $this->sendError('Stock In not found');
        }

        $stockIn = $this->stockInRepository->update($input, $id);

        return $this->sendResponse($stockIn->toArray(), 'StockIn updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stockIns/{id}",
     *      summary="Remove the specified StockIn from storage",
     *      tags={"StockIn"},
     *      description="Delete StockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockIn",
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
        /** @var StockIn $stockIn */
        $stockIn = $this->stockInRepository->findWithoutFail($id);

        if (empty($stockIn)) {
            return $this->sendError('Stock In not found');
        }

        $stockIn->delete();

        return $this->sendResponse($id, 'Stock In deleted successfully');
    }
}
