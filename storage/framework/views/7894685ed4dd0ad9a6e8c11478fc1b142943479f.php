<?php $__env->startComponent('mail::message'); ?>
# Order Confirmation

Hello <?php echo e(auth()->user()->name); ?>,<br> 
Thank you for your purchase!<br>
Order summary:<br>
<?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h2 class="font-bold text-md block">Product Name: <?php echo e($product->name); ?></h2>
<h2 class="font-bold text-md block">Quantity: <?php echo e($product->qty); ?></h2>
<?php if($product->options->attributename == 'N/A'): ?>
<h2 class="font-bold text-md ">Attributes: None</h2>
<?php else: ?>
<h2 class="font-bold text-md ">Attributes: <?php echo e($product->options->attributename); ?>: <?php echo e($product->options->attributevalue); ?>, <?php echo e($product->options->attributename2); ?>: <?php echo e($product->options->attributevalue2); ?></h2>
<?php endif; ?>
<h2 class="font-bold text-md block">Price: <?php echo e($product->price); ?> Points</h2>
<h2 class="font-bold text-md block">Total Product Price: <?php echo e($product->subtotal('0','','')); ?> Points</h2><br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<h2 class="font-bold text-md mb-4 block">Subtotal: <?php echo e(Cart::subtotal('0','','')); ?> Points</h2>
<h2 class="font-bold text-md mb-4 block">Point Balance After Purchase: <?php echo e(auth()->user()->points - Cart::subtotal('0','','')); ?> Points</h2>
<h2 class="font-bold text-md mb-4 block">Shipping Method: <?php echo e($shipping); ?></h2>
<h2 class="font-bold text-md mb-4 block">Shipping Amount Paid: <?php echo e($shippingPrice); ?> $</h2>



Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/emails/order.blade.php ENDPATH**/ ?>