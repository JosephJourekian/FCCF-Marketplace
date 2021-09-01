<?php $__env->startComponent('components.app'); ?>
<p style="position: relative;top: 81px;text-align: center;font-size: 32px;width: fit-content;left: 460px;">Welcome to the Admin links!</p>
<?php if(session()->has('message')): ?>
<div class="alert alert-success font-bold color:green" >
    <?php echo e(session()->get('message')); ?>

</div>
<?php endif; ?>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/adminLinks.blade.php ENDPATH**/ ?>