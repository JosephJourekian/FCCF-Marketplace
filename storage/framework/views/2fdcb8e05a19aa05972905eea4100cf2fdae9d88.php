<?php $__env->startComponent('components.app'); ?>
<?php if(session()->has('message')): ?>
    <div class="alert alert-success font-bold color:green" >
        <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>
<div>
<h1 class="font-bold  mb-4">Edit <?php echo e($product->name); ?> Attributes Stocks:</h1>
<div>
    <div>
        <form method="POST" action='<?php echo e(route('products.attributesStockUpdate')); ?>' enctype="multipart/form-data" class="mb-8" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>    
            <table id="t01">
                <tr>
                  <th>Attributes</th>
                  <th>Current Stock</th>
                  <th>Stock Adjustment</th>
                </tr>
                <?php $index = 0 ?>
                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?>, <?php echo e($attribute->attribute_second_name); ?>: <?php echo e($attribute->attribute_second_value); ?></td>
                  <td><?php echo e($attribute->stock); ?></td>
                  <input hidden type="number" name="products[<?php echo e($index); ?>][productId]" value="<?php echo e($product->id); ?>" required>
                  <input hidden type="number" name="products[<?php echo e($index); ?>][id]" value="<?php echo e($attribute->id); ?>" required>
                  <td><input type="number" name="products[<?php echo e($index); ?>][stock]" value="" style="width: 9em"></td>
                <?php $index++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
            <button class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-300"><a href="<?php echo e(route('products.attributes')); ?>" class="card-link">Back to Attributes</a></button>
        </form>
    </div>
</div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/attributesStock.blade.php ENDPATH**/ ?>