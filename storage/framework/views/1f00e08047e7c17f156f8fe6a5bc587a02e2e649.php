<style>
    @import  url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}
.wrapper{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
  /* background: linear-gradient(375deg, #1cc7d0, #2ede98); */
  /* clip-path: circle(25px at calc(0% + 45px) 45px); */
  clip-path: circle(25px at calc(100% - 45px) 45px);
  transition: all 0.3s ease-in-out;
}
#active:checked ~ .wrapper{
  clip-path: circle(75%);
}
.menu-btn{
  position: absolute;
  z-index: 2;
  right: 20px;
  /* left: 20px; */
  top: 20px;
  height: 50px;
  width: 50px;
  text-align: center;
  line-height: 50px;
  border-radius: 50%;
  font-size: 30px;
  color: black;
  cursor: pointer;
  background: linear-gradient(-135deg, #c850c0, #4158d0);
  /* background: linear-gradient(375deg, #1cc7d0, #2ede98); */
  transition: all 0.3s ease-in-out;
  
}
#active:checked ~ .menu-btn{
  background: #fff;
  color: #4158d0;
  
}
#active:checked ~ .menu-btn i:before{
  content: "\f00d";
}
.wrapper ul{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  list-style: none;
  text-align: center;
}
.wrapper ul li{
  margin: 15px 0;
}
.wrapper ul li a {
  color: none;
  text-decoration: none;
  font-size: 30px;
  font-weight: 500;
  padding: 5px 30px;
  color: #fff;
  position: relative;
  line-height: 50px;
  transition: all 0.3s ease;
}
.wrapper p{
  color: none;
  text-decoration: none;
  font-size: 30px;
  font-weight: 500;
  padding: 5px 30px;
  color: #fff;
  background: rgba(255, 255, 255, 0);
  position: relative;
  line-height: 50px;
  transition: all 0.3s ease;
}
.wrapper button{
  color: none;
  text-decoration: none;
  font-size: 30px;
  font-weight: 500;
  padding: 5px 30px;
  color: #fff;
  position: relative;
  line-height: 50px;
  transition: all 0.3s ease;
}
.wrapper form{
  color: none;
  text-decoration: none;
  font-size: 30px;
  font-weight: 500;
  padding: 5px 30px;
  color: #fff;
  position: relative;
  line-height: 50px;
  transition: all 0.3s ease;
}
.wrapper ul li a:after{
  position: absolute;
  content: "";
  background: #fff;
  width: 100%;
  height: 50px;
  left: 0;
  border-radius: 50px;
  transform: scaleY(0);
  z-index: -1;
  transition: transform 0.3s ease;
}
.wrapper form:after{
  position: absolute;
  content: "";
  background: #fff;
  width: 100%;
  height: 50px;
  left: 0;
  border-radius: 50px;
  transform: scaleY(0);
  z-index: -1;
  transition: transform 0.3s ease;
}
.wrapper ul li a:hover:after{
  transform: scaleY(1);
}
.wrapper ul li a:hover{
  color: #4158d0;
}

.wrapper form:hover:after{
  transform: scaleY(1);
}
.wrapper form:hover{
  color: #4158d0;
}
.wrapper button:hover{
  color: #4158d0;
}
input[type="checkbox"]{
  display: none;
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: -1;
  text-align: center;
  width: 100%;
  color: #202020;
}
.content .title{
  font-size: 40px;
  font-weight: 700;
}
.content p{
  font-size: 35px;
  font-weight: 600;
}
</style>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <input type="checkbox" id="active">
      <label for="active" class="menu-btn"><i class="fas fa-bars"></i></label>
      <div class="wrapper">
         <ul>
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li>
                <p>
                    My points: <?php echo e(auth()->user()->points); ?>

                </p>
            </li>
            <li><a href="#">About</a></li>
            <li>
                <a href="<?php echo e(route('carts.index')); ?>">
                    My Cart (<?php echo e(Cart::count()); ?>)
                </a>
            </li>
            <?php if(auth()->user()->isAdmin()): ?>
                <li><a href="<?php echo e(route('products.add')); ?>" >Add Products</a></li>
                <li><a href="<?php echo e(route('products.inventory.view')); ?>">Edit Inventory</a></li>
                <li><a href="<?php echo e(route('products.attributes')); ?>">Edit Attributes</a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(route('products.index')); ?>">Shop</a></li>
            <li><a href="#">Updates</a></li>
            <li><a href="#">Team</a></li>
            </li>
            <?php if(auth()->user()->isAdmin()): ?>
                <li><a href="<?php echo e(route('viewUsers')); ?>">View Users</a></li>
            <?php endif; ?>     
            <li><a href="<?php echo e(route('profiles.edit',auth()->user()->username)); ?>">My Account</a><li>
            <li><a href="<?php echo e(route('purchaseHistory',auth()->user()->username)); ?>">Purchase History</a><li>
            <li>
                <form method="POST" action="/logout">
                    <?php echo csrf_field(); ?>
                    <button>Logout</button>
                </form>
            </li>
         </ul>
      </div>
      <div class="content">
         <div class="title">
            Fullscreen Overlay Navigation Bar
         </div>
      </div>
   </body>
</html><?php /**PATH C:\Users\jjour\FCCF-Market\resources\views/menuTest.blade.php ENDPATH**/ ?>