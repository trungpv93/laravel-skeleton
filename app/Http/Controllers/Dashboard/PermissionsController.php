<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\PermissionRepository;
use App\Validators\PermissionValidator;
use App\Repositories\RoleRepository;

class PermissionsController extends Controller
{

    /**
     * @var PermissionRepository
     */
    protected $repository;

    /**
     * @var RoleRepository
     */
    protected $repositoryRole;

    /**
     * @var PermissionValidator
     */
    protected $validator;

    public function __construct(PermissionRepository $repository, PermissionValidator $validator, RoleRepository $repositoryRole)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->repositoryRole = $repositoryRole;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $permissions = $this->repository->paginate(10);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $permissions,
            ]);
        }

        return view('dashboards.permissions.index', compact('permissions'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('dashboards.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            
            $permission = $this->repository->create($request->all());

            $response = [
                'message' => 'Permission created.',
                'data'    => $permission->toArray(),
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
        $permission = $this->repository->find($id);
        $permissionRoles = $this->repositoryRole->getRolesByPermissionID($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => ['permission' => $permission, 'permissionRoles' => $permissionRoles],
            ]);
        }

        return view('dashboards.permissions.show', compact('permission', 'permissionRoles'));
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

        $permission = $this->repository->find($id);

        return view('dashboards.permissions.edit', compact('permission'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PermissionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PermissionUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $permission = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Permission updated.',
                'data'    => $permission->toArray(),
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
                'message' => 'Permission deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Permission deleted.');
    }
}
