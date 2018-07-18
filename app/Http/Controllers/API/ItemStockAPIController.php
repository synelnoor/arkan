<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItemStockAPIRequest;
use App\Http\Requests\API\UpdateItemStockAPIRequest;
use App\Models\ItemStock;
use App\Repositories\ItemStockRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ItemStockController
 * @package App\Http\Controllers\API
 */

class ItemStockAPIController extends AppBaseController
{
    /** @var  ItemStockRepository */
    private $itemStockRepository;

    public function __construct(ItemStockRepository $itemStockRepo)
    {
        $this->itemStockRepository = $itemStockRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/itemStocks",
     *      summary="Get a listing of the ItemStocks.",
     *      tags={"ItemStock"},
     *      description="Get all ItemStocks",
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
     *                  @SWG\Items(ref="#/definitions/ItemStock")
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
        $this->itemStockRepository->pushCriteria(new RequestCriteria($request));
        $this->itemStockRepository->pushCriteria(new LimitOffsetCriteria($request));
        $itemStocks = $this->itemStockRepository->all();

        return $this->sendResponse($itemStocks->toArray(), 'Item Stocks retrieved successfully');
    }

    /**
     * @param CreateItemStockAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/itemStocks",
     *      summary="Store a newly created ItemStock in storage",
     *      tags={"ItemStock"},
     *      description="Store ItemStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ItemStock that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ItemStock")
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
     *                  ref="#/definitions/ItemStock"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateItemStockAPIRequest $request)
    {
        $input = $request->all();

        $itemStocks = $this->itemStockRepository->create($input);

        return $this->sendResponse($itemStocks->toArray(), 'Item Stock saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/itemStocks/{id}",
     *      summary="Display the specified ItemStock",
     *      tags={"ItemStock"},
     *      description="Get ItemStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ItemStock",
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
     *                  ref="#/definitions/ItemStock"
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
        /** @var ItemStock $itemStock */
        $itemStock = $this->itemStockRepository->findWithoutFail($id);

        if (empty($itemStock)) {
            return $this->sendError('Item Stock not found');
        }

        return $this->sendResponse($itemStock->toArray(), 'Item Stock retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateItemStockAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/itemStocks/{id}",
     *      summary="Update the specified ItemStock in storage",
     *      tags={"ItemStock"},
     *      description="Update ItemStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ItemStock",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ItemStock that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ItemStock")
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
     *                  ref="#/definitions/ItemStock"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateItemStockAPIRequest $request)
    {
        $input = $request->all();

        /** @var ItemStock $itemStock */
        $itemStock = $this->itemStockRepository->findWithoutFail($id);

        if (empty($itemStock)) {
            return $this->sendError('Item Stock not found');
        }

        $itemStock = $this->itemStockRepository->update($input, $id);

        return $this->sendResponse($itemStock->toArray(), 'ItemStock updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/itemStocks/{id}",
     *      summary="Remove the specified ItemStock from storage",
     *      tags={"ItemStock"},
     *      description="Delete ItemStock",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ItemStock",
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
        /** @var ItemStock $itemStock */
        $itemStock = $this->itemStockRepository->findWithoutFail($id);

        if (empty($itemStock)) {
            return $this->sendError('Item Stock not found');
        }

        $itemStock->delete();

        return $this->sendResponse($id, 'Item Stock deleted successfully');
    }
}
