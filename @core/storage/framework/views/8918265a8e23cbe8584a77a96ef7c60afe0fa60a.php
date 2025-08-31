$(document).on('click','#custom',function () {
    $(this).addClass("disabled")
    $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e($title); ?>');
});<?php /**PATH /home/manfz/ssll/manfz.sa/@core/resources/views/components/btn/custom.blade.php ENDPATH**/ ?>