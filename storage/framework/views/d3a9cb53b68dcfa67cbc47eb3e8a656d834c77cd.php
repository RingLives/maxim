<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title><?php echo e(trans('others.company_name')); ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/styles.css")); ?>" />

		
	
	<link href="<?php echo e(asset("assets/customByMxp/css/select2.min.css")); ?>" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/preloder.css")); ?>" />
	<script src="<?php echo e(asset("assets/scripts/jquery-3.3.1.min.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/customByMxp/js/select2.min.js")); ?>"></script>
	
</head>
<body>
	<?php $languages = App\Http\Controllers\Trans\TranslationController::getLanguageList();?>
	<div class="row">
	<div class="col-md-2 col-sm-2 pull-right">
                    <select name="languageSwitcher" id="languageSwitcher" class="btn btn-primary form-control"  type="button">

                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option class="Sbutton" value="<?php echo e($language->lan_code); ?>" 
                            	<?php echo e(($language->lan_code == Session::get('locale')) ? 'selected' : ''); ?>>
                                 <?php echo e($language->lan_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(csrf_field()); ?>

                    </select>
                    </div>
                    </div>

	<?php echo $__env->yieldContent('body'); ?>
	<script src="<?php echo e(asset("assets/scripts/frontend.js")); ?>" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo e(asset("js/custom.js")); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset("js/all_product_table.js")); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset("js/journal.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/scripts/json-2.4.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/scripts/multipleTable.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/scripts/task/buyer.js")); ?>"></script>
	<script src="<?php echo e(asset("assets/scripts/task/taskTpye.js")); ?>"></script>
</body>
</html>