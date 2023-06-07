

<?php $__env->startSection("contenu"); ?>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <div class="lh-1">
      <h1 class="h3 mb-0 text-white lh-1">Getion des Etudiants</h1>
    </div>
  </div>
<div class="mt-4">
    <div class="d-flex justify-content-between mb-2">
    <?php echo e($etudiants->links()); ?>

    <div><a href="<?php echo e(route('etudiant.create')); ?>"class="btn btn-primary">Ajouter un etudiant</a></div> 
    </div>

    <?php if(Session::has("successDelete")): ?>
    <div class="alert alert-success">
    <h3><?php echo e(Session::get("successDelete")); ?></h3>
    </div>
    <?php endif; ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
      <th scope="col">Classe</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e($loop->index +1); ?></th>
      <td><?php echo e($etudiant-> firstName); ?></td>
      <td><?php echo e($etudiant-> lastName); ?></td>
      <td><?php echo e($etudiant->classe->libelle); ?></td>
      <td>
        <a href="<?php echo e(route('etudiant.update', ['etudiant'=>$etudiant->id])); ?>"class="btn btn-info">Edit</a>
        <a href="#"class="btn btn-danger" onclick="if(confirm('Voulez vous supprimez cet etudiant')){document.getElementById('form-<?php echo e($etudiant->id); ?>').submit()}">Delete</a>
        <form id="form-<?php echo e($etudiant->id); ?>" action="<?php echo e(route('etudiant.supprimer', ['etudiant'=>$etudiant->id])); ?>" method="post">
          <?php echo csrf_field(); ?> 
          <input type="hidden" name="_method" value="delete">
        </form>
      </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MARINA La Lionne\Desktop\LARAVEL\FirstProject\resources\views/etudiant.blade.php ENDPATH**/ ?>