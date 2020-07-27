<?php

 namespace App\Traits;
 use Illuminate\Support\Facades\Log;
 Trait DeleteModelTrait {
     public function deleteModel($id, $model)
     {
         try {
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'code' => 500,
                'message' => 'fails',

            ], 500);
        }
     }
 }