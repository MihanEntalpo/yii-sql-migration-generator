yii-sql-migration-generator
===========================

Yii gii generator to create sql-migrations

To use this generator - place folder "Migrate"  into protected/gii/ folder (or any other, that you want),
and change "gii" section of your config.php:
<pre>
....
'modules' => array(
      .......
			'gii' => array(

				'class' => 'system.gii.GiiModule',
				'password' => FALSE,
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters' => array( '127.0.0.1', '::1' ),
				'newFileMode' => 0666,
				'newDirMode' => 0777,
				'generatorPaths' => array(
					'application.gii', // &lt;----- THIS IS THE LINE!!

				),

			),
      .....
		),
....
</pre>
After that - go to your-web-site.some/gii (or your-web-site.some?r=gii) and you'll find "Migrate generator" in the menu
