<?php $__env->startComponent('components.app'); ?>
<div>
    <div>
        <form method="GET" action='<?php echo e(route('carts.add',$product->productname)); ?>' enctype="multipart/form-data" class="mb-8" >
            <?php echo csrf_field(); ?>
            
            <img src="<?php echo e($product->image); ?>" style="width:450px;height:500px;float:left ">   
            
            
        <div style="float:none">
            <h1 class="font-bold mb-8" style="font-size:300%;"><?php echo e($product->name); ?></h1>
            <p style="font-size:150%; mb-5"><?php echo e($product->description); ?></p>
            <p >Stock: <?php echo e($product->stock); ?></p>
            <h2 class="font-bold mt-15" style="font-size:200%"><?php echo e($product->price); ?> Points</h2> 
            <p>
                <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($categories->name == "Apparel"): ?>
                    <p class="font-bold">Select Size and Color:</p>
                    <select name="size">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($attribute->attribute_name == "Size"): ?>
                                <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <select name="color">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($attribute->attribute_name == "Color"): ?>
                                <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <div class="mt-3">
                <?php if($product->stock == 0): ?>
                    <a href="#"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4">
                        Out of Stock
                    </a>
                <?php else: ?>
                    <input class="bg-blue-400 text-white rounded py-2 px-4 mt-3 hover:bg-blue-300" type="submit" value="Add to Cart">       
                <?php endif; ?>
                <a href="<?php echo e(route('products.index')); ?>"
                        class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500 mr-4"
                >
                    Back To Products
                </a>
                <p class="font-bold mt-8" >
                    <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a  href="<?php echo e(route('products.index', ['category' => $categories->name])); ?>"><u><?php echo e($categories->name); ?></u></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
        </div>
        
        </form>
    </div>
</div>
<div class="mb-4">
    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e(asset("storage/{$pic->image}")); ?>" style="width:170px;height:120px;float:left;">   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/show.blade.php ENDPATH**/ ?>