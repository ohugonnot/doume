<?php

namespace AppBundle\Entity\EntityTrait;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Filesystem\Filesystem;

trait FileEntityTrait
{
	/**
	 * @var null|File|UploadedFile
	 */
	protected $file;

	/**
	 * @var null|string
	 */
	protected $oldPath = null;

	/**
	 * @var null|int
	 *
	 * @ORM\Column(type="integer", length=255, nullable=true)
	 */
	protected $size;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(type="string", length=10, nullable=true)
	 */
	protected $extension;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	protected $type;

	/**
	 * @var null|string
	 *
	 * @ORM\Column(name="file", type="string", length=255, nullable=true)
	 */
	protected $path = null;

	/**
	 * @param File|null $file
	 * @return $this
	 */
	public function setFile(File $file = null)
	{
		$this->file = $file;
		return $this;
	}

	/**
	 * @return null|File|UploadedFile
	 */
	public function getFile(): ?File
	{
		return $this->file;
	}

	/**
	 * @return null|string
	 */
	public function getOldPath(): ?string
	{
		return $this->oldPath;
	}

	/**
	 * @param null|string $oldPath
	 * @return $this
	 */
	public function setOldPath(?string $oldPath)
	{
		$this->oldPath = $oldPath;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getSize(): ?int
	{
		return $this->size;
	}

	/**
	 * @param int|null $size
	 * @return $this
	 */
	public function setSize(?int $size)
	{
		$this->size = $size;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getExtension(): ?string
	{
		return $this->extension;
	}

	/**
	 * @param null|string $extension
	 * @return $this
	 */
	public function setExtension(?string $extension)
	{
		$this->extension = $extension;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getType(): ?string
	{
		return $this->type;
	}

	/**
	 * @param null|string $type
	 * @return $this
	 */
	public function setType(?string $type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return null|string
	 */
	public function getPath(): ?string
	{
		return $this->path;
	}

	/**
	 * @param null|string $path
	 * @return $this
	 */
	public function setPath(?string $path)
	{
		$this->path = $path;
		return $this;
	}


	public function getAbsolutePath()
	{
		return null === $this->getPath()
			? null
			: $this->getUploadRootDir().'/'.$this->getPath();
	}

	public function getWebPath()
	{
		return null === $this->getPath()
			? null
			: $this->getUploadDir().'/'.$this->getPath();
	}

	public function getUploadRootDir()
	{

		return __DIR__.'/../../../../web/'.$this->getUploadDir();
	}

	public function getUploadDir()
	{

		return 'uploads/'.strtolower($this->getType());
	}

	/**
	 * Au chargement de l'entité génération d'un objet File stocker dans la proprieté file
	 * @ORM\PostLoad()
	 */
	public function postLoadFile()
	{
		if($this->getPath() != null) {
			try {
				$this->setFile(new File($this->getAbsolutePath()));
			} catch (\Exception $e){

			}
		}
	}

	/**
	 * A la modification ou création de l'entité je vérifie qu'il y a un UploadedFile dans la proprieté file
	 * @ORM\PreFlush()
	 */
	public function upload()
	{
		if (null === $this->getFile() || !$this->getFile() instanceof UploadedFile) {
			return;
		}

		$file_name = date('m-d-Y_his') . '-' . $this->getFile()->getClientOriginalName();

		if($this->getPath() != null) {
			$this->setOldPath($this->getPath());
		}

		$this->setPath($file_name);
		$this->setSize($this->getFile()->getSize());
		$this->setExtension($this->getFile()->getClientOriginalExtension());

		$fs = new Filesystem();
		if (!$fs->exists($this->getUploadRootDir())) {
			$fs->mkdir($this->getUploadRootDir(), 0775);
		}

		$this->file->move(
			$this->getUploadRootDir(), $this->getPath()
		);
	}

	/**
	 * Après la création ou la modification de l'entité, si le fichier à été remplacé je supprime l'ancien
	 * @ORM\PostPersist()
	 * @ORM\PostUpdate()
	 */
	public function cleanOldFile()
	{
		if($this->getOldPath() !== null) {
			$fs = new Filesystem();
			try {
				$fs->remove($this->getUploadRootDir().'/'. $this->getOldPath());
			} catch(\Exception $exception) {

			}
		}
	}
}