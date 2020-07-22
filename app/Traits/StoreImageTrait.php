<?php
namespace App\Traits;
use Illuminate\Support\Facades\Storage;
trait StoreImageTrait{
     public function StoreTraitUpload($request, $fieldName, $folderName)
     {
         if ($request->hasfile($fieldName)) {
             $file = $request->$fieldName;
             $fileName = $file->getClientOriginalName();
             $fileNameHash = str_random(20). ' '.$file->getClientOriginalExtension();
             $filePath = $request->file($fieldName)->StoreAs('public/'.$folderName. '/'. auth()->id(), $fileNameHash);
             $dataUpload = [
             'file_name' => $fileName,
             'file_path' => Storage::url($filePath)
         ];
         return $dataUpload;
         }
         return null;

     }

     public function storeTraitUploadMultiple($file, $folderName)
     {
         $fileName = $file->getClientOriginalName();
         $fileNameHash = str_random(20).' '.$file->getClientOriginalExtension();
         $filePath = $file->StoreAs('public/'.$folderName.'/'.auth()->id(), $fileName);
         $dataUpload = [
             'file_name' => $fileName,
             'file_path' =>Storage::url($filePath)

         ];
         return $dataUpload;
     }
 }