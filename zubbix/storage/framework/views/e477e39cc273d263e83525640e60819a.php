<!DOCTYPE html>
<html>
<head>
    <title>Состояние устройств</title>
</head>
<body>
    <h1>Состояние устройств</h1>

    <!-- Форма для добавления нового устройства -->
    <form action="<?php echo e(route('devices.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="name">Имя устройства:</label>
        <input type="text" id="name" name="name" required>

        <label for="ip_address">IP адрес:</label>
        <input type="text" id="ip_address" name="ip_address" required>

        <button type="submit">Добавить устройство</button>
    </form>

    <h2>Список устройств</h2>
    <table>
        <thead>
            <tr>
                <th>Имя</th>
                <th>IP адрес</th>
                <th>Статус</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($device->name); ?></td>
                    <td><?php echo e($device->ip_address); ?></td>
                    <td><?php echo e($device->status ? 'Онлайн' : 'Оффлайн'); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Кнопка для проверки пинга всех устройств -->
    <form action="<?php echo e(route('devices.check')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit">Проверить пинг всех устройств</button>
    </form>

    <!-- Сообщение об успехе -->
    <?php if(session('success')): ?>
        <div style="color: green;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\zubbix\resources\views/index.blade.php ENDPATH**/ ?>