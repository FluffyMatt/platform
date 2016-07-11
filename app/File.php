<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;

class File extends Model
{

	const dir = '/public/media/';
	const imageTypes = [
		'image/png',
		'image/jpg',
		'image/jpeg'
	];

	protected $fillable = [
		'type',
        'title',
        'alt_text',
        'filename',
		'path',
		'extension',
        'mime',
        'size',
        'type',
		'credit_name',
		'credit_url'
    ];

	public function delete()
	{
		$dir = File::dir.date_format($this->created_at, 'Y').'/'.date_format($this->created_at, 'M').'/';
		$filename = File::_filename($this->filename);

		for ($i=0; $i < 4; $i++) {
			Storage::delete($dir.$filename['name'].File::_size($i).$filename['ext']);
		}
		return parent::delete();
	}

	// Handles all uploaded images
	public static function imageUpload($file)
	{
		$filename = File::_filename($file->getClientOriginalName());
		$files = File::_generateSizes($file);
		$results = File::_storage($files, $filename, 'image');

		if ($results === true) {
		 	$saved = File::create([
				'filename' => str_replace(' ', '-', $filename['name']),
				'path' => str_replace('/public', '', File::dir.date('Y').'/'.date('M').'/'),
				'extension' => $filename['ext'],
				'mime' => $file->getMimeType(),
				'size' => $file->getSize()
			]);
			if ($saved) {
				return $saved->id;
			}
			return false;
		} else {
			return $results;
		}
	}

	public static function imageUpdate($file, $oldFile)
	{
		$filename = ['name' => $oldFile->filename, 'ext' => $oldFile->extension];
		$files = File::_generateSizes($file);
		$results = File::_storage($files, $filename, 'image', 'update');

		if ($results === true) {
			return true;
		} else {
			return false;
		}
	}

	// Handles all non image based uploads
	public static function fileUpload($file)
	{
		$filename = File::_filename($file->getClientOriginalName());
		$results = File::_storage($file, $filename, 'file');

		if ($results === true) {
			$saved = File::create([
				'filename' => str_replace(' ', '-', $filename['name']),
				'path' => str_replace('/public', '', File::dir.date('Y').'/'.date('M').'/'),
				'extension' => $filename['ext'],
				'mime' => $file->getMimeType(),
				'size' => $file->getSize()
			]);
			if ($saved) {
				return $saved->id;
			}
			return 'File not saved';
		} else {
			return $results;
		}
	}

	public static function fileUpdate($file, $oldFile)
	{
		$filename = ['name' => $oldFile->filename, 'ext' => $oldFile->extension];
		$results = File::_storage($file, $filename, 'file', 'update');

		if ($results === true) {
			return true;
		} else {
			return false;
		}

	}

	// Generates the multiple image sizes needed
	private static function _generateSizes($file, $images = [])
	{
		$images[] = Image::make($file->getRealPath())->resize(env('IMAGE_THUMB', 160), null, function ($constraint) {
		    $constraint->aspectRatio();
		});
		$images[] = Image::make($file->getRealPath())->resize(env('IMAGE_MEDIUM', 668), null, function ($constraint) {
		    $constraint->aspectRatio();
		});
		$images[] = Image::make($file->getRealPath())->resize(env('IMAGE_LARGE', 1592), null, function ($constraint) {
		    $constraint->aspectRatio();
		});
		$images[] = Image::make($file->getRealPath());

		return $images;
	}

	// Main storage function
	private static function _storage($files, $filename, $type, $update = NULL)
	{
		$dir = File::dir.date('Y').'/'.date('M');
		Storage::makeDirectory($dir);

		if ($type == 'image') {
			$count = 0;
			foreach ($files as $key => $file) {
				if (Storage::exists($dir.'/'.$filename['name'].$filename['ext']) && is_null($update)) {
					return ['error' => ['message' => 'File already exists']];
				}
				Storage::put($dir.'/'.$filename['name'].File::_size($count).$filename['ext'], $file->stream());
				$count++;
			}
		} else {
			if (Storage::exists($dir.'/'.$filename['name'].$filename['ext']) && is_null($update)) {
				return ['error' => ['message' => 'File already exists']];
			}
			Storage::put($dir.'/'.$filename['name'].$filename['ext'], file_get_contents($files->getRealPath()), 'public');
		}

		return true;
	}

	// Extracts the filename and extention
	private static function _filename($filename, $results = [])
	{
		$results['name'] = str_replace(substr($filename, strrpos($filename, '.')), '', $filename);
		$results['ext'] = substr($filename, strrpos($filename, '.'));
		$results['name'] = str_replace(' ', '-', $results['name']);
		return $results;
	}

	// Used to append size info to the image name
	private static function _size($count)
	{
		switch ($count) {
			case 0:
				return '-thumb';
				break;
			case 1:
				return '-medium';
				break;
			case 2:
				return '-large';
				break;
			default:
				return '';
				break;

		}
	}

}
