<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HandleResponseTrait;
use App\Helpers\ActionLogger;
use App\SaveImageTrait;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    use HandleResponseTrait, SaveImageTrait;

    public function index() {
        return view('backend.sponsors.index');
    }

    public function get() {
        $Sponsors = Sponsor::all();

        return $this->handleResponse(
            true,
            "",
            [],
            [
                $Sponsors
            ],
            []
        );
    }

    public function add() {
        return view("backend.sponsors.create");
    }

    public function edit($id) {
        $sponsor = Sponsor::find($id);

        if ($sponsor)
            return view("backend.sponsors.edit")->with(compact("sponsor"));


        return $this->handleResponse(
            false,
            "Sponsor not exits",
            ["Sponsor id not valid"],
            [],
            []
        );
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => ["required"],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            "name.required" => "ادخل اسم الراعي",
           "image.image" => "من فضلك ارفع صورة صالحة",
            "image.mimes" => "يجب ان تكون الصورة بين هذه الصيغ (jpeg, png, jpg, gif)",
            "image.max" => "يجب الا يتعدى حجم الصورة 2 ميجا",
        ]);

        if ($validator->fails()) {
            return $this->handleResponse(
                false,
                "",
                [$validator->errors()->first()],
                [],
                []
            );
        }

        $image = $this->saveImg($request->image, 'images/uploads/Sponsors', time());


        $sponsor = Sponsor::create([
            "name" => $request->name,
            "image_path" => '/images/uploads/Sponsors/' . $image,
        ]);

        ActionLogger::log('create', 'sponsors', $sponsor->name);

        if ($sponsor)
            return $this->handleResponse(
                true,
                "تم اضافة الراعي بنجاح",
                [],
                [],
                []
            );

    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            "id" => ["required"],
            "name" => ["required"],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            "name.required" => "ادخل اسم الراعي",
            "link.required" => "ادخل رابط الراعي",
            "image.image" => "من فضلك ارفع صورة صالحة",
            "image.mimes" => "يجب ان تكون الصورة بين هذه الصيغ (jpeg, png, jpg, gif)",
            "image.max" => "يجب الا يتعدى حجم الصورة 2 ميجا",
        ]);

        if ($validator->fails()) {
            return $this->handleResponse(
                false,
                "",
                [$validator->errors()->first()],
                [],
                []
            );
        }

        $sponsor = Sponsor::find($request->id);

        if ($request->image) {
            $this->deleteFile(base_path($sponsor->image_path));
            $image = $this->saveImg($request->image, 'images/uploads/Sponsors', time());
            $sponsor->image_path= '/images/uploads/Sponsors/' . $image;
        }

        $sponsor->name = $request->name;
        $sponsor->save();
        ActionLogger::log('update', 'sponsors', $sponsor->name);

        if ($sponsor)
            return $this->handleResponse(
                true,
                "تم تحديث البيانات بنجاح",
                [],
                [],
                []
            );

    }

    public function deleteIndex($id) {
        $sponsor = Sponsor::find($id);

        if ($sponsor)
            return view("backend.sponsors.delete")->with(compact("sponsor"));

        return $this->handleResponse(
            false,
            "sponsor not exits",
            ["sponsor id not valid"],
            [],
            []
        );
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            "id" => ["required"],
        ], [
        ]);

        if ($validator->fails()) {
            return $this->handleResponse(
                false,
                "",
                [$validator->errors()->first()],
                [],
                []
            );
        }

        $Sponsor = Sponsor::find($request->id);

        $original = $Sponsor;

        $Sponsor->delete();

        ActionLogger::log('delete', 'sponsors', $original->name);

        if ($Sponsor)
            return $this->handleResponse(
                true,
                "تم حذف الراعي بنجاح",
                [],
                [],
                []
            );

    }

}
