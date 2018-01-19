<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RiderCreateRequest;
use App\Http\Requests\RiderUpdateRequest;
use App\Repositories\RiderRepository;
use App\Validators\RiderValidator;

/**
 * Class RidersController.
 *
 * @package namespace App\Http\Controllers;
 */
class RidersController extends Controller
{
    /**
     * @var RiderRepository
     */
    protected $repository;

    /**
     * @var RiderValidator
     */
    protected $validator;

    /**
     * RidersController constructor.
     *
     * @param RiderRepository $repository
     * @param RiderValidator $validator
     */
    public function __construct(RiderRepository $repository, RiderValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $riders = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $riders,
            ]);
        }

        return view('riders.index', compact('riders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RiderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RiderCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $rider = $this->repository->create($request->all());

            $response = [
                'message' => 'Rider created.',
                'data'    => $rider->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rider = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $rider,
            ]);
        }

        return view('riders.show', compact('rider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rider = $this->repository->find($id);

        return view('riders.edit', compact('rider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RiderUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RiderUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $rider = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Rider updated.',
                'data'    => $rider->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Rider deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Rider deleted.');
    }
}
