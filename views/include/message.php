<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 18/12/17
 * Time: 10:37
 */

$msg = \TVTS\Service\SessionService::getFlash('warning');
if ($msg): ?>
    <div class="alert alert-warning">
        <?= $msg; ?>
    </div>
<?php endif; ?>

<?php $msg = \TVTS\Service\SessionService::getFlash('error');
if ($msg): ?>
    <div class="alert alert-danger">
        <?= $msg; ?>
    </div>
<?php endif; ?>

<?php $msg = \TVTS\Service\SessionService::getFlash('success');
if ($msg): ?>
    <div class="alert alert-success">
        <?= $msg; ?>
    </div>
<?php endif; ?>