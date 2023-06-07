

<?php $__env->startSection("contenu"); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h3 mb-0 text-white lh-1">Ajout d'un Nouvel Etudiant</h1>
    </div>
  </div>
<div class="mt-4">
<?php if(Session::has("success")): ?>
    <div class="alert alert-success">
    <h3><?php echo e(Session::get("success")); ?></h3>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
<ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>

<div class="d-flex justify-content-end mb-4">
    <div><a href="<?php echo e(route('etudiant')); ?>"class="btn btn-primary">Retour à la liste</a></div> 
    </div>
    <form style="width:65%" method="post" action="<?php echo e(route('etudiant.ajouter')); ?>">
    <?php echo csrf_field(); ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control" name="firstName">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Nom</label>
    <input type="text" class="form-control" name="lastName">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Classe</label>
    <select class="form-control" name="classe_id">
        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <option value=""></option>
        <option value="<?php echo e($classe->id); ?>"><?php echo e($classe->libelle); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn btn-danger">Annuler</button>

</form>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MARINA La Lionne\Desktop\LARAVEL\FirstProject\resources\views/createEtudiant.blade.php ENDPATH**/ ?>