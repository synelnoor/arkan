<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailStockInAPIRequest;
use App\Http\Requests\API\UpdateDetailStockInAPIRequest;
use App\Models\DetailStockIn;
use App\Repositories\DetailStockInRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetailStockInController
 * @package App\Http\Controllers\API
 */

class DetailStockInAPIController extends AppBaseController
{
    /** @var  DetailStockInRepository */
    private $detailStockInRepository;

    public function __construct(DetailStockInRepository $detailStockInRepo)
    {
        $this->detailStockInRepository = $detailStockInRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/detailStockIns",
     *      summary="Get a listing of the DetailStockIns.",
     *      tags={"DetailStockIn"},
     *      description="Get all DetailStockIns",
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
     *                  @SWG\Items(ref="#/definitions/DetailStockIn")
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
        $this->detailStockInRepository->pushCriteria(new RequestCriteria($request));
        $this->detailStockInRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detailStockIns = $this->detailStockInRepository->all();

        return $this->sendResponse($detailStockIns->toArray(), 'Detail Stock Ins retrieved successfully');
    }

    /**
     * @param CreateDetailStockInAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/detailStockIns",
     *      summary="Store a newly created DetailStockIn in storage",
     *      tags={"DetailStockIn"},
     *      description="Store DetailStockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DetailStockIn that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DetailStockIn")
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
     *                  ref="#/definitions/DetailStockIn"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDetailStockInAPIRequest $request)
    {
        $input = $request->all();

        $detailStockIns = $this->detailStockInRepository->create($input);

        return $this->sendResponse($detailStockIns->toArray(), 'Detail Stock In saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/detailStockIns/{id}",
     *      summary="Display the specified DetailStockIn",
     *      tags={"DetailStockIn"},
     *      description="Get DetailStockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DetailStockIn",
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
     *                  ref="#/definitions/DetailStockIn"
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
        /** @var DetailStockIn $detailStockIn */
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            return $this->sendError('Detail Stock In not found');
        }

        return $this->sendResponse($detailStockIn->toArray(), 'Detail Stock In retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDetailStockInAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/detailStockIns/{id}",
     *      summary="Update the specified DetailStockIn in storage",
     *      tags={"DetailStockIn"},
     *      description="Update DetailStockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DetailStockIn",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DetailStockIn that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DetailStockIn")
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
     *                  ref="#/definitions/DetailStockIn"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDetailStockInAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailStockIn $detailStockIn */
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            return $this->sendError('Detail Stock In not found');
        }

        $detailStockIn = $this->detailStockInRepository->update($input, $id);

        return $this->sendResponse($detailStockIn->toArray(), 'DetailStockIn updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/detailStockIns/{id}",
     *      summary="Remove the specified DetailStockIn from storage",
     *      tags={"DetailStockIn"},
     *      description="Delete DetailStockIn",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DetailStockIn",
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
        /** @var DetailStockIn $detailStockIn */
        $detailStockIn = $this->detailStockInRepository->findWithoutFail($id);

        if (empty($detailStockIn)) {
            return $this->sendError('Detail Stock In not found');
        }

        $detailStockIn->delete();

        return $this->sendResponse($id, 'Detail Stock In deleted successfully');
    }
}
