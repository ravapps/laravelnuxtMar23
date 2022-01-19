<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use Faker\Factory;
use App\Models\UserDetails;
use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, MetApi;


    public function routes(): string
    {
        Artisan::call('route:list');
        $routes = explode("\n", Artisan::output());
        foreach ($routes as $index => $route) {
            if (str_contains($route, 'debugbar')) {
                unset($routes[$index]);
            }
        }
        return '<pre>' . implode("\n", $routes) . '</pre>';
    }


    public function store(Request $request)
    {




    /*  $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed'
         ]);

         if ($validator->fails()) {
           return response()->json([
             'status' => 'Error',
             'message' => 'Invalid data',
             'data' => null
           ], 401);
         }

         $attr = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|unique:users,email',
           'password' => 'required|string|min:6|confirmed'
         ]);  */
         //$team = collect($data)


         //->except('product_list','taxes','product_id','description','quantity','price','sub_total','sproduct_list','staxes','scharge','sproduct_id','sdescription','squantity','sprice','ssub_total')->toArray();
         DB::beginTransaction();
        $userdetail = UserDetails::create($request->toArray());
        $userdetail->userSkill()->attach($request->education);
        $userdetail->userEducation()->attach($request->skills);

        $userdetail->userEmployment()->attach($request->employment);
        DB::commit();
        //->attach($list)

        /* return $this->success([
            'token' => $user->createToken('API Toskillken')->plainTextToken
        ]);
        if($user) {
            $data = ['token' => $user->createToken('API Token')->plainTextToken];
        } */

        return response()->json([
          'status' => 'Success',
          'message' => null,
          'data' => $userdetail->id
        ], 200);
    }



    public function example(Request $request): Response|JsonResponse
    {
        /* $this
            ->option('count', 'required|integer')
            ->verify();

        $faker = Factory::create();
        $users = [];

        for ($i = 0; $i !== (int) $request->get('count'); $i++) {
            $email = $faker->unique()->safeEmail;
            $users[] = [
                'name' => $faker->name(),
                'job' => $faker->jobTitle,
                'email' => $email,
                'avatar' => 'https://avatars.dicebear.com/api/human/' . $email . '.svg',
            ];
        } */
        $users = [];
        $userdetailS = UserDetails::all();
        foreach ($userdetailS as $item) {
          $users[] = [
              'name' => $item->user[0]->name,
              'job' => $item->skills[0]->skill_name,
              'email' => $item->user[0]->email,
              'phone' => $item->phone,
              'avatar' => env('APP_URL').'/storage/app/'.$item->photo_path ,
          ];

        }


        return $this->render($users);
    }

    public function error(): Response|JsonResponse
    {
        return $this->render(['forced_error' => $forced_error]);
    }
}
