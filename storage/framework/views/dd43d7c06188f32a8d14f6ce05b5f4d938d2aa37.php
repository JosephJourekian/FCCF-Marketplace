<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }
    
    .price {
      color: grey;
      font-size: 22px;
    }
    
    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }
    
    .card button:hover {
      opacity: 0.7;
    }
    #header {
    width: 100%;
    background-color: red;
    height: 30px;
    }
    .row {
    display: -webkit-box;
    display: flex;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    }

    .divClass{
      background-repeat:no-repeat;
      background-size:cover;
      width:500px;
      height:200px;
    }
</style>
<?php $__env->startComponent('components.app'); ?>
  <?php if(session()->has('message')): ?>
  <div class="alert alert-success font-bold color:green" >
      <?php echo e(session()->get('message')); ?>

  </div>
  <?php endif; ?>
  <div class="mb-6">
    <h1 class="font-bold ">Filter Products by Category:</h1>
      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a class="font-bold text-md" style="color:blue" href="<?php echo e(route('products.index', ['category' => $categorie->name])); ?>"><u><?php echo e($categorie->name); ?></u></a></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>      
  <div class="row mb-3">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="col-3">   
                <div class="card mb-5">
                <img src="<?php echo e($product->image); ?>" class="divClass" alt="Test image">
                <h1><?php echo e($product->name); ?></h1>
                <p class="price"><?php echo e($product->price); ?> Points</p>
                <p>Stock: <?php echo e($product->stock); ?></p>
                <p><?php echo e($product->description); ?></p>
                <?php if($product->stock == 0): ?>
                  <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="#" class="card-link">Out of Stock</a></button></p>
                <?php else: ?>
                  <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="<?php echo e(route('carts.add',$product->productname)); ?>" class="card-link">Add to Cart</a></button></p>
                <?php endif; ?>
                <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="<?php echo e(route('products.show',$product->productname)); ?>" class="card-link">View Product</a></button></p>
                <?php if(auth()->user()->isAdmin()): ?>
                 <p><button class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4 mb-1"><a href="<?php echo e(route('products.edit',$product->productname)); ?>" class="card-link">Edit Product</a></button></p>
                 <form method="POST" action="<?php echo e(route('products.delete')); ?>"> 
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <input type="hidden" name="id" value="<?php echo e($product->id); ?>"> 
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-300">Remove</button>
                </form>
                <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php if (isset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717)): ?>
<?php $component = $__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717; ?>
<?php unset($__componentOriginal2744513b5a2bacace2a9ba73cff03b386175a717); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/products/index.blade.php ENDPATH**/ ?>