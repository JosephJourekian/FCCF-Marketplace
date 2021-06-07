<?php $__env->startComponent('mail::message'); ?>
# <?php echo e(auth()->user()->name); ?> Has Placed An Order!

Hello Mckenzie,<br> 
<?php echo e(auth()->user()->name); ?> has placed an order on the marketplace.<br>
Order summary:<br>
<?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h2 class="font-bold text-md block">Product Name: <?php echo e($product->name); ?></h2>
<h2 class="font-bold text-md block">Quantity: <?php echo e($product->qty); ?></h2>
<h2 class="font-bold text-md block">Size: <?php echo e($product->options->size); ?></h2>
<h2 class="font-bold text-md block">Color: <?php echo e($product->options->color); ?></h2>
<h2 class="font-bold text-md block">Price: <?php echo e($product->price); ?> Points</h2>
<h2 class="font-bold text-md block">Total Product Price: <?php echo e($product->subtotal('0','','')); ?> Points</h2><br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<h2 class="font-bold text-md mb-4 block">Subtotal: <?php echo e(Cart::subtotal('0','','')); ?> Points</h2>
<h2 class="font-bold text-md mb-4 block">Point Balance After Purchase: <?php echo e(auth()->user()->points - Cart::subtotal('0','','')); ?> Points</h2>

Shipping Details:<br>

Name: <?php echo e(auth()->user()->name); ?><br>
Email: <?php echo e(auth()->user()->email); ?><br>
Adress: <?php echo e(auth()->user()->address); ?><br>
City: <?php echo e(auth()->user()->city); ?><br>
Province: <?php echo e(auth()->user()->province); ?><br>
Zip Code: <?php echo e(auth()->user()->postalCode); ?><br>
Phone Number: <?php echo e(auth()->user()->phone); ?><br>


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/emails/ship.blade.php ENDPATH**/ ?>