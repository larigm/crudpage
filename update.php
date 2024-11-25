<?php
include 'functions.php';

$pdo = pdo_connect_postgresql();
$msg = '';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        $id = $_GET['id'];  // O ID vem pela URL
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        
        $stmt = $pdo->prepare('UPDATE contacts SET name = ?, email = ?, phone = ?, title = ?, created = ? WHERE id = ?');
        $stmt->execute([$name, $email, $phone, $title, $created, $id]);
        
        $msg = 'Contato atualizado com sucesso!';
    }

    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        exit('Contato não encontrado com esse ID!');
    }
} else {
    exit('Nenhum ID especificado!');
}
?>

<?=template_header('Update')?>

<div class="content update">
    <h2>Atualizar Contato #<?=$contact['id']?></h2>

    <!-- Formulário de atualização -->
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="name">Nome</label>
        <input type="text" name="name" placeholder="John Doe" value="<?=$contact['name']?>" id="name" required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="johndoe@example.com" value="<?=$contact['email']?>" id="email" required>

        <label for="phone">Telefone</label>
        <input type="text" name="phone" placeholder="2025550143" value="<?=$contact['phone']?>" id="phone" required>

        <label for="title">Título</label>
        <input type="text" name="title" placeholder="Funcionário" value="<?=$contact['title']?>" id="title" required>

        <label for="created">Data de Criação</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created" required>

        <input type="submit" value="Atualizar">
    </form>

    <!-- Exibe a mensagem de sucesso após a atualização -->
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>
