<?php
namespace pmimporter\anvil;

use pmimporter\generic\PcFormat;
use pmimporter\Chunk;

class Anvil extends PcFormat {
	public static function getFormatName() {
		return "anvil";
	}
	public static function isValid($path) {
		if (!file_exists($path."/level.dat") || !is_dir($path."/region/")) return false;
		$files = glob($path."/region/*.mca");
		return $files !== false && count($files) != 0;
	}
	public static function getProviderOrder() {
		return self::ORDER_YZX;
	}
	public static function writeable() {
		return true;
	}
	public function __construct($path, $settings = null) {
		$this->initFormat(self::class, $path, $settings);
	}

	public function getChunk($cx,$cz,$yoff=0) {
		$data = $this->readChunk($cx,$cz,$yoff);
		return AnvilChunk::fromBinary($this,$data,$yoff);
	}
	protected function getFileExtension() {
		return "mca";
	}
	public function newChunk(array &$data) {
		return new AnvilChunk($this,$data);
	}

}
