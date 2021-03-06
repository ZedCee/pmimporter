<?php
namespace pmimporter;
use pmimporter\LevelFormat;

interface Chunk {
	/**
   *
	 * @param $data - input to initialize chunk
	 */
	public function __construct(LevelFormat $fmt,array &$data);

	public function getLevel();
	public function getBlocks();
	public function getRawBlocks();
	public function getMeta();
	public function getRawMeta();
	public function getBlockLight();
	public function getRawBlockLight();
	public function getSkyLight();
	public function getRawSkyLight();
	public function getBiomeColors();
	public function getHeightMap();
	public function getEntities();
	public function getTiles();
	public function isGenerated();
	public function isPopulated();
	public function isLightPopulated();
	public function getX();
	public function getZ();
}
