<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogStockAPIRequest;
use App\Http\Requests\API\UpdateLogStockAPIRequest;
use App\Models\LogStock;
use App\Repositories\LogStockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LogStockController
 * @package App\Http\Controllers\API
 */

class LogStockAPIController extends AppBaseController
{
    /** @var  LogStockRepository */
    private $logStockRepository;

    public function __construct(LogStockRepository $logStockRepo)
    {
        $this->logStockRepository = $logStockRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/logStocks",
     *      summary="Get a listing of the LogStocks.",
     *      tags={"LogStock"},
     *      description="Get all LogStocks",
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
     *                  @SWG\Items(ref="#/definitions/LogStock")
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
        $this->logStockRepository->pushCriteria(new RequestCriteria($request));
        $this->logStockRepository->pushCriteria(new LimitOffsetCriteria($request));
        $logStocks = $this->logStockRepository->all();

        return $this->sendResponse($logStocks->toArray(), 'Log Stocks retrieved successfully');
    }

    /**
     * @param CreateLogStockAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/logStocks",
     *      summary="Store a newly created LogStock in storage",
     *      tags={"LogStock"},
     *      description="Store LogStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LogStock that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LogStock")
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
     *                  ref="#/definitions/LogStock"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLogStockAPIRequest $request)
    {
        $input = $request->all();

        $logStocks = $this->logStockRepository->create($input);

        return $this->sendResponse($logStocks->toArray(), 'Log Stock saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/logStocks/{id}",
     *      summary="Display the specified LogStock",
     *      tags={"LogStock"},
     *      description="Get LogStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LogStock",
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
     *                  ref="#/definitions/LogStock"
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
        /** @var LogStock $logStock */
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            return $this->sendError('Log Stock not found');
        }

        return $this->sendResponse($logStock->toArray(), 'Log Stock retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLogStockAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/logStocks/{id}",
     *      summary="Update the specified LogStock in storage",
     *      tags={"LogStock"},
     *      description="Update LogStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LogStock",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LogStock that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LogStock")
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
     *                  ref="#/definitions/LogStock"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLogStockAPIRequest $request)
    {
        $input = $request->all();

        /** @var LogStock $logStock */
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            return $this->sendError('Log Stock not found');
        }

        $logStock = $this->logStockRepository->update($input, $id);

        return $this->sendResponse($logStock->toArray(), 'LogStock updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/logStocks/{id}",
     *      summary="Remove the specified LogStock from storage",
     *      tags={"LogStock"},
     *      description="Delete LogStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LogStock",
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
        /** @var LogStock $logStock */
        $logStock = $this->logStockRepository->findWithoutFail($id);

        if (empty($logStock)) {
            return $this->sendError('Log Stock not found');
        }

        $logStock->delete();

        return $this->sendResponse($id, 'Log Stock deleted successfully');
    }
}
