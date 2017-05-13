<?php
/**
 * Created by PhpStorm.
 * User: haava
 * Date: 5/13/2017
 * Time: 11:23
 */

namespace LinksApp\Http\Controllers;
use Illuminate\Http\Request;
use LinksApp\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;


class StoreController extends Controller
{
    public function store(Request $request) {
        $file = $request->file('file');
        if (Auth::check()) {
            $name = $file->getClientOriginalName();
            $name = 'u' . Auth::id() . "-" . str_replace(" ", "-", $name);
            $path = $file->storeAs(
                'files', $name
            );

            File::create([
                'name' => $name,
                'hash' => md5_file($file->getRealPath()),
                'user_id' => $request->user()->id
            ]);

            return redirect("/home");
        }
    }

    public function getFilesForUser() {
        $userId = Auth::id();

        $files = DB::table('files')->where('user_id', '=', $userId)->orderBy('id', 'desc')->get();
        return $files;
    }

    public function get($hash) {
        $name = DB::table('files')
            ->where('hash', '=', $hash)->select('name')->pluck('name')[0];

        $path = storage_path('app/files/' . $name);

        if(Auth::check()) {
            return response()->download($path);
        }

        else {
            return response()->json(['status' => "Access denied"], 403);
        }

    }

    public function delete() {

    }


}