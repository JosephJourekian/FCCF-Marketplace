<?php $__env->startComponent('components.app'); ?>
<div>
    <div>
        <img src="<?php echo e($product->image); ?>" style="width:450px;height:500px;float:left">
        <h1 class="font-bold mb-8" style="font-size:300%;"><?php echo e($product->name); ?></h1>
        <p style="font-size:150%; mb-5"><?php echo e($product->description); ?></p>
        <p >Stock: <?php echo e($product->stock); ?></p>
        <h2 class="font-bold mt-15" style="font-size:200%"><?php echo e($product->price); ?> Points</h2>
        <div class="mt-3">
            <?php if($product->stock == 0): ?>
                <a href="#"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                    Out of Stock
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('carts.add',$product->productname)); ?>"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                    Add To Cart
                </a>            
            <?php endif; ?>
            <a href="<?php echo e(route('products.index')); ?>"
                    class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
            >
                Back To Products
            </a>
            <p style="margin-top: 1em">
				<?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(route('products.index', ['category' => $categories->name])); ?>"><?php echo e($categories->name); ?></a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</p>
        </div>
    </div>
</div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/show.blade.php ENDPATH**/ ?>