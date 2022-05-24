<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Library\ApiHelpers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use ApiHelpers;
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(2),
        ]);
    }
    public function create(Request $request)
    {
        $user = $request->user();
        if ($user->hasRole('admin')) {
            $categories = Category::where('parent_category', 0)->get();
            return view('admin.categories.create', compact('categories'));
        }
        return $this->onError(401, 'Unauthorized Access');
    }
    public function update(Request $request, $id)
    {
        $user = $request->user();
        if ($user->hasRole('admin') || $user->hasRole('user')) {
            $category = Category::find($id);
            $category->name = $request->input('name');
            $category->image = $request->input('image');
            $category->save();
            return $this->onSuccess($category, 'Post Updated');
            }
            return $this->onError(400);
        }

    public function delete(Request $request, $id)
    {
        $user = $request->user();
        if ($user->hasRole('admin')) {
                // Обновление сообщения
                $category = Category::find($id);
                $category->delete();
            if (!empty($category)) {
                return $this->onSuccess($category, 'Post Deleted');
            }
            return $this->onError(404, 'Post Not Found');


        }
        return $this->onError(401, 'Unauthorized Access');
    }

    public function deleteUser(Request $request, $id)
    {
        $user = $request->user();
        if ($user->hasRole('admin')) {
            $user = User::find($id);
            if ($user->role !== 1) {
                $user->delete();
                if (!empty($user)) {
                    return $this->onSuccess('', 'User Deleted');
                }
                return $this->onError(404, 'User Not Found');
            }
        }
        return $this->onError(401, 'Unauthorized Access');
    }
}
