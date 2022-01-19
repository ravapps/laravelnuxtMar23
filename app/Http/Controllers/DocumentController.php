<?php

namespace App\Http\Controllers;
use Validator,Redirect,Response,File;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class DocumentController  extends Controller
{
  public function store(Request $request)
   {
if($request['typeoffile'] == "photo") {
      $validator = Validator::make($request->all(),
             [
             'file' => 'required|mimes:jpeg,jpg,png|max:2048',
            ]);
}

if($request['typeoffile'] == "resume") {
      $validator = Validator::make($request->all(),
             [
             'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',
            ]);
}

            //'file' => 'required|mimes:doc,docx,pdf,txt|max:2048',

   if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()], 401);
        }


       if ($files = $request->file('file')) {

           //store file into document folder
           $file = $request->file->store('uploads');

           /* /store your file into database
           $document = new Document();
           $document->title = $file;
           $document->user_id = $request->user_id;
           $document->save();  */

           return response()->json([
               "success" => true,
               "message" => "File successfully uploaded",
               "file" => $file
           ]);

       }


   }



}



/* Sanctum has some features too, for example, you can easily manage and assign token abilities by using this command:

return $user->createToken('token-name', ['server:update'])->plainTextToken;

And check the user’s token abilities with:

if ($user->tokenCan('server:update')) {

}  */
