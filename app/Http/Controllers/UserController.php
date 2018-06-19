<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\UserRequest;
use \App\User;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        // $this->middleware('auth');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = ['id','name','login', 'email'];
        $params = $request->all();
        $users = $this->user
        ->orderBy(
            $columns[$params['order'][0]['column']],
            $params['order'][0]['dir']
            )
        ->take($params['length'])
        ->skip($params['length'] * $params['start'])
        ->get();

        return response()->json([
          'draw' => intval(request('draw')),
          'recordsTotal' => intval(count($users)),
          'recordsFiltered' => intval(count($users)),
          'data' => $users
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $return = ['message' => 'Usuário criado'];
        $statusCode = 201;
        try {
            $this->user->create($request->all());
        } catch (\Exception $e) {
            $return = ['message' => $e->getMessage()];
            $statusCode = 422;
        }

        return response()->json($return, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->user->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $return = ['message' => 'Usuário atualizado'];
        $statusCode = 200;
        try {
            $user = $this->user->findOrFail($id);
            $user->update($request->all());
        } catch(\Exception $e) {
            $return = ['message' => $e->getMessage()];
            $statusCode = 422;
        }

        return response()->json($return, $statusCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return = ['message' => 'Usuário excluído'];
        $statusCode = 200;

        try {
            $user = $this->user->findOrFail($id);
            $user->delete($id);
        } catch(\Exception $e) {
            $return = ['message' => $e->getMessage()];
            $statusCode = 422;
        }

        return response()->json($return, $statusCode);
    }
}
