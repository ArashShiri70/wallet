<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Log;


/**
 * @OA\Info(
 *     title="Example API",
 *     version="1.0.0",
 *     description="API Documentation example"
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/users",
     *     summary="Get list of users",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of users",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="users",
     *                     type="array",
     *                     @OA\Items(
     *                         type="object",
     *                         @OA\Property(property="id", type="integer"),
     *                         @OA\Property(property="name", type="string"),
     *                         @OA\Property(property="email", type="string"),
     *                         @OA\Property(property="mobile_number", type="string"),
     *                         @OA\Property(property="transactions", type="object")
     *                     )
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="List of users"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(type="object")
     *              ),
     *             @OA\Property(property="message", type="string", example="Something went wrong")
     *         )
     *     )
     * )
     */

    protected  $userRepo;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function index()
    {
        try {
            return response()->json([
                "data" => [
                    "users" => $this->userRepo->getUsersWithSpecificColumns(['id', 'name', 'email', 'phone_number', 'created_at'], ['transactions'])
                ],
                "message" => "List of users"
            ]);
        } catch (\Exception $e) {
            Log::error('Error to fetch users: ' . $e->getMessage());
            return response()->json([
                "data" => [],
                "message" => "Something went wrong"
            ], 500);
        }
    }
}
