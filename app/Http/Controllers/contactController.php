<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\contacts;

class contactController extends BaseController
{
    public function contactInsert(Request $request) 
    {
        $data_save = new contacts([
            "name"=>$request->get("name"),
            "email"=>$request->get("email"),
            "subject"=>$request->get("subject"),
            "message"=>$request->get("message"),
        ]);

        $data_save->save();
        return redirect("contact?success");
    }
}
