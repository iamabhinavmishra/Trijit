<?php
//include('../templates/header.php');
?>

<div class="content">
    <h2>Available VPS Plans</h2>
    <ul class="vps-list">
        <li>
            <h3>Basic Plan</h3>
            <p>Price: $20/month</p>
            <a href="order_form.php?plan=Basic">Order Now</a>
        </li>
        <li>
            <h3>Standard Plan</h3>
            <p>Price: $40/month</p>
            <a href="order_form.php?plan=Standard">Order Now</a>
        </li>
        <li>
            <h3>Advanced Plan</h3>
            <p>Price: $60/month</p>
            <a href="order_form.php?plan=Advanced">Order Now</a>
        </li>
    </ul>
</div>
<div class="content2">
    <h2>Create Your Own VPS Plan</h2>
    <form action="order_form.php" method="get">
        <label for="ram">RAM (GB):</label>
        <input type="number" name="ram" required>
        <label for="cores">CPU Cores:</label>
        <input type="number" name="cores" required>
        <label for="storage">Storage (GB):</label>
        <input type="number" name="storage" required>
        <button type="submit">Create Plan</button>
    </form>
</div>
<?php
//include('../templates/footer.php');
?>
