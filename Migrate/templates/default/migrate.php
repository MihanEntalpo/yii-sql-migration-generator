<?php echo '<?php'; ?>

class <?php echo $this->_migrateName; ?> extends CDbMigration
{
	public function up()
	{
                <?php if ($this->code):?>
                    $this->execute("<?php echo str_replace(array('$','"'),array('\$','\"'),$this->code); ?>");
                <?php endif; ?>

<?php if($this->clearCache):?>
		if(Yii::app()->hasComponent('cache'))
		{
			Yii::app()->getComponent('cache')->flush();
			echo "Cache flused\n";
		}
<?php endif;?>

<?php if($this->clearAssets): ?>
		$this->clearAssets();
<?php endif; ?>
	}

<?php if($this->clearAssets): ?>
	private function clearAssets()
	{
		$path = Yii::app()->getComponent('assetManager')->getBasePath();
		$this->clearDir($path);
		echo "Assets clear\n";
	}

	private function clearDir($folder, $main=true)
	{
		if(is_dir($folder))
		{
			$handle = opendir($folder);
			while($subfile = readdir($handle))
			{
				if($subfile == '.' || $subfile == '..')
					continue;
				if(is_file($subfile))
					unlink("{$folder}/{$subfile}");
				else
					$this->clearDir("{$folder}/{$subfile}", false);
			}
			closedir($handle);
			if(!$main)
				rmdir($folder);
		}
		else
			unlink($folder);
	}
<?php endif; ?>

	public function down()
	{

<?php if (!$this->enableDown): ?>
		echo "<?php echo $this->_migrateName; ?> migrating down by doing nothing....\n";
<?php else: ?>
                $this->execute("<?php echo str_replace(array('$','"'),array('\$','\"'),$this->codeDown); ?>");
<?php endif; ?>

	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
