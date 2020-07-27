<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    //
    use DeleteModelTrait;
    protected $user, $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->latest()->paginate(8);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $role = $this->role->all();
        return view('admin.user.add', compact('role'));
    }

    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            // tra ve ban ghi duoc insert
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            //Lay ra mang cac vai tro
            $roleIds = $request->role_id;
            //inset vao bang role_user
            $user->roles()->attach($roleIds);
            //Neu khong code khong bi loi (dam bao 2 bang duoc insert)
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            //fail se rollback lai
            DB::rollBack();
            Log::error('message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }

        //Duyet tung ma vai tro va chen vao bang role_id
        // foreach( $roleIds as $roleId)
        // {
        //     DB::table('role_user')->insert([
        //         'role_id' => $roleId,
        //         'user_id' => $user->id
        //     ]);
        // }
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        //lay ra ban ghi  vai tro cua user dang chon
        $roleOfUser = $user->roles;
        return view('admin.user.edit', compact('user', 'roles', 'roleOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();
            // tra ve ban ghi duoc insert
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            //Lay ra  ban ghi mang cac vai tro
            $roleIds = $request->role_id;
            //inset vao bang role_user
            //sync kiem tra ma cai tro nao co roi thi khong them vao bang trung gian nua
            //neu chua co them moi vao bang trung gian (xoa cu di cap nhat them cai moi vao bang)
            $user->roles()->sync($roleIds);
            //Neu khong code khong bi loi (dam bao 2 bang duoc insert)
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            //fail se rollback lai
            DB::rollBack();
            Log::error('message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
         return $this->deleteModel($id, $this->user);
    }
}