<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\File;


class FileController extends Controller
{
	public function index(Request $request)
    {
		$files = File::all();

		return view('cms.file.index', compact('files'));
    }


    public function create($type = null)
    {
		return view('cms.file.create', ['type' => $type]);
    }

    public function store(Request $request)
    {
		$type = $request->type;
		$files = $request->files;
		
		foreach ($files as $key => $file) {
			if (in_array($file->getMimeType(), File::imageTypes)) {
				$saved = File::imageUpload($file, $type);
			} else {
				$saved = File::fileUpload($file, $type);
			}
		}
		return $saved;
    }

    public function edit($id)
    {
		$file = File::findOrFail($id);
		$types = File::imageTypes;
		return view('cms.file.edit', compact('file', 'types'));
    }

    public function update(Request $request, $id)
    {
		$oldFile = File::findOrFail($id);
		$upload = $request->all();

		if (!isset($upload['file'])) {
			if ($oldFile->update($upload)) {
				$request->session()->flash('success', 'File properties have been updated');
			} else if($saved === true && !$oldFile->update($upload)) {
				$request->session()->flash('error', 'File updated but file properties update failed');
			}
			return redirect('/cms/files/'.$oldFile->id.'/edit');
		}

		if ($oldFile->mime == $upload['file']->getMimeType()) {
			if (in_array($upload['file']->getMimeType(), File::imageTypes)) {
				$saved = File::imageUpdate($upload['file'], $oldFile);
			} else {
				$saved = File::fileUpdate($upload['file'], $oldFile);
			}

			if ($saved === true && $oldFile->update($upload)) {
				$request->session()->flash('success', 'File and properties have been updated');
			} else if($saved === true && !$oldFile->update($upload)) {
				$request->session()->flash('error', 'File updated but file properties update failed');
			} else if($saved === false && $oldFile->update($upload)) {
				$request->session()->flash('error', 'File update failed but file properties where updated');
			} else {
				$request->session()->flash('error', 'File overwrite failed');
			}
		} else {
			$request->session()->flash('error', 'File needs to be the same type');
		}
		return redirect('/cms/files/'.$oldFile->id.'/edit');
    }

    public function destroy(Request $request, $id)
    {

		$file = File::findOrFail($id);

		if ($file->delete($file->id)) {
			$request->session()->flash('success', 'File deleted');
			return redirect('/cms/files');
		} else {
			$request->session()->flash('error', 'Error deleting file');
		}

    }

	public function upload(Request $request)
	{
		return json_encode($this->store($request));
	}

}
