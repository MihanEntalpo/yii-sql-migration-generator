<h1>Migration generator</h1>
 
<?php $form=$this->beginWidget('CCodeForm', array('model'=>$model)); ?>
	<?php echo $form->hiddenField($model,'_migrateName'); ?>
 
    <div class="row">
        <?php echo $form->labelEx($model,'migrateName'); ?>
        <?php echo $form->textField($model,'migrateName',array('size'=>65)); ?>
        <div class="tooltip">
            Migration should be only latter
        </div>
        <?php echo $form->error($model,'migrateName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'code'); ?>
        <?php echo $form->textArea($model,'code',array('style'=>'width:600px;height:200px;')); ?>
        <div class="tooltip">
            SQL code
        </div>
        <?php echo $form->error($model,'code'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'Rollback enabled?'); ?>
        <?php echo $form->checkBox($model,'enableDown'); ?>
        <div class="tooltip">
            Does this migration can be rollbacked
        </div>
        <?php echo $form->error($model,'enableDown'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'SQL for rollback'); ?>
        <?php echo $form->textArea($model,'codeDown',array('style'=>'width:600px;height:200px;')); ?>
        <div class="tooltip">
            SQL code for migration rollback
        </div>
        <?php echo $form->error($model,'codeDown'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'clearCache'); ?>
        <?php echo $form->checkBox($model,'clearCache'); ?>
        <div class="tooltip">
            Is cache need to flush
        </div>
        <?php echo $form->error($model,'clearCache'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'clearAssets'); ?>
        <?php echo $form->checkBox($model,'clearAssets'); ?>
        <div class="tooltip">
            Is assets need to clear
        </div>
        <?php echo $form->error($model,'clearAssets'); ?>
    </div>
 
<?php $this->endWidget(); ?>