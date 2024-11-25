<?php
include 'functions.php';
$pdo = pdo_connect_postgresql(); 
$msg = '';

// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    // O campo ID será automaticamente gerado pelo PostgreSQL, então não precisamos passá-lo
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    
    // Inserir o novo registro na tabela "contacts"
    $stmt = $pdo->prepare('INSERT INTO contacts (name, email, phone, title, created) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$name, $email, $phone, $title, $created]);
    
    // Mensagem de sucesso
    $msg = 'Created Successfully!';
}
?>
<?=template_header('Create')?>

<div class="content update">
    <h2>Create Contact</h2>
    <form action="create.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="John Doe" id="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="johndoe@example.com" id="email" required>

        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="2025550143" id="phone" required>

        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Employee" id="title" required>

        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">

        <input type="submit" value="Create">
    </form>

    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
