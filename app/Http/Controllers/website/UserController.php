<?php

namespace App\Http\Controllers\website;

 use App\Mail\OrderShipped;
 use App\Models\User;
 use Illuminate\Http\Request;
 use Illuminate\Routing\Controller;
 use Illuminate\Support\Facades\Mail;
 use Illuminate\Validation\ValidationException;
 use OpenApi\Annotations as OA;
 use Illuminate\Support\Facades\Hash;

 class UserController extends Controller
{
     /**
      * @OA\Get(
      *     path="/users",
      *     tags={"Users"},
      *     summary="Get a list of all users",
      *     description="Returns a list of all users with their reservations",
      *     @OA\Response(
      *         response=200,
      *         description="Successful operation",
      *         @OA\JsonContent(
      *             type="array",
      *             @OA\Items(ref="#/components/schemas/User")
      *         )
      *     )
      * )
      */
    public function allUsers(): object{
        $users = User::with('reservation')->get();

        return response()->json($users);
    }



     public function UserShowid(Request $request , string $id): object
     {
         $validated = $request->validate([

             $userId = User::findOrFail($id)]);

         return response()->json([$userId]);
     }
     public function UpdateUser($id, Request $request)
     {
         $updatecustomer = $request->validate([
             'firstName' => ['required', 'regex:/^[^<>{}]+$/', 'max:20'],
             'lastName' => ['nullable', 'regex:/^[^<>{}]+$/', 'max:20'],
             'email' => 'required|max:70',
             'emailBis' => 'nullable|email|max:70',
             'phone' => 'required',
             'phoneBis' => 'nullable',
             'role' => 'nullable|integer|between:0,2',
         ]);



         $user = User::findOrFail($id);
         $user->update($updatecustomer);

         return response()->json($updatecustomer);

     }
     public function PostUser(Request $request)
     {
         try {
             $validate = $request->validate([
                 'firstName' => ['required', 'regex:/^[^<>{}]+$/', 'max:20'],
                 'lastName' => ['nullable', 'regex:/^[^<>{}]+$/', 'max:20'],
                 'email' => 'required|email:rfc,dns|max:70|unique:users,email',
                 'emailBis' => 'nullable|email|max:70',
                 'password' => 'required|string|min:8|max:20',
                 'phone' => 'required|digits:10',
                 'phoneBis' => 'nullable|digits:10',
                 'role' => 'nullable|integer|between:0,2',
             ]);

             if (!isset($validate['role'])){
                 $validate['role'] = 0;
             }
             $postcustomer = new User($validate);
             $postcustomer->save();

             return response()->json($postcustomer, 201);
         } catch (ValidationException $exception) {
             return response()->json(['error' => $exception->getMessage()], 422);
         }
     }

     public function DeleteUser(Request $request, $id)
     {
         $deletecustomer = User::findOrFail($id);
         $deletecustomer->delete();
         return response()->json(User::all());
     }
}
