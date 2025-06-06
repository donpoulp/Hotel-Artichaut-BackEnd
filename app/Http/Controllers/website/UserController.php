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
             'firstName' => 'nullable',
             'lastName' => 'nullable',
             'email' => 'nullable',
             'emailBis' => 'nullable',
             'password' => 'nullable',
             'phone' => 'nullable',
             'phoneBis' => 'nullable',
             'role' => 'nullable',
         ]);

         $user = User::findOrFail($id);
         $user->update($updatecustomer);

         return response()->json($updatecustomer);

     }
     public function PostUser(Request $request)
     {
         try {
             $validate = $request->validate([
                 'firstName' => 'required|string|max:20',
                 'lastName' => 'required|string|max:20',
                 'email' => 'required|string|email|max:70',
                 'emailBis' => 'nullable|string|email|max:70',
                 'password' => 'required|string|max:20',
                 'phone' => 'required|string|max:10',
                 'phoneBis' => 'nullable|string|max:10',
                 'role' => 'nullable|int|max:15',
             ]);

             if (!isset($validate['role'])){
                 $validate['role'] = 0;
             }
             $postcustomer = new User($validate);
             $postcustomer->save();
         } catch (ValidationException $exception) {
             return response()->json($exception->getMessage());
         }
     }

     public function DeleteUser(Request $request, $id)
     {
         $deletecustomer = User::findOrFail($id);
         $deletecustomer->delete();
         return response()->json(User::all());
     }
}
