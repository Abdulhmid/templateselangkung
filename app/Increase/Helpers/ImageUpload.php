<?php

class ImageUpload {

	public $request;
	public $width;
	public $height;
	public $folder;
	public $result;

	public function __construct(
		$request, 
		$width = 400, 
		$height = 400, 
		$folder = "img"
	)
	{
		$this->request = $request;
		$this->width = $width;
		$this->height = $height;
		$this->folder = $folder;
	}

	/*
	* Fungsi Utama
	 */
	public function upload()
	{
        $this->checkFolder()->nameFile()->uploadImage();

        return $this->result;
	}

	public function uploadImageParameter()
	{
        $this->checkFolder()->nameFileParameter()->uploadImageParameterOnce();

        return $this->result;
	}

	protected function checkFolder()
	{
		$folder = public_path()."/".$this->folder;
		if (!file_exists($folder)) {
		    mkdir($folder, 0777, true);
		}

		return $this;
	}

	protected function nameFile()
	{
		$extension =  $this->request['image']->getClientOriginalExtension();
		$originName = $this->request['image']->getClientOriginalName();
		$this->name = str_slug($originName).".".$extension;
		return $this;
	}

	protected function uploadImage()
	{
		$path = $this->folder."/".$this->name;
		$file = \Image::make($this->request['image']);
		$file->fit($this->width, $this->height);
		$file->save($this->folder."/".$this->name);
		$this->result = $path;
		return $this;
	}

	protected function nameFileParameter()
	{
		$extension =  $this->request->getClientOriginalExtension();
		$originName = $this->request->getClientOriginalName();
		$this->name = str_slug($originName).".".$extension;
		return $this;
	}

	protected function uploadImageParameterOnce()
	{
		$path = $this->folder."/".$this->name;
		$file = \Image::make($this->request);
		$file->fit($this->width, $this->height);
		$file->save($this->folder."/".$this->name);
		$this->result = $path;
		return $this;
	}
}