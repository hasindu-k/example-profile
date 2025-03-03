<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    public function store(Request $request)
    {
        try {
            // StoreDownloadFileRequest
            // public function rules(): array
            // {
            //     return [
            //         'name' => 'required|string',
            //         'file' => 'required|mimes:jpeg,png,jpg,gif,pdf',
            //         'category_id' => 'required',
            //     ];
            // }

            $filePath = $request->file('file')->store('download');

            // DownloadFile::create([
            //     'name' => $request->validated()['name'],
            //     'file_path' => $filePath,
            //     'category_id' => $request->validated()['category_id'],
            // ]);

            return redirect()->route('admin.downloads.index')->with('success', 'Downloadable file created successfully');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return back()->withInput()->withErrors(['error', $e->getMessage()])->with('error', 'Downloadable file creation failed.');
        }
    }

    public function downloadFile(Request $request)
    {
        if (Storage::disk()->exists($request->file)) {
            return Storage::disk()->download($request->file);
        }

        return redirect()
            ->route('download')
            ->with('error', 'File not found.');
    }
}
