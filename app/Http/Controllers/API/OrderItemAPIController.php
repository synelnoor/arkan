<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderItemAPIRequest;
use App\Http\Requests\API\UpdateOrderItemAPIRequest;
use App\Models\OrderItem;
use App\Repositories\OrderItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class OrderItemController
 * @package App\Http\Controllers\API
 */

class OrderItemAPIController extends AppBaseController
{
    /** @var  OrderItemRepository */
    private $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepo)
    {
        $this->orderItemRepository = $orderItemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/orderItems",
     *      summary="Get a listing of the OrderItems.",
     *      tags={"OrderItem"},
     *      description="Get all OrderItems",
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
     *                  @SWG\Items(ref="#/definitions/OrderItem")
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
        $this->orderItemRepository->pushCriteria(new RequestCriteria($request));
        $this->orderItemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $orderItems = $this->orderItemRepository->all();

        return $this->sendResponse($orderItems->toArray(), 'Order Items retrieved successfully');
    }

    /**
     * @param CreateOrderItemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/orderItems",
     *      summary="Store a newly created OrderItem in storage",
     *      tags={"OrderItem"},
     *      description="Store OrderItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="OrderItem that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/OrderItem")
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
     *                  ref="#/definitions/OrderItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateOrderItemAPIRequest $request)
    {
        $input = $request->all();

        $orderItems = $this->orderItemRepository->create($input);

        return $this->sendResponse($orderItems->toArray(), 'Order Item saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/orderItems/{id}",
     *      summary="Display the specified OrderItem",
     *      tags={"OrderItem"},
     *      description="Get OrderItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of OrderItem",
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
     *                  ref="#/definitions/OrderItem"
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
        /** @var OrderItem $orderItem */
        $orderItem = $this->orderItemRepository->findWithoutFail($id);

        if (empty($orderItem)) {
            return $this->sendError('Order Item not found');
        }

        return $this->sendResponse($orderItem->toArray(), 'Order Item retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateOrderItemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/orderItems/{id}",
     *      summary="Update the specified OrderItem in storage",
     *      tags={"OrderItem"},
     *      description="Update OrderItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of OrderItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="OrderItem that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/OrderItem")
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
     *                  ref="#/definitions/OrderItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateOrderItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrderItem $orderItem */
        $orderItem = $this->orderItemRepository->findWithoutFail($id);

        if (empty($orderItem)) {
            return $this->sendError('Order Item not found');
        }

        $orderItem = $this->orderItemRepository->update($input, $id);

        return $this->sendResponse($orderItem->toArray(), 'OrderItem updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/orderItems/{id}",
     *      summary="Remove the specified OrderItem from storage",
     *      tags={"OrderItem"},
     *      description="Delete OrderItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of OrderItem",
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
        /** @var OrderItem $orderItem */
        $orderItem = $this->orderItemRepository->findWithoutFail($id);

        if (empty($orderItem)) {
            return $this->sendError('Order Item not found');
        }

        $orderItem->delete();

        return $this->sendResponse($id, 'Order Item deleted successfully');
    }
}
