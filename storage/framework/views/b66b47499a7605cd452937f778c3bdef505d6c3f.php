<?php $__env->startComponent('components.app'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
<link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div>
    <div>
        <form method="GET" action='<?php echo e(route('carts.add',$product->productname)); ?>' enctype="multipart/form-data" class="mb-8"  >
            <?php echo csrf_field(); ?>
            
            <div id="demo" class="carousel slide carousel-fade " data-ride="carousel" style="float: none; position:absolute">
    
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="<?php echo e($product->image); ?>" style="width:400px;height:300px;">
                    </div>
                    <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <div class="carousel-item <?php echo e($loop->first); ?>">
                           <img style="width:450px;height:350px;" class="d-block img-fluid" src="<?php echo e(asset("storage/{$pic->image}")); ?>">
                       </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
              
            </div>

        <div style="float:right">
            <h1 class="font-bold mb-8" style="font-size:300%;"><?php echo e($product->name); ?></h1>
            
            <p style="font-size:150%; mb-5"><?php echo e($product->description); ?></p>
            <p >Stock: <?php echo e($product->stock); ?></p>
            <h2 class="font-bold mt-15" style="font-size:200%"><?php echo e($product->price); ?> Points</h2> 
            <p class="font-bold mt-2" >
                <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a  href="<?php echo e(route('products.index', ['category' => $categories->name])); ?>"><u><?php echo e($categories->name); ?></u></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <p>
                <?php $__currentLoopData = $product->category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($categories->name == "Apparel"): ?>
                    <p class="font-bold">Select Size and Color:</p>
                    <select name="attribute">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($attribute->attribute_name == "Size"): ?>
                                <option value="<?php echo e($attribute->id); ?>">
                                    <?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?>, <?php echo e($attribute->attribute_second_name); ?>: 
                                    <?php echo e($attribute->attribute_second_value); ?>, Stock: <?php echo e($attribute->stock); ?>

                                </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <!--<select name="color">
                        <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($attribute->attribute_name == "Color"): ?>
                                <option value="<?php echo e($attribute->id); ?>"><?php echo e($attribute->attribute_name); ?>: <?php echo e($attribute->attribute_value); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>-->
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
            </div>
        </div>
        
        </form>
    </div>
</div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/show.blade.php ENDPATH**/ ?>