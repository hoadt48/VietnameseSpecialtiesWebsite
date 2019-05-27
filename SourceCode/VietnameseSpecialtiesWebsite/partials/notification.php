<?php if (isset($_SESSION['success'])): ?>
    <li class="alert alert-success">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </li>
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
    <li class="alert alert-danger">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
    </li>
<?php endif; ?>