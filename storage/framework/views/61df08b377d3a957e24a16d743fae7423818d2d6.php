<?php $__env->startComponent('components.app'); ?>
<?php if(session()->has('message')): ?>
    <div class="alert alert-success font-bold color:green" >
        <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>
<div>
<h1 class="font-bold  mb-4">Edit Products Attributes:</h1>
<div>
    <div>
        <form method="POST" action='<?php echo e(route('products.attributes')); ?>' enctype="multipart/form-data" class="mb-8" >
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <table id="t01">
                <tr>
                  <th>Product Name</th>
                  <!--<th>Stock</th>-->
                  <th>Attributes</th>
                  <th>Add 1st Attribute Name</th>
                  <th>Add 1st Attribute Value</th>
                  <th>Add 2nd Attribute Name</th>
                  <th>Add 2nd Attribute Value</th>
                  <th>Stock</th>
                  <th>Remove Attribute</th>
                  <th>Add/Remove stock</th>
                </tr>
                <?php $index = 0 ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($product->name); ?></td>
                  <!--<td><?php echo e($product->stock); ?></td>-->
                  <td style="white-space: nowrap;overflow:hidden;">
                      <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?>, <?php echo e($attribute->attribute_second_name); ?>: <?php echo e($attribute->attribute_second_value); ?>, Stock: <?php echo e($attribute->stock); ?></li><br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <input hidden type="number" name="products[<?php echo e($index); ?>][id]" value="<?php echo e($product->id); ?>" required>
                  <td><input type="text" name="products[<?php echo e($index); ?>][attributeName]" value=""  size="10"></td>
                  <td><input type="text" name="products[<?php echo e($index); ?>][attributeValue]" value="" size="10"></td>
                  <td><input type="text" name="products[<?php echo e($index); ?>][attributeName2]" value="" size="10"></td>
                  <td><input type="text" name="products[<?php echo e($index); ?>][attributeValue2]" value="" size="10"></td>
                  <td><input type="number" name="products[<?php echo e($index); ?>][stock]" value="" style="width: 3em"></td>
                  <td>
                    <select name="products[<?php echo e($index); ?>][attribute][]" multiple>
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?>, <?php echo e($attribute->attribute_second_name); ?>: <?php echo e($attribute->attribute_second_value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </td>
                  <td><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-300"><a href="<?php echo e(route('products.attributesStock',$product->productname)); ?>" class="card-link">Edit</a></button></td>
                </tr>
                <?php $index++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Submit">
        </form>
    </div>
</div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/attributes.blade.php ENDPATH**/ ?>